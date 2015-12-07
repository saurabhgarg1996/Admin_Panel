<?php
@session_start();

$_flag = '';
$_id = '';
$_username = '';
$_password = '';

if(isset($_SESSION['flag']) && isset($_SESSION['email'])){
	if($_SESSION['flag'] == 1){

		$_flag = 1;
		$_password = $_SESSION['password'];
        $_username = $_SESSION['email'];

	}

	else {
        $_SESSION['flag'] = 0;
        session_destroy();
        header("location: index.php?fail=3");
    }
	}else {
        $_SESSION['flag'] = 0;
        session_destroy();
        header("location: index.php?fail=3");
    }
?>