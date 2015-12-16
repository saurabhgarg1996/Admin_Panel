<?php
	
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
		include_once "../lib/searchfunctions.php";
		
		$search = $_POST['string'];
		
		$data1 = searchinall($search);
		$data2 = searchinsingle($search);
		$data3  = searchinservice($search);
		
		foreach ($data1 as &$data)
		{
			$data['name']=$data['sub_category_name'];
			$data['id']=$data['sub_category_id'];		
			unset($data['sub_category_name']);
			unset($data['sub_category_id']);		
			$data['number'] = 0;
		}
		foreach ($data2 as &$data)
		{
			$data['name']=$data['ent_name'];
			$data['id']=$data['ent_id'];
			unset($data['ent_name']);
			unset($data['ent_id']);		
			$data['number'] = 1;
		}
		foreach ($data3 as &$data)
		{
			$data['name']=$data['service_name'];
			$data['id']=$data['service_id'];
			unset($data['service_name']);
			unset($data['service_id']);		
			$data['number'] = 2;
		}
		//print_r($data1);
		
		echo json_encode(array("servicebranchdata"=>array_merge(array_slice($data1,0,5),array_slice($data2,0,5),array_slice($data3,0,5))));
		

?>