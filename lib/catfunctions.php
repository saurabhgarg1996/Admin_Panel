<?php

    //! Insert Users Details
    function iInsertCats($categoryname,$showinapp) {
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
        $sQuery = "INSERT into category (category_name , show_in_app , version_num ) VALUES('".$categoryname."','$showinapp', 0 )";

        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
            $iId = mysqli_insert_id($rConnection);

            //! Closing the connections
            dbConnectionClose($rConnection);

            //! Message Login
            comment_message_log('Query Executed Successfully.::: id = $iId ::: '.$sQuery);
            comment_message_log('End of Function : '. __FUNCTION__);

            return $iId;
        } else {
            comment_message_log('Query Execution failed. ::: '. $sQuery .' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            //! Closing the connections
            dbConnectionClose($rConnection);

            return E00100;
        }
    }

    
	function aGetAllCats()
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
        $sQuery = "SELECT * FROM `category`";

        //! Executing the query
        $rResultSet = mysqli_query($rConnection , $sQuery);

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

	function aGetCatById($cat){
		
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
        $sQuery = "SELECT * FROM `category` WHERE md5(category_id) = '$cat';";

        //! Executing the query
        $rResultSet = mysqli_query($rConnection , $sQuery);

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
                $aData = $aRow;
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
	 function updateCat($categoryid)
    {
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
       //! Query_1
       //$sQuery1 ="update  category_version set version_num = version_num + 1 , updated_at = Now() where serial_no = 1";
                                        

       //! Executing the query_1
      // $rResultSet1= mysqli_query($rConnection, $sQuery1) or die(mysqli_error($rConnection));
      
      
		// if(mysqli_affected_rows($rConnection)>0){
         // $sQuery2="SELECT * from category_version where serial_no = 1 ";
          //$sResultSet2 = mysqli_query($rConnection, $sQuery2) or die(mysqli_error($rConnection));
      //    if(mysqli_num_rows($qresult2)>0){
            /*  $r = mysqli_fetch_array($sResultSet2);
              $version_num = $r['version_num'];*/
	           $sQuery3 = "UPDATE category set version_num = version_num + 1   WHERE `category_id` = '$categoryid'";
      	     $aResultSet3 = mysqli_query($rConnection, $sQuery3) or die(mysqli_error($rConnection));
         	  if(mysqli_affected_rows($rConnection)>0)
               {
                 header("Location: ../catAdd.php?resp=success"); 
               }
         // }
              
         //! Closing the connections
       dbConnectionClose($rConnection);
       
       comment_message_log('End of Function : '. __FUNCTION__);

  //  }	
  }
  function iUpdateCats($id,$name,$show_in_app)
  {
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
        $sQuery = "UPDATE category SET `category_name` = '$name' , `show_in_app` = '$show_in_app' WHERE `category_id` = '$id' "; 
        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
           //! Closing the connections
            dbConnectionClose($rConnection);

            //! Message Login
            comment_message_log('Query Executed Successfully.::: id = $iId ::: '.$sQuery);
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