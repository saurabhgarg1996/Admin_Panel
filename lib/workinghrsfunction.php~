<?php
function insertintoworkinghours($day,$start_hour,$end_hour,$closed,$branch_id,$singleent_id,$freeservice_id)
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
        $sQuery = "INSERT INTO `workinghours` (`hrs_id`,`day`,`start_hour`, `end_hour`, `closed`,`branch_id`,`singleent_id`,`freeservice_id`, `timeStamp`) VALUES (NULL, '$day','$start_hour','$end_hour','$closed','$branch_id','$singleent_id','$freeservice_id','$created_at');";

        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
            $hrs_id = mysqli_insert_id($rConnection);

            //! Closing the connections
            dbConnectionClose($rConnection);

				return $hrs_id;
            //! Message Login
            comment_message_log('Query Executed Successfully.::: owner_id = $owner_id ::: '.$sQuery);
            comment_message_log('End of Function : '. __FUNCTION__);
        } else {
            comment_message_log('Query Execution failed. ::: '. $sQuery .' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            //! Closing the connections
            dbConnectionClose($rConnection);

            return E00100;
        }

}
function getAllworkinghrs()
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
        $sQuery = "SELECT * FROM `workinghours` ";
        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
           
            $data = array();

            //! retrieve the result from the result set
            while($aRow = mysqli_fetch_assoc($res)) {
                $data[] = $aRow;
            }

            //! Closing the connections
            dbConnectionClose($rConnection);

            //! Message Login
            comment_message_log('Query Executed Successfully.::: owner_id = $owner_id ::: '.$sQuery);
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