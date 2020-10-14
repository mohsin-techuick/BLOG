<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
<div class="container"> 
  <a class="navbar-brand text-capetalize text-white" href="#">Techuick Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav  w-100">
		   <?php if(isset($_SESSION['ADMIN-NAME'])): ?>
		   <li class="nav-item">
			   <a href="../admin/dashboard.php" class="nav-link text-white" id="dashboard">Dashboard</a>
		   </li>
		   <?php endif; ?>
		   <div class="ml-auto"></div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" >
					
					<!--Display Admin email if logged in-->
					<?php
						if(isset($_SESSION['ADMIN-NAME'])){
							echo $_SESSION['ADMIN-NAME'];
						}
						else{
							echo "Account";
						}
					?>
                </a>
				<!--if admin in logged in show logout--> 
				<?php
				if(isset($_SESSION['ADMIN-NAME'])):
				?>
				<div class="dropdown-menu">
                	<a class="dropdown-item" href="../database/adminLogout.php">Logout</a>
                </div>
				<?php endif; ?>
				<!--if admin in not logged in show Login--> 
				<?php
				if(!isset($_SESSION['ADMIN-NAME'])):
				?>
				 <div class="dropdown-menu">
                	<a class="dropdown-item" href="/PHPBlog/admin/login.php">Login</a>
                </div>
				<?php endif; ?>
            </li>
        </ul>
  </div>
  </div>
</nav>
