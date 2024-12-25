<?php
include ('../config.php');
$id=$_GET['id'];
$del=new users_informatioin();
$del->del_user($id);
header("location:user.php");
?>