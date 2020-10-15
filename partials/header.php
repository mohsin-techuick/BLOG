<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
<div class="container"> 
  <a class="navbar-brand text-capetalize text-white" href="#">Techuick Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon text-white"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	  
       <ul class="navbar-nav mr-auto w-100">
		   
		   <?php if(isset($_SESSION['USER-NAME'])): ?>
			   <li class="nav-item mr-2">
				   <a href="/PHPBlog/users/dashboard.php" class="nav-link text-white ml-md-3" id="dashboard">Dashboard</a>
			   </li>
			 <li class="nav-item">
				 <a class="nav-link text-white" href="/PHPBlog/index.php" id="blogs">Blogs</a>
		   	</li>		 	
			<?php endif; ?>
		   <li class="ml-auto"></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" >
					<!--Display username only if user logged in-->
					<?php
						echo isset($_SESSION['USER-NAME']) ? $_SESSION['USER-NAME'] : "Accont";
					?>
				</a>
				<!--if user logined in show logout if  not  showlogin and register-->
                <div class="dropdown-menu">
					<?php if(isset($_SESSION['USER-NAME'])){ ?>
						<a class="dropdown-item" href="/PHPBlog/users/profile.php" id="profile">Profile</a>
						<a class="dropdown-item" href="/PHPBlog/database/userlogout.php">Logout</a>
					<?php } ?>
					<?php if(!isset($_SESSION['USER-NAME'])){  ?>
					<a class="dropdown-item" href="/PHPBlog/users/login.php">Login</a>
					<a class="dropdown-item" href="/PHPBlog/users/register.php">Register</a>
					<?php } ?>
                </div>
            </li>
        </ul>
	 
  </div>
  </div>
</nav>