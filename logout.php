<?php
@session_start();
  $_SESSION['flag'] = '';
  $_SESSION['email'] = '';
  $_SESSION['password'] = '';

  unset($_SESSION['flag']);

$_flag = 0;
session_destroy();
$_flag = '';

if($_flag == ''){
  header("location: index.php?fail=1");
}
?>