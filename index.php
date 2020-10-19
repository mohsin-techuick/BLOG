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
		   background-color: black;
		   color: white;
		   text-align: center;
	   }
		.like:hover > i{
	
			color: #dc3545 !important;
		}
	</style>
</head>
<body>
	<!-- including header -->
	<?php include_once("partials/header.php"); ?>
	<div class="container-fluid p-3">
			<h1 class="jumbotron bg-dark text-white text-center rounded-0">
				BLOGS
			</h1>
			<div class="row justify-content-center" >
				<div class="col-md-10">
					<div class="row" id="allblogs"></div>
				</div>
				<!--HERE DATA WILL BE APPENDED USING AJAX FUNCTION -->
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
//			$(".comments").hide();
			//ajax request for likes blogs
			function likeAjax(uid,bid){
				$.ajax({
					url:"database/blogLikesDislike.php",
					type:"POST",
					data:{userid:uid,blogid:bid},
					success:function(response){
						//if like success fetch all data using ajax
						blogsCommentsAjax();	
					}
				});
			}
			
			$("#allblogs").on('click','.like',function(e){
				e.preventDefault();
				var user_id="<?php echo $_SESSION['USER-ID']; ?>";
				var blog_id=$(this).data('blogid');
				likeAjax(user_id,blog_id);
			});
			//Comments functionality
			$("#allblogs").on('click','.toggle_comment',function(evt){
				evt.preventDefault();
				var a=$(this).next(".comments").toggle(500);
			});
			
				$("#allblogs").on('click','.postCommentBtn',function(evt){
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
						//if comment posted success then fecth all data using ajax
						blogsCommentsAjax();
					}
				});
			}
			
			function blogsCommentsAjax(){
				$.ajax({
					url:"users/bolgsAndCommentsJson.php",
					type:"GET",
					success:function(response){
						console.log(JSON.parse(response));
						let testing="testing";
						let blogs=JSON.parse(response);
				
						let html="";
						
						
						for(let key in blogs){
							
							let blog= blogs[key]; // complete blog with all commnet for that blog
							
							html+="<div class='col-md-4 blog-post mb-2'>";
							html+="<div class='card border-0'>";	
							//here will be image of post
							html+="<img src='/PHPBlog/"+blog.thumbnail+"' alt='thumbnail' class='card-img-top'>";
							html+="<div class='card-body p-0'>";
								//here will be title of post
							html+="<p class='text-lowercase text-justify p-3'>"+blog.title+"</p>";
							html+="<hr />";
							//here will be post description
							html+="<p class='p-3'>"+blog.description+"</p>";
							html+="<div class='card-footer bg-white'>";
							
								/* LIKE SECTION START */										
								//post od here insode data-blogid $row['id']
							html+="<a href='' class='like text-decoration-none text-dark' data-blogid='"+blog.id+"'>"
							+"<i class='fa fa-thumbs-up text-dark'></i>"
								//totallikes here $row['likes']
							+"<strong class='ml-2'>"+blog.likes+"</strong>"
							+"</a>";

								/* LIKE SECTION END */
							
								/*COMMMENTS SECTION START*/
							
									/*COMMENT FORM START*/
							html+="<form method='post' data="+blog.id+" class='form-inline mt-2' autocomplete='off'>";
							
							html+="<input type='hidden' class='userid' value='<?php echo $_SESSION['USER-ID'];?>'>";							
							html+="<input type='hidden' class='blogid' value='"+blog.id+"'>";
							html+="<input type='text' name='comment' placeholder='Comment' class='form-control mr-2 comment'>";
							html+="<input type='button' value='post' class='btn btn-primary mt-2 postCommentBtn'>";
							html+="</form>";	
									
									/*COMMENT FORM END*/
							
							
								/*COMMENT SHOW SECTION START*/
							
							html+="<a href='' class='toggle_comment d-block text-center p-2 text-dark'>"+
								"comments ("+blog.comments.length+")"+
							"</a>";
							
	
						//Comment section parent
						html+="<div class='comments' style='max-height: 500px;overflow: auto;display:none'>";
							//here till be loop
							for(let blogComments in blog.comments){
								let cmt=blog.comments[blogComments];
												
								html+="<div class='media'>";
								html+="<div>";
								html+="<img src='/PHPBlog/"+cmt.user.profile_pic+"' width='50px' height='40' class='mr-3 rounded-circle' alt='user profile'>";
								html+="<p style='width:50px;text-align:center'><small>"+cmt.user.firstname+"</small><p>";
								html+="</div>";
								html+="<div class='media-body'>";
									//here will use user_id of comment //echo $cmt['user_id'];
							
								html+="<h6><i>"+cmt.posted_date+"</i></h6>";
								//here will be comoment $cmt['comment'];
								html+="<p>"+cmt.comment+"</p>";
								html+="</div>";
								html+="</div>";

							}
							
						html+="</div>"; //comment section parent end
								
						/*COMMENT SHOW SECTION END*/
							
							
							html+="</div>"; //CARD FOOTER END
							html+="</div>"; //CARD BODY END
							html+="</div>";  //END CARD CLASS
							html+="</div>";  //END COL CLASS
							}
						$("#allblogs").html(html);
					}
				});
			}
			
			blogsCommentsAjax();
		});
	</script>
	
	
</body>
</html>