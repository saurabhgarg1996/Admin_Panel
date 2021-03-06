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
		
		$lat =19.1915;// $_POST['lat'];
		$lon =72.8453 ;// $_POST['long'];
		$user_id = 51;//$_POST['user_id'];
		$freeservices = getAllfreeservices();
		$Service1 = getAllpremiumServices1();
		//print_r($Service1);
		$Service2 = getAllpremiumServices2();
		$interests = getAllinterests($user_id);
		$friends_services = getAllfriendservices($user_id);
//print_r($Service2);print_r($freeservices);print_r($interests);
			
		//$a=array('kms'=>4,8=>5);		
		//$a['ks'] =56;
		//print_r($a);		
		foreach($freeservices as &$f)
		{
			$f['number'] = '3';
		}
		foreach($interests as &$f)
		{
			$f['number'] = '2';
		}
		foreach($Service1 as &$f)
		{
			$f['number']  = '0';
		}
		foreach($Service2 as &$f)
		{
			$f['number']  = '1';
		}
		
		//print_r($Service1);
		
		foreach($Service1 as $service=>$value ){
					$dist = distance($lat,$Service1[$service]['branch_lat'],$lon,$Service1[$service]['branch_lng']);
					$Service1[$service]['dist'] = $dist;
					$Service1[$service]['rank'] = 0; 
		}
		foreach($Service2 as $service=>$value)
		{
					$dist = distance($lat,$Service2[$service]['lat'],$lon,$Service2[$service]['lng']);
					
					$Service2[$service]['dist'] = $dist;
					$Service2[$service]['rank'] = 0; 
		}
		usort($Service1,"cmp");
		usort($Service2,"cmp");
		
		foreach($Service1 as &$service )
		{
			if($service['amount_paid']>210000)
				$service['rank'] = 3*10/100;
			else if($service['amount_paid']>21000)
				$service['rank'] = 2*10/100;
			else if($service['listingType']==1)
				$service['rank'] = 1*10/100; 		
		} 
		foreach($Service2 as &$service )
		{
			if($service['amt_paid']>210000)
				$service['rank'] = 3*10/100;
			else if($service['amt_paid']>21000)
				$service['rank'] = 2*10/100;
			else if($service['listingType']==1)
				$service['rank'] = 1*10/100; 	
		}	
		foreach($Service1 as &$service)
		{
			if($service['rating']>3.5)
				$service['rank'] =$service['rank'] + 3*10/100;
			else if($service['rating']>1.5)
				$service['rank'] = $service['rank'] + 2*10/100;
			else 
				$service['rank']= $service['rank'] + 1*10/100; 
		}
		foreach($Service2 as &$service)
		{
			if($service['rating']>3.5)
				$service['rank']=$service['rank'] + 3*10/100;
			else if($service['rating']>1.5)
				$service['rank'] = $service['rank'] + 2*10/100;
			else 
				$service['rank'] = $service['rank'] + 1*10/100; 
		}
		//print_r($Service1);
		/************************************************************************ 
		$Service1 is list of all owners sorted on based of location and having rank column to decide weightage's (to be shown up on Solar Model)
		$Service2 is list of all single enterpreneurs sorted on based of location and having rank column to decide weightage's (to be shown up on Solar Model)
		$interests is list of all service provider's based on his/her interest
		$friends_services is list of all service provider's based on friend list available  
		************************************************************************/
	echo json_encode(array("servicebranchdata"=>array_merge(array_slice($Service1,0,3),array_slice($Service2,0,3),array_slice($freeservices,0,6),array_slice($interests,0,6))));		
		
	//echo json_encode(array('ownerservices'=>array_slice($Service1,0,3),'singleservice'=>array_slice($Service2,0,3),'freeservices'=>array_slice($freeservices,0,6),'interests'=>array_slice($interests,0,6)));
	

?>