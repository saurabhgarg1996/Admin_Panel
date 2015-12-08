<?php

    //! Insert Users Details
    function iInsertSubCats($category_id, $sub_category_name, $show_in_app, $version_num) {
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
        $sQuery = "INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `show_in_app`, `version_num`) VALUES (NULL,'$category_id', '$sub_category_name', '$show_in_app', '$version_num');";

        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
            $subcategoryid = mysqli_insert_id($rConnection);

            //! Closing the connections
            dbConnectionClose($rConnection);

            //! Message Login
            comment_message_log('Query Executed Successfully.::: sub_category_id = $subcategoryid ::: '.$sQuery);
            comment_message_log('End of Function : '. __FUNCTION__);

            return $subcategoryid;
        } else {
            comment_message_log('Query Execution failed. ::: '. $sQuery .' ::: '.@mysqli_error($rConnection));
            comment_message_log('End of Function : '. __FUNCTION__);
            //! Closing the connections
            dbConnectionClose($rConnection);

            return E00100;
        }
    }

    
	function aGetAllSubCatsByCat($cat)
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
        $sQuery = "SELECT * FROM `sub_category` WHERE `category_id` = '$cat'  ;";

        //! Executing the query
        $rResultSet = mysqli_query($rConnection,$sQuery);

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

	function aGetAllSubCats()
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
        $sQuery = "SELECT * FROM `sub_category`  ;";

        //! Executing the query
        $rResultSet = mysqli_query($rConnection,$sQuery);

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
    function update($subcategoryid,$categoryid)
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
      // $sQuery1 ="update  sub_category_version set version_num = version_num + 1 , updated_at = Now() where serial_no = 1";
                                        

       //! Executing the query_1
       //$rResultSet1= mysqli_query($rConnection, $sQuery1) or die(mysqli_error($rConnection));
      
      
		 //if(mysqli_affected_rows($rConnection)>0){
      //   $sQuery2="SELECT * from sub_category_version where serial_no = 1 ";
         // $sResultSet2 = mysqli_query($rConnection, $sQuery2) or die(mysqli_error($rConnection));
          //if(mysqli_num_rows($qresult2)>0){
            //  $r = mysqli_fetch_array($sResultSet2);
              //$version_num = $r['version_num'];
	           $sQuery3 = "UPDATE sub_category set version_num = version_num+1 WHERE sub_category_id = $subcategoryid";
      	     $aResultSet3 = mysqli_query($rConnection, $sQuery3) or die(mysqli_error($rConnection));
         	  if(mysqli_affected_rows($rConnection)>0)
               {
                 header("Location: ../subcatAdd.php?resp=success&catid=$categoryid"); 
               }
         // }
              
         //! Closing the connections
       dbConnectionClose($rConnection);
       
       comment_message_log('End of Function : '. __FUNCTION__);

    //}	
  }
  
?>