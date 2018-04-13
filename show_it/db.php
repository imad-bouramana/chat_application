<?php
$db = mysqli_connect("localhost","root","","show");
 if(mysqli_connect_errno()){
 	echo 'Faild To connect Whith' . mysqli_connect_error();
 }
?>