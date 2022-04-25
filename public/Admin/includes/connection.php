<?php
//Kết nối php với mysql 
$conn = mysqli_connect(
	"localhost",
	"root",
	"",
	"vietpro_mobile_shop"
);
mysqli_query($conn, "SET NAMES 'utf8' ");
?>