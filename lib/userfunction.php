	<?php
function aGetAllUsers()
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
        $sQuery = "SELECT * FROM `user`  ;";

        //! Executing the query
        $rResultSet = mysqli_query( $rConnection, $sQuery);

         //! Closing the connections
        dbConnectionClose($rConnection);

        /*!
         *  Check If the Query executed properly
         */
        if($rResultSet !='') {
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            $aData = array();

            //! retrieve the result from the result set
            while($aRow = mysqli_fetch_assoc($rResultSet)) {
                $aData[] = $aRow;
            }

            comment_message_log('End of Function : '. __FUNCTION__);
            return $aData;
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }
    }
	
	function getuserbyid($id)
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
        $sQuery = "SELECT * FROM `user` WHERE user_id=$id ;";

        //! Executing the query
        $rResultSet = mysqli_query( $rConnection, $sQuery);

         //! Closing the connections
        dbConnectionClose($rConnection);

        /*!
         *  Check If the Query executed properly
         */
        if($rResultSet !='') {
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            $aData = array();

            //! retrieve the result from the result set
            while($aRow = mysqli_fetch_assoc($rResultSet)) {
                $aData[] = $aRow;
            }

            comment_message_log('End of Function : '. __FUNCTION__);
            return $aData;
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }
    }
    function insertintofav($user_id,$service_id)
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
		 $sQuery = "SELECT * FROM `fav` WHERE user_id=$user_id and service_id=$service_id";
		 $rResultSet = mysqli_query( $rConnection, $sQuery);
       if(mysqli_num_rows($rResultSet) > 0) 
       {
       		$sQuery = "DELETE FROM `fav` WHERE user_id=$user_id and service_id=$service_id";
       		$rResultSet = mysqli_query( $rConnection, $sQuery);
       		if($rResultSet) {
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            

            //! retrieve the result from the result set
   

            comment_message_log('End of Function : '. __FUNCTION__);
            return 1;
            
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }
       } 
       else{
        $sQuery = "INSERT INTO `fav` (`id`,`user_id`,`service_id`) VALUES (NULL,'$user_id','$service_id');";
        $rResultSet = mysqli_query( $rConnection, $sQuery);
        if($rResultSet) {
        		 mysqli_insert_id($rConnection);
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            

            //! retrieve the result from the result set
   

            comment_message_log('End of Function : '. __FUNCTION__);
            return 0;
            
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }
		}
        //! Executing the query
        

         //! Closing the connections
        dbConnectionClose($rConnection);

        /*!
         *  Check If the Query executed properly
         */
        
    	
    	}
    	function addintofriendlist($user_id,$friend)
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
        $sQuery = "INSERT INTO `friend_list` (`user_id`,`friend_name`) VALUES ('$user_id','$friend_name');";

        //! Executing the query
        $rResultSet = mysqli_query( $rConnection, $sQuery);

         //! Closing the connections
        dbConnectionClose($rConnection);

        /*!
         *  Check If the Query executed properly
         */
        if($rResultSet !='') {
            //! Message Login
            comment_message_log('Query Executed Successfully. ::: '.$sQuery);
            

            //! retrieve the result from the result set
   

            comment_message_log('End of Function : '. __FUNCTION__);
            return 1;
            
        } else {
            //! Message Loggin
            comment_message_log('Query Execution failed. ::: '. $sQuery.' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            return E00100;
        }
    		
    	}
	
?>