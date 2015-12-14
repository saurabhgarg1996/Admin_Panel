<?php
	include_once "logincheck1.php";

		$response= "";
		function distance($lat1,$lat2,$lon1,$lon2)
		{
			  $theta = $lon1 - $lon2;
			  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
			  $dist = acos($dist);
			  $dist = rad2deg($dist);
			  $miles = $dist * 60 * 1.1515;	
			  return $miles;
		}
		function cmp($a,$b)
		{
				if($a['dist']<$b['dist'])
					return 1;
				else
					return 0;
		}
		
		include_once "../lib/sm-connection.php";
		include_once "../lib/sm-constant.php";
		include_once "../lib/Algofuntions.php";
		
		$lat = 50;//$_POST['lat'];
		$lon = 60;//$_POST['long'];
		$user_id = 50;//$_POST['user_id'];
		$freeservices = getAllfreeservices();
		$Service1 = getAllpremiumServices1();
		$Service2 = getAllpremiumServices2();
		$interests = getAllinterests($user_id);
		$friends_services = getAllfriendservices($user_id);
		foreach($Service1 as $service ){
					$dist = distance($lat,$service['branch_lat'],$lon,$service['branch_lng']);
					$service->dist = $dist;
					$service->rank = 0; 
		}
		foreach($Service2 as $serivce)
		{
					$dist = distance($lat,$service['lat'],$lon,$service['lng']);
					$service->dist = $dist;
					$service->rank = 0;
		}
		usort($Service1,"cmp");
		usort($Service2,"cmp");
		
		foreach($Service1 as $service )
		{
			if($service['amount_paid']>210000)
				$service->rank = 3*10/100;
			else if($service['amount_paid']>21000)
				$service->rank = 2*10/100;
			else if($service['listingType']==1)
				$service->rank = 1*10/100; 		
		} 
		foreach($Service2 as $service )
		{
			if($service['amt_paid']>210000)
				$service->rank = 3*10/100;
			else if($service['amt_paid']>21000)
				$service->rank = 2*10/100;
			else if($service['listingType']==1)
				$service->rank = 1*10/100; 	
		}	
		foreach($Service1 as $service)
		{
			if($service['rating']>3.5)
				$service->rank =$service->rank + 3*10/100;
			else if($service['rating']>1.5)
				$service->rank = $service->rank + 2*10/100;
			else 
				$service->rank = $service->rank + 1*10/100; 
		}
		foreach($Service2 as $service)
		{
			if($service['rating']>3.5)
				$service->rank =$service->rank + 3*10/100;
			else if($service['rating']>1.5)
				$service->rank = $service->rank + 2*10/100;
			else 
				$service->rank = $service->rank + 1*10/100; 
		}
		
		/************************************************************************ 
		$Service1 is list of all owners sorted on based of location and having rank column to decide weightage's (to be shown up on Solar Model)
		$Service2 is list of all single enterpreneurs sorted on based of location and having rank column to decide weightage's (to be shown up on Solar Model)
		$interests is list of all service provider's based on his/her interest
		$friends_services is list of all service provider's based on friend list available  
		************************************************************************/
		
	

?>