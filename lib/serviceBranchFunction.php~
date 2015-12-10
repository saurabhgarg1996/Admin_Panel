<?php
	function insertintoserviceBranch($service_id, $branch_name,$branch_email ,$branch_contact_name,$branch_mobile_number,$branch_landline_number,$branch_address,$branch_area ,$branch_city ,$branch_pincode ,$branch_state ,$branch_country ,$branch_lat ,$branch_lng,$isEnabled ,$listingType ,$ProvidesFreeSrvc ,$premiumStartDate ,$premiumEndDate,$amount_paid ,$created_at)
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
        $sQuery = "INSERT INTO `servicebranch` (`branch_id`,`service_id`, `branch_name`,`branch_email` ,`branch_contact_name`,`branch_mobile_number`,`branch_landline_number`,`branch_address`,`branch_area`,`branch_city` ,`branch_pincode`,`branch_state` ,`branch_country`,`branch_lat` ,`branch_lng`,`isEnabled` ,`listingType` ,`ProvidesFreeSrvc` ,`premiumStartDate` ,`premiumEndDate`,`amount_paid`,`timeStamp`) VALUES (NULL, '$service_id', '$branch_name' , '$branch_email' , '$branch_contact_name' , '$branch_mobile_number', '$branch_landline_number' , '$branch_address','$branch_area' ,'$branch_city' ,'$branch_pincode' ,'$branch_state' ,'$branch_country' ,'$branch_lat' ,'$branch_lng','$isEnabled ','$listingType ','$ProvidesFreeSrvc ','$premiumStartDate ','$premiumEndDate','$amount_paid' ,'$created_at');";

        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
            $branch_id = mysqli_insert_id($rConnection);

            //! Closing the connections
            dbConnectionClose($rConnection);

				return $branch_id;
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
	function insertintoimages($data,$singleent_id,$freeservice_id,$type,$image_name,$created_at)
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
        $sQuery = "INSERT INTO `images` (`img_id`,`branch_id`, `singleent_id`,`freeservice_id` ,`type`,`image_name`,`timestamp`) VALUES (NULL, '$branch_id','$sungleent_id','$freeservice_id','$type','$image_name' ,'$created_at');";

        //! Executing the query
        $res= mysqli_query($rConnection, $sQuery);

        /*!
         * Check If the Query executed properly
         */
        if($res ) {
            $img_id = mysqli_insert_id($rConnection);

            //! Closing the connections
            dbConnectionClose($rConnection);

				return $img_id;
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
	