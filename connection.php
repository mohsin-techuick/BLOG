<?php 

$host="localhost";
$username="root";
$password="";
$db="techuick_blog";

$conn=mysqli_connect($host,$username,$password,$db);
if(mysqli_connect_error()){
	die("connection filed");
}