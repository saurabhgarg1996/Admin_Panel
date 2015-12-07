<?php
@session_start();

include_once "../lib/sm-connection.php" ;
include_once "../lib/sm-constant.php" ;
include_once "../lib/admin.php" ;

$user = $_POST['email'];
$pass = $_POST['password'];

$rg = aGetUserbyPass($user, $pass);

if(count($rg)>0){

	$_SESSION['flag'] = 1;
	$_SESSION['id'] = $rg['id'];
	$_SESSION['email'] = $rg['email'];
    $_SESSION['password'] = $rg['password'];

	header("location: ../user.php");

} else {

 header("location: ../index.php?fail=2");
}
?>