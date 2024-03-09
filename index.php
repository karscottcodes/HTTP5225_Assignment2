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
    <div class="container-fluid">
      <div class="row">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">

          <a class="navbar-brand" href="#">
            <img src="admin/imgs/logo.png" alt="Logo" width="66" height="60" class="d-inline-block align-text-top">
            Museum Commenter
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
              <a class="btn btn-outline-success" href="login.php">Login</a> &nbsp
              <a class="btn btn-outline-success" href="admin/index.php">Admin</a>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <main>
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
        $query = 'SELECT * FROM `museums` ORDER BY `id` LIMIT 6';
        $result = mysqli_query($connect, $query);

        $queryChoices = "SELECT `id`, `name`
        FROM museums";

        $resultChoices = mysqli_query($connect, $queryChoices);

        foreach ($result as $museum) {
          if(isset($_GET['userid'])){
            echo "
            <div class='col'>
              <div class='card h-100'>
                  <img src=" . $museum['image'] . " class='card-img-top' alt='" . $museum['name'] . "'>
                  <div class='card-body'>
                    <h5 class='card-title'>" . $museum['name'] . "</h5>
                    <p class='card-text'>" . $museum['summary'] . "</p>
                  </div>
                  <div class='card-footer text-body-secondary text-center'>
                  <form>
                      <input type='hidden' value='" . $museum['id'] . "'>
                      <a class='btn btn-outline-info' href='museum_details.php?userid=".$_GET['userid']."&id=" . $museum['id'] . "'>Museum Details</a>
                  </form>
              </div>
              </div>
            </div>
          ";
          }else{
            echo "
            <div class='col'>
              <div class='card h-100'>
                  <img src=" . $museum['image'] . " class='card-img-top' alt='" . $museum['name'] . "'>
                  <div class='card-body'>
                    <h5 class='card-title'>" . $museum['name'] . "</h5>
                    <p class='card-text'>" . $museum['summary'] . "</p>
                  </div>
                  <div class='card-footer text-body-secondary text-center'>
                  <form>
                      <input type='hidden' value='" . $museum['id'] . "'>
                      <a class='btn btn-outline-info' href='museum_details.php?id=" . $museum['id'] . "'>Museum Details</a>
                  </form>
              </div>
              </div>
            </div>
          ";
          }
          
        }
        ?>
      </div>
    </div>
  </main>
  <!-- <section>
    <div class="container">
      <div class="row">
        <h2>Leave A Comment</h2>
        <div class="col-sm-8">
          <form action="admin/add_comment.php" method="POST">
            <div>
              <label for="museum">Select A Museum</label>
              <select class="form-select" id="museum" name="museum_id" required>
                <option value="">Select A Museum</option>
                <?php
                //while ($choice = mysqli_fetch_assoc($resultChoices)) {
                  //echo "<option value='" . $choice['id'] . "'>" . $choice['name'] . "</option>";
                //}
                ?>
              </select>
            </div>
            <div>
              <label for="comment">Leave A Comment</label>
              <input type="text" id="comment" name="comment">
            </div>
            <button type="submit" class="btn btn-primary" name="addComment">Submit</button>
          </form>
        </div>
      </div>
    </div>

  </section> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>