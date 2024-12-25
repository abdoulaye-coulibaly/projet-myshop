<?php
include ('../config.php');
$id=$_GET['id'];
$del=new product_information();
$del->del_product($id);
header("location:product.php");
?>