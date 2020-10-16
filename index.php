<?php session_start(); ?>
<?php if(!isset($_SESSION['USER-NAME'])){
	header("Location:users/login.php");	
	exit();
}  
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Techuick Blogging System</title>
	<!-- Bootstrap css file -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- Custom style file -->
	<link rel="stylesheet" href="assets/css/index.css">
	<!--FontAwesome Css-->
	<link rel="stylesheet" href="assets/fontawesome/css/all.css">
	<!--Style for current active link-->
	<style type="text/css">
	   .active{
		   background-color: green;
		   color: white;
	   }
		.like:hover > i{
	
			color: #dc3545 !important;
		}
	</style>
</head>
<body>
	<!-- including header -->
	<?php include_once("partials/header.php"); ?>
	<div class="container">
		<div id="blog-list">
			<h1>BLOGS</h1>
			<div class="row">
				<?php
					include("connection.php");
					//Query for showing blogs with total likes of that blog using left join
					$sql="SELECT blogs.*,likes.user_id as user_liked,likes.blog_id as like_blogid, COUNT(likes.blog_id) as likes FROM blogs LEFT JOIN likes ON blogs.id=likes.blog_id 
					GROUP BY blogs.id order by blogs.id";
				
					$res=mysqli_query($conn,$sql);
					while($row=mysqli_fetch_assoc($res)):
				?>
				<div class="col-md-4 blog-post mb-2">
					<div class="card">
						<img src="<?php echo '/PHPBlog/'.$row['thumbnail']; ?>"  alt="thumbnail" class="card-img-top">
						<div class="card-body">
							<p class="text-lowercase text-justify"><?php echo $row['title']; ?></p>
							<hr />
								<!--Display only 100 characters of description-->
								<?php
								$desc=$row['description'];
									if(strlen($desc)>100){
									$desc=substr($desc, 0, 100).'...'; 				
								}
								echo "<p>$desc</p>";
								?>
							<!--Read more only of it contains more than 100 characters-->
								<!-- link trigger modal -->
							<?php if(strlen($desc)>100): ?>				
								<a href="javascript:void(0);" role="button" data-toggle="modal" data-target="#readmoreModel<?php echo $row['id']; ?>">
								 Read more
								</a>
							<?php endif; ?>		
							
						<!-- Modal for read more functionality -->
						<div class="modal fade" id="readmoreModel<?php echo $row['id']; ?>" tabindex="-1" role="dialog">
						  <div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title text-dark text-uppercase" id="readmoreModel">
									<?php echo $row['title']; ?>
								 </h5>
								<button type="button" class="close" data-dismiss="modal">
								  <span>&times;</span>
								</button>
							  </div>
							  <div class="modal-body" >
								  <p class="text-dark"><?php echo $row['description']; ?></p>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							  </div>
							</div>
						  </div>
						</div>		
						</div>
						<div class="card-footer">
							<!-- LIKE SECTION START-->
								<a href="" class="like text-decoration-none text-dark" 
								   data-blogid="<?php echo $row['id'] ?>">
									<i class="fa fa-thumbs-up text-dark"></i>	
									<strong><?php echo $row['likes']; ?></strong>
								</a>
							<!--COMMMENTS SECTION START-->
							<form method="post" class="form-inline mt-2" autocomplete="off"
								  data="<?php echo $row['id'] ?>">
								<input type="hidden" class="userid"
									   value="<?php echo $_SESSION['USER-ID']; 
											  ?>">
								<input type="hidden" class="blogid" 
									   value="<?php echo $row['id']; ?>">
								<input type="text" name="comment" placeholder="Comment" class="form-control mr-2 comment">
								<input type="button" value="post" class="btn btn-primary postCommentBtn" >
							</form>	
							
							<?php
							
							// Display total no of comments for specific blog
							
							$tsql="SELECT blog_id,count(*) as 'totalComment' 
							FROM comments 
							WHERE blog_id={$row['id']} 
							GROUP by blog_id";
							$countResult=mysqli_query($conn,$tsql);
							$data=mysqli_fetch_assoc($countResult);
							
							?>
							<a href="" class="toggle_comment d-block text-center p-2 text-dark">
								comments ( 
									<?php echo  $data=$data['totalComment'] ? $data['totalComment']  : "0"; ?> 
								)
							</a>
							
	
						<div class="comments" style="max-height: 500px;overflow: auto">
							 <?php  
								$q2="SELECT * FROM comments WHERE blog_id={$row['id']} order by posted_date desc";
								$resu=mysqli_query($conn,$q2);
								while($cmt=mysqli_fetch_assoc($resu)):
							?>
							 <div class="media">
								<img src="db_images/1602578755nigerian_currency.jpg" width="40" height="40" 
									 class="mr-3 rounded-circle" alt="user profile">
								<div class="media-body">
									<h5 class="mt-0"><?php echo $cmt['user_id'];  ?> 
										<small>
										<i><?php echo $cmt['posted_date']; ?> </i>
										</small></h5>
									<p id="comment"><?php echo $cmt['comment']; ?></p>
								</div>
							</div>
							<hr>
							<?php endwhile; ?>
						</div>
							<!--COMMMENTS SECTION END-->
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
			<!-- Including footer -->
	<?php  include_once("partials/footer.php"); ?>
	<!-- Bootstrap Jquery, popper.js and javascript -->
	<script src="assets/bootstrap/js/jquery-3.4.1.min.js" type="text/javascript"></script>
	<script src="assets/bootstrap/js/popper.min.js" type="text/javascript"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#blogs").addClass("active");
			$(".comments").hide();
			//ajax request for likes blogs
			function likeAjax(uid,bid){
				$.ajax({
					url:"database/blogLikesDislike.php",
					type:"POST",
					data:{userid:uid,blogid:bid},
					success:function(response){
						
					}
				});
			}
			
			$(".like").on('click',function(e){
				e.preventDefault();
				var user_id="<?php echo $_SESSION['USER-ID']; ?>";
				var blog_id=$(this).data('blogid');
				likeAjax(user_id,blog_id);
				
			});
			
			//Comments functionality
			$(".toggle_comment").click(function(evt){
				evt.preventDefault();
				var a=$(this).next(".comments").toggle(500);
			});
			
				$(".postCommentBtn").click(function(evt){
					evt.preventDefault();
					var userId=$(this).parent('form').find('.userid').val();
					var blogId=$(this).parent('form').find('.blogid').val();
					var comment=$(this).parent('form').find('.comment').val();
					postComment(userId,blogId,comment);
					
				});
			
			function postComment(uid,bid,cmt){
				$.ajax({
					url:"database/comments.php",
					type:"POST",
					data:{userid:uid,blogid:bid,comment:cmt},
					success:function(response){
						console.log(response);
						
						
						
					}
				});
			}
			
			function blogsCommentsAjax(){
				$.ajax({
					url:"users/bolgsAndCommentsJson.php",
					type:"GET",
					success:function(response){
						let blogs=JSON.parse(response);
						console.log(blogs);
					}
				});
			}
			blogsCommentsAjax();
			
			
		});
	</script>
</body>
</html>