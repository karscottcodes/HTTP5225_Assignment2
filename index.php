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
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img src="admin/imgs/logo.png" alt="Logo" width="66" height="60" class="d-inline-block align-text-top">
            Museum Commenter
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="museum_list.php">Museums</a>
                  </li>
              </ul>
              <?php
              if(isset($_POST['login'])){
                $query= 'SELECT *
                FROM users
                WHERE email = "'.$_POST['email'].'"
                AND password = "'.md5($_POST['password']).'"
                And permission = 0
                LIMIT 1';
            
                $admin_query='SELECT *
                FROM users
                WHERE email = "'.$_POST['email'].'"
                AND password = "'.md5($_POST['password']).'"
                And permission = 1
                LIMIT 1';
            
                $result = mysqli_query($connect,$query);
            
                $result_admin = mysqli_query($connect,$admin_query);
                if(mysqli_num_rowS($result)){
                    $record = mysqli_fetch_assoc($result);
                    $_SESSION['id'] = $record['id'];
                    header('Location: index.php?userid='.$_SESSION['id'].'');
                    die();
                
                }
                if(mysqli_num_rowS($result_admin)){
                    $record = mysqli_fetch_assoc($result_admin);
                    $_SESSION['id'] = $record['id'];
                    $_SESSION['email'] = $record['email'];
                    header('Location: admin/dashboard.php');
                    die();
                
                }
                else{
                    set_message('incorrect username/password');
                    header('Location: index.php');
                    die();
                }
            }
                      if(isset($_GET['userid'])){
                        echo '
                        <form class="d-flex">
                        <a class="btn btn-outline-success" href="logout.php">Logout</a>
                        </form>
                        ';
                      }
                      else{
                      

                        echo '
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          Login
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                              <div class = "row">
                              '.get_message().'
                              <form action="" method="POST">
                                  <div class="form-group">
                                      <label for="email">Email address</label>
                                      <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter email">
                                      
                                  </div>
                                  <div class="form-group">
                                      <label for="password">Password</label>
                                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                  </div>
                                  <button type="submit" name="login" class="btn btn-primary">Submit</button>
                              </form>
                          </div>
                              
                          </div>
                        </div>
                        ';
                      }
                ?>
            </div>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

  <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
})
  </script>

</body>

</html>