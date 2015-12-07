<?php
function aGetUserbyPass($user, $pass)
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
        $sQuery = "SELECT * FROM `admin` where `email` = '$user' AND `password` = '$pass';";

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
?>