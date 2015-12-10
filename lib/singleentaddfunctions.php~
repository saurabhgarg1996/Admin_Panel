<?php
	function insertintosingleentadd($owner_id,$address,$area ,$city ,$pincode ,$state ,$country ,$lat ,$lng);
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
        $sQuery = "INSERT INTO `singleentadd` (`add_id`,`owner_id`,`address`,`area`,`city` ,`pincode`,`state` ,`country`,`lat` ,`lng`) VALUES (NULL, '$owner_id', '$address','$area' ,'$city' ,'$pincode' ,'$state' ,'$country' ,'$lat' ,'$lng');";

        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
            $service_id = mysqli_insert_id($rConnection);

            //! Closing the connections
            dbConnectionClose($rConnection);

            //! Message Login
            comment_message_log('Query Executed Successfully.::: owner_id = $owner_id ::: '.$sQuery);
            comment_message_log('End of Function : '. __FUNCTION__);

            return $add_id;
        } else {
            comment_message_log('Query Execution failed. ::: '. $sQuery .' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            //! Closing the connections
            dbConnectionClose($rConnection);

            return E00100;
        }
    }

?>