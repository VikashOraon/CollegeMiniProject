<?php
  if(isset($_SESSION['id'])){
      header('location:index.php');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
  </head>
  <body>  
  <?php
    include 'include/header.php';
    ?>
    <br><br><br><br>
    <div class="container my-5 fill">
      <div class="row">
       <div class="col-md-4 offset-md-4">
         <div class="card text-white bg-info">
           <div class="card-header text-center">
             <h5>LOGIN</h5>
           </div>
           <div class="card-body">
             <form  role="form" action="login_script.php" method="POST">
              <div class="form-group">
                <label for="email">Email:</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" required>
               </div>
               <div class="form-group">
                  <label for="password">Password:</label>
                   <input type="password" class="form-control" placeholder="Password" name="password" required>
                   
                   <?php
                     echo isset($_GET['err']) ? $_GET['err'] : '';
                   ?>

                </div>
                   <button type="submit" name="submit" class="btn btn-outline-light btn-block">Login</button>
                   <div class="">
                    <p class="">Don't have an account? <a href="signup.html">Create one</a></p>
                   </div>
             </form>
           </div>
         </div>
        </div>
       </div>
      </div>

      <?php
    include 'include/footer.php';
    ?>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>