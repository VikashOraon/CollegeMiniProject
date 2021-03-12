 <nav class="navbar navbar-expand-lg navbar-dark dark">
 <a class="navbar-brand" href="#">CLG updates</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
 </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto">
     <li class="nav-item active">
       <a class="nav-link" href="index.html">Home</a>
     </li>
     <li class="nav-item active">
       <a class="nav-link" href="about.html">About us</a>
     </li>
   </ul>
   <ul class="navbar-nav">

     <?php 
     if(isset($_SESSION['id'])){?>

      <li class="nav-item active">
           <a class="nav-link" href="verification.php"><span class="glyphicon glyphicon-thumbs-up"></span> Vote</a>
       </li>
      <li class="nav-item active">
          <a class="nav-link" href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
      </li>

     <?php }
     else{?>

      <li class="nav-item active">
         <a class="nav-link" href="signup.php"><span class="glyphicon glyphicon-user"></span>Signup</a>
      </li>
      <li class="nav-item active">
           <a class="nav-link" href="login.php"><span class="glyphicon glyphicon-log-in"></span>Login</a>
       </li>

     <?php }?>
     </ul>
   </ul>
 </div>
</nav>