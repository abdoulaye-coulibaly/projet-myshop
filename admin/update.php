<?php
include ('../config.php');
$id=$_GET['id'];
$del=new users_informatioin();
$del->update_user($id);
header("location: user.php");
?>