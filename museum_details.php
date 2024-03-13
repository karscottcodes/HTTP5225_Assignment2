<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

?>
<!doctype html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Museum Comment Site | Details</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link href="admin/css/styles.css" type="text/css" rel="stylesheet">

  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  <!-- Used by Adam (May Remove) -->

</head>

<body>
<header>
    <div class="container">
      <div class="row">
        <nav class="navbar navbar-expand-lg">

          <a class="navbar-brand" href="#">
            <img src="admin/imgs/logoA.png" alt="Toronto Gallery Guide Logo" width="297" height="75" class="d-inline-block align-text-top">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="museum_list.php">Museums</a>
              </li>
          </ul>
          
            <?php
            if(isset($_GET['userid'])){
              echo'
              <form class="d-flex">
              <a class="btn btn-outline-success" href="logout.php">Logout</a>
              </form>
              ';
            }
            else{
              echo'
              <form class="d-flex">
                          <a class="btn btn-outline-success" href="login.php">Login</a>
                          </form>
              ';
            }
            ?>

          
        </div>
      </div>
    </div>
  </header>

    <?php

if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $museumID = mysqli_real_escape_string($connect, $_GET['id']);

    $queryMuseums = "SELECT *
                  FROM museums m
                  WHERE m.id = '$museumID'";

    $queryComments = "SELECT c.*,m.*,u.*, CONCAT(u.first, ' ', u.last) AS username
    FROM comments c
    LEFT JOIN museums m ON m.id = c.museum_id
    LEFT JOIN users u ON u.id = c.user_id
    WHERE m.id = '$museumID'";


    $resultMuseum = mysqli_query($connect, $queryMuseums);

    $resultComments = mysqli_query($connect, $queryComments);

    // $resultUser = mysqli_query($connect, $queryUser);

    if (!$resultMuseum || !$resultComments ) {
        echo 'Error Message: ' . mysqli_error($connect) . '.';
        exit;
    }

    if (mysqli_num_rows($resultMuseum) > 0){
        $museum = mysqli_fetch_assoc($resultMuseum);

        echo '
        <section>
        <div class="container">
          <div class="row">
            <h1 class="text-center mt-4">'. $museum['name'] .'</h1>
            <div class="mt-3">
            <img src="'. $museum['image'] .'" class="card-img-top" alt=' . $museum['name'] . '>
            <p class="card-text">' . $museum['summary'] . '</p>
            <p>'. $museum['address'] . '</p>
            <p>'. $museum['postalcode'] . '</p>
            <p>'. $museum['phone'] . '</p>
            <p>'. $museum['ward'] . '</p>
            <p>'. $museum['url'] . '</p>
            </section>
            <section>
              <div class="container">
                <div class="row">
                  <h2>Recent Comments</h2>
                  <div class="col-sm-8">
        ';
    }
    
    echo '<div class="list-group">';

    while ($comment = mysqli_fetch_assoc($resultComments)) {
        echo '
        <div class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">'.$comment['username'].'</h5>
            <small>'.$comment['dateAdded'].'</small>
          </div>
          <p class="mb-1">'.$comment['comment'].'</p>
         </div>
        ';
    }

    echo '</div>';


  
if(isset($_GET['userid'])){

      echo'
      <h4>Logged in as: '.$_SESSION['username'].'</h4>
              <form action="comment/add_comment.php" method="POST">
              <input type="hidden" id="userid" name="userid" value="'.$_GET['userid'].'">
              <input type="hidden" id="museum_id" name="museum_id" value="'.$museumID.'">
              <h5>Commenting on: '. $museum['name'] .'</h5>
                <div>
                  <label for="comment">Comment</label>
                  <input type="text" id="comment" name="comment">
                </div>
                <button type="submit" class="btn btn-secondary text-white" name="addComment">Submit</button>
              </form>
            </div>
          </div>
        </div>
    
      </section>
      ';
  
  }
  else{
    echo'

            <h3>Please Login to comment<h3>
            <a href="login.php" class="btn btn-secondary text-white">Login</a>
          </div>
        </div>
      </div>
  
    </section>
    ';
  }              
}
  ?>
</body>
</html>