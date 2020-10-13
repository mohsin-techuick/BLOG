<nav class="navbar navbar-expand-lg navbar-light bg-dark text-white">
<div class="container"> 
  <a class="navbar-brand text-capetalize text-white" href="#">Techuick Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon text-white"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	  
       <ul class="navbar-nav mr-auto w-100 justify-content-between">
		   <li class="nav-item">
			   <a href="/PHPBlog/" class="nav-link text-white ml-md-3 <?php echo $_SERVER['REQUEST_URI']=="/PHPBlog/" ? 'active' : '' ?>" id="home">Home</a>
		   </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" >Account</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="/PHPBlog/users/login.php">Login</a>
                <a class="dropdown-item" href="/PHPBlog/users/register.php">Register</a>
                </div>
            </li>
        </ul>
	 
  </div>
  </div>
</nav>