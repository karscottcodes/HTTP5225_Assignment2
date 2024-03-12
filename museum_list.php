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
  <title>Museum Comment Site</title>

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
            <form class="d-flex">
              <a class="btn btn-secondary text-white nav-btn" href="login.php">Login</a> &nbsp
            </form>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <section>
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
        $query = 'SELECT m.*, 
        COUNT(c.id) AS comment_count,
        MAX(c.comment) AS latest_comment,
        MAX(c.dateAdded) AS latest_comment_date
          FROM museums m
          LEFT JOIN comments c ON m.id = c.museum_id
          LEFT JOIN (
              SELECT museum_id, MAX(dateAdded) AS max_dateAdded
              FROM comments
              GROUP BY museum_id
          ) AS latest_comment_subquery ON m.id = latest_comment_subquery.museum_id AND c.dateAdded = latest_comment_subquery.max_dateAdded
          GROUP BY m.id, m.name, m.image, m.address, m.type, m.summary, m.phone, m.url, m.postalcode, m.ward
          ORDER BY m.id';

        
        $result = mysqli_query($connect, $query);
        
        foreach ($result as $museum) {
          echo "
                <div class='col'>
                  <div class='card h-100'>
                      <img src=".$museum['image']." class='card-img-top' alt='".$museum['name']."'>
                      <div class='card-body'>
                        <h5 class='card-title'>".$museum['name']."</h5>
                        <p class='card-text'>".$museum['summary']."</p>
                        <div class='text-center'>
                        <form>
                        <input type='hidden' value='".$museum['id']."'>
                        <a class='btn btn-outline-dark' href='museum_details.php?id=".$museum['id']."'>Museum Details</a>
                    </form>
                        </div>
                        
                      </div>
                      <div class='card-footer text-body-secondary'>
                      <p class='card-text'> Comments: " . $museum['comment_count'] . "</p>
                      <p class='card-text'> Recent Comment: " . $museum['latest_comment']. "</p>
                  </div>
                  </div>
                </div>
              ";
        }
        ?>
      </div>
    </div>
  </section>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>