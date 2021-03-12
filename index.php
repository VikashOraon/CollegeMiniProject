<?php
    include 'include/db.php';
    
    //Fetching total number of users
    $total_query = "SELECT COUNT(userID) FROM users";
    $total_users = mysqli_query($con, $total_query) or die(mysqli_error($con));
    $total_users = mysqli_num_rows($total_users);

    //Fetching news
    $news_query = "SELECT news, issueDate FROM news WHERE category LIKE '%news%' AND votePoint > 0.75 * $total_users";
    $query_result = mysqli_query($con, $news_query) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>College Mini Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">CLG updates</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="about.php">About us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php 
      if(!isset($_SESSION['id'])){?>
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php }else{?>
          <li><a href="verification.php"><span class="glyphicon glyphicon-thumbs-up"></span> Vote</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
       <?php }?>
      </ul>
    </div>
  </div>
</nav>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="images/undraw_online_everywhere_cd90 (1).svg" alt="Image">
      </div>

      <div class="item">
        <img src="images/undraw_Organizing_projects_0p9a (1).svg" alt="Image">
      </div>

      <div class="item">
        <img src="images/undraw_following_q0cr.svg" alt="Image">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="background-image: none;">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="background-image: none;">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<br>
<div class="container-fluid textcenter">    
  <div class="row">
    <div class="col-md-4">
    <div>
      <div class="panel panel-success">
          <div class="panel-heading news">
             <h4 style="text-align:center">NEWS</h4>
          </div>
          <!-- Panel Body -->
          <div class="panel-body" >
            <div  style="height:430px; overflow-y:scroll;">
                <table class="table">
                  <tbody>
                     <?php 
                     //Generating news rows
                      while($news_array = mysqli_fetch_array($query_result)){?>
                        <tr>
                          <td><?php echo $news_array['news']; echo "<h6>".$news_array['issueDate']."</h6>"; ?></td>
                        </tr>
                     <?php }
                     ?>
                    <!-- <tr>
                      <td>Mary The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<h6>12/12/12</h6></td>
                    </tr>
                    <tr>
                      <td>July The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<h6>12/12/12</h6></td>
                    </tr> -->
                  </tbody>
                </table>
            </div>
          </div>
          <!-- Panel Body End -->
      </div>
      </div>
   </div>
    <div class="col-md-4"> 
    <div >
      <div class="panel panel-info">
        <div class="panel-heading">
           <h4 style="text-align:center">EVENTS</h4>
        </div>
        <!-- Panel Body -->
        <div class="panel-body">
          <div style="height:430px; overflow-y:scroll;">
              <table class="table">
                <tbody>
                <?php 
                      //Fetching events
                      $event_query = "SELECT news, issueDate FROM news WHERE category LIKE '%event%' AND votePoint > 0.75 * $total_users";
                      $event_query_result = mysqli_query($con, $event_query) or die(mysqli_error($con));

                     //Generating events rows 
                      while($event_array = mysqli_fetch_array($event_query_result)){?>
                        <tr>
                          <td><?php echo $event_array['news']; echo "<h6>".$event_array['issueDate']."</h6>";?></td>
                        </tr>
                     <?php }
                     mysqli_close($con);
                     ?>
                  <!-- <tr>
                    <td>Mary The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<h6>12/12/12</h6></td>
                  </tr>
                  <tr>
                    <td>July The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<h6>12/12/12</h6></td>
                  </tr> -->
                </tbody>
              </table>
          </div>
        </div>
        <!-- Panel Body End -->
      </div> 
    </div>   
    </div>
    <div class="col-md-4 text-center">
    <div>
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h4>SUBMIT</h4>
        </div>
        <form class="form-warning" action="submit_script.php" method="POST">
          <div class="form-group ">
            <br>
            <label class="h4" for="textArea">Have any News or know about any upcoming event?</label>
            <div>
            <label class="radio-inline"><input type="radio" name="category" value="news" checked>News</label>
            <label class="radio-inline"><input type="radio" name="category" value="event">Events</label>
            </div>
            <br>
            <textarea class="form-control" name="news" id="textArea" rows="10" placeholder="write here..." required></textarea><br>
              <div class="row">
                <div class=" col-xs-5 col-xs-offset-1">
                    <label for="issueDate">Issue Date</label>
                <input type="date" name="issueDate" class="form-control"placeholder="dd/mm/yyyy" required>
                </div>
                <div class="col-xs-5">
                 <label for="lastDate">Last Date</label>
                <input type="date" name="lastDate" class="form-control" placeholder="dd/mm/yyyy" required>
                </div>
            </div><br>
            <button class="btn btn-warning" type="submit" name="submit">POST</button>
            <?php
              echo isset($_GET['login_msg']) ? $_GET['login_msg'] : '';
            ?>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</div><br>

<?php
    include 'include/footer.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>