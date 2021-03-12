<?php
  include 'include/db.php';

  if(!isset($_SESSION['id'])){
    header('location:index.php');
  }

  $userID = $_SESSION['id'];
  $ids = array();

  //getting newsId that the user has voted
  $votedId_query = "SELECT newsID FROM votes WHERE voteBy = $userID";
  $votedId_query_result = mysqli_query($con, $votedId_query) or die(mysqli_error($con));

  while($votedIdArr = mysqli_fetch_array($votedId_query_result)){
    $ids[] = $votedIdArr[0];
  }

  //this will create a string of elements of ids[] separated by comas
   $id = implode(",", $ids);
   $index = 1;
  
   //fetching news that user has not voted
  $news_query = "SELECT newsID, news, issueDate FROM news WHERE newsID NOT IN($id)";
  $news_result = mysqli_query($con,$news_query) or die(mysqli_error($con));
  
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <title>Verification page</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
   <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <?php
    include 'include/header.php';
    ?>
            <div class="container fill">
              <div class="row">
                <h3 class="display-4">Verify the news or events</h3>
              </div>
              <div class="row">
                <div class="col-lg-8">
                  <form action="verification_script.php" method="POST">
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">News/Events</th>
                        <th scope="col">Issue Date</th>
                        <th scope="col">Verify</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      while($news = mysqli_fetch_array($news_result)){?>
                        <tr>
                        <td><?php echo $index++; ?></td>
                        <td><?php echo $news['news']; ?></td>
                        <td><?php echo $news['issueDate']; ?> </td>
                        <td>
                          <div>
                            <label class="radio-inline"><input type="radio" name="id[<?php echo $news['newsID']; ?>]" value="TRUE" checked>&check;</label>
                            <label class="radio-inline"><input type="radio" name="id[<?php echo $news['newsID']; ?>]" value="">&cross;</label>
                            </div>
                          </td>
                      </tr>
                     <?php }
                    ?>
                      <!-- <tr>
                        <td>1</td>
                        <td>John The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</td>
                        <td>12/12/12</td>
                        <td>
                          <div>
                            <label class="radio-inline"><input type="radio" name="id[3]" value="TRUE" checked>&check;</label>
                            <label class="radio-inline"><input type="radio" name="id[3]" value="">&cross;</label>
                            </div>
                          </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Mary The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</td>
                        <td>12/12/12</td>
                        <td>
                          <div>
                            <label class="radio-inline"><input type="radio" name="id[4]" value="TRUE" checked>&check;</label>
                            <label class="radio-inline"><input type="radio" name="id[4]" value="">&cross;</label>
                            </div>
                          </td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</td>
                        <td>12/12/12</td>
                        <td>
                          <div>
                            <label class="radio-inline"><input type="radio" name="id[5]" value="TRUE" checked>&check;</label>
                            <label class="radio-inline"><input type="radio" name="id[5]" value="">&cross;</label>
                            </div>
                          </td>
                      </tr> -->
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          <button type="submit" class="btn btn-block btn-outline-info">Submit</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  </form>
                </div>
                <div class="col-lg-4">
                  <img class="img-fluid" src="images/undraw_like_dislike_1dfj.svg" alt="">
                </div>
              </div>
            </div>

            <?php
                include 'include/footer.php';
            ?>
      
      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
  </html>