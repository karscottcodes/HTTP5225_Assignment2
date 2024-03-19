<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Toronto Gallery Guide | Home</title>

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
        <div class="collapse navbar-collapse ms-5 ps-5" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-underline">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php<?php 
              if(isset($_GET['userid'])){
                echo "?userid=";
                echo $_GET['userid'];
              }?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="museum_list.php<?php 
              if(isset($_GET['userid'])){
                echo "?userid=";
                echo $_GET['userid'];
              }?>">Museums</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
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
                      header('Location: admin/dashboard.php?adminid='.$_SESSION['id'].'');
                      die();
                  
                  }
                  else{
                      set_message('incorrect username/password');
                      header('Location: index.php');
                      die();
                  }
                }

                    
                if(isset($_GET['userid'])){
                  $query_user= 'SELECT *
                  FROM users
                  WHERE id="'.$_GET['userid'].'"
                  LIMIT 1';
                  $result_user = mysqli_query($connect,$query_user);
                  foreach($result_user as $user){
                    echo '
                    <h5 class="me-2 mt-3">Welcome '.$user['first'].' '.$user['last'].'</h5>
                    
                    <a type="button" class="btn btn-secondary text-white" href="logout.php">Logout</a>
                    
                    </div>
                    </nav>
                    ';
                  }
                                
                }
                    else{
                    

                      echo '
                      <button type="button" class="btn btn-secondary text-white nav-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                            <form action=""  method="POST" class="row g-3 needs-validation" novalidate>
                            '.get_message().'
                              <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                  <div class="input-group has-validation">
                                    <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" placeholder="Email"required>
                                    <div class="invalid-feedback">
                                      Please enter email.
                                    </div>
                                  </div>
                              </div>
                              <div class="form-group">
                                <label for="password">Password</label>
                                  <div class="input-group has-validation">
                                      <input type="password" class="form-control" id="password" name="password" aria-describedby="inputGroupPrepend"  placeholder="Password"required>
                                      <div class="invalid-feedback">
                                        Please enter password.
                                      </div>
                                  </div>
                              </div>
                              <div>
                                <button type="submit" name="login" class="btn btn-secondary text-white mt-3">Submit</button>
                              </div>
                                

                            </form>
                          </div>
                            
                        </div>
                      </div>
                      </div>
                      </nav>
                      ';
                    }
            ?>
        </div>
      </nav>
              
  </header>