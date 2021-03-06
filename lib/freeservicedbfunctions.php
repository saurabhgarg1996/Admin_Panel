<?php
	function  insertintofreeservicedb($owner_id, $branch_id,$frees_name,$free_description,$counter,$created_at,$validity)
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
        $sQuery = "INSERT INTO `freeservicedb` (`id`,`owner_id`, `branch_id`,`free_name` ,`free_description`,`counter`,`timestamp`,`validity`) VALUES (NULL, '$owner_id', '$branch_id','$free_name','$free_description','$counter', '$created_at','$validity');";

        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
            $id = mysqli_insert_id($rConnection);

            //! Closing the connections
            dbConnectionClose($rConnection);

				return $id;
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
	?>