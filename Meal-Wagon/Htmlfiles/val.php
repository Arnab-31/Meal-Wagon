<?php
session_start();
$con=mysqli_connect('localhost','root','shresth');
if($con){
	echo("Connection successful");
}
else{
	echo("No connection");
}
mysqli_select_db($con,'MealWagon');
$name=$_POST['username'];
$pass=$_POST['password'];
$email=$_POST['email'];

$q="select * from user where Name='$name' && Password='$pass' ";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1){
	$_SESSION['username']=$name;
	header('location:preferences.php');
}
else{
	header('location:login.php');
}
?>