<?php
session_start();
$con=mysqli_connect('localhost','root','');
if($con){
	echo("Account created successfully!");
	header('location:login.php');
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
	echo("Already registered!");
	header('location:login.php');
}
else{
	$qy="insert into user(Name,Password,Email) values('$name','$pass','$email') ";
	mysqli_query($con,$qy);
}
?>