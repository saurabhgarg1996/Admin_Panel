<?php
	function distance($lat1,$lat2,$lon1,$lon2)
		{
			  $theta = $lon1 - $lon2;
			  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
			  $dist = acos($dist);
			  $dist = rad2deg($dist);
			  $miles = $dist * 60 * 1.1515;	
			  return $miles*1.6;
		}
	function getAlldetails($id,$lat,$lng)
	{
		//! Message Loggin
        comment_message_log('Start of Function : '. __FUNCTION__);

        //! Data base connection
        $rConnection = dbConnection();

        /*!
         * Check if the database Connection is failed
         */
        if(!$rConnection) {
            //! Message Loggin
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00010;
        }

        //! Query
        $sQuery = "SELECT * FROM `servicesubcatrelation` a,`ownerservice` b,`servicebranch` c WHERE a.sub_category_id=$id and a.service_id=b.service_id and b.service_id=c.service_id ";
                //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
           
            $data = array();

            //! retrieve the result from the result set
            while($aRow = mysqli_fetch_assoc($res)) {
            	if(distance($lat,$aRow['branch_lat'],$lng,$aRow['branch_lng']) < 300)
                {$data[] = $aRow;}
            }

            //! Closing the connections
            dbConnectionClose($rConnection);

            //! Message Login
            comment_message_log('Query Executed Successfully.::: '.$sQuery);
            comment_message_log('End of Function : '. __FUNCTION__);

            return $data;
        } else {
            comment_message_log('Query Execution failed. ::: '. $sQuery .' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            //! Closing the connections
            dbConnectionClose($rConnection);

            return E00100;
        }	
	
	}
?>
