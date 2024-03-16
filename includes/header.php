<!doctype html>
<html>

<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Toronto Gallery Guide | Admin Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link href="css/styles.css" type="text/css" rel="stylesheet">

  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  <!-- Used by Adam (May Remove) -->

</head>
<body>  
  <?php if(isset($_SESSION['id'])): ?>

    <div class="container">
      <div class="row">
        <nav class="navbar navbar-expand-lg">

          <a class="navbar-brand" href="../index.php">
            <img src="imgs/logoA.png" alt="Toronto Gallery Guide Logo" width="297" height="75" class="d-inline-block align-text-top">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Admin Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="museums.php">Museums</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="comments.php">Comments</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="users.php">Users</a>
              </li>
            </ul>
             <?php

            
                      if(isset($_GET['adminid'])){
                        $query_user= 'SELECT *
                        FROM users
                        WHERE id="'.$_GET['adminid'].'"
                        LIMIT 1';
                        $result_user = mysqli_query($connect,$query_user);
                        foreach($result_user as $user){
                          echo '
                          <h5 class="me-2 mt-3">Welcome '.$user['first'].' '.$user['last'].'</h5>
                          
                          <a type="button" class="btn btn-secondary text-white" href="../logout.php">Logout</a>
                          
                          </div>
                          </nav>
                          ';
                        }
                        

                       
                      }
                      
                ?>
          </div>
        </nav>
      </div>
    </div>
  
  <?php endif; ?>
  
  <hr>
  
  <?php echo get_message(); ?>
  
  <div style="max-width: 1500px; margin: auto; padding: 0 1%;">
  
