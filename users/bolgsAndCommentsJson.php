<?php
include("../connection.php");
//Query for showing blogs with total likes of that blog using left join
$sql="SELECT blogs.*,likes.user_id as user_liked,likes.blog_id as like_blogid, COUNT(likes.blog_id) as likes FROM blogs LEFT JOIN likes ON blogs.id=likes.blog_id 
GROUP BY blogs.id order by blogs.id";
				
$res=mysqli_query($conn,$sql);

$allBlogs=[];
$allComments=[];

while($row=mysqli_fetch_assoc($res)){
	
	//comment for specific blog post
	$q2="SELECT * FROM comments WHERE blog_id={$row['id']}";
	$resu=mysqli_query($conn,$q2);
	$i=0;
	while($comments=mysqli_fetch_assoc($resu)){
		
		//user who posts the comment
		$q3="SELECT * FROM users WHERE id={$comments['user_id']} limit 1" ;
		$res3=mysqli_query($conn,$q3);
		$user=mysqli_fetch_assoc($res3);
		
		$row['comments'][]=$comments;
		
		$row['comments'][$i]['user']=$user;
		$i++;	
		
	}
	$allBlogs[]=$row;
}
echo json_encode($allBlogs);

