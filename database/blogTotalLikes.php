
<?php 	
//Here will be blogs like functionality
include("../connection.php");
$userid=$_POST['userid'];
$blogid=$_POST['blogid'];

$sql="SELECT blog_id, count(*) as totallikes FROM `likes` GROUP BY blog_id HAVING blog_id=$blogid";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($res);
$count=$row['totallikes'];
echo $count;