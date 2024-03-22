
<head>

  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Toronto Gallery Guide | Home</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link href="includes/css/styles.css" type="text/css" rel="stylesheet">

  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
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
          <div class="collapse navbar-collapse ms-5 ps-5 " id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-underline me-xl-5">
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
                include('reusable/loginConnect.php');
                      
                  if(isset($_GET['userid'])){
                    $query_user= 'SELECT *
                    FROM users
                    WHERE id="'.$_GET['userid'].'"
                    LIMIT 1';
                    $result_user = mysqli_query($connect,$query_user);
                    foreach($result_user as $user){
                      echo '
                      <div class="col ms-5">
                      <h6 class="me-2 mt-3">Welcome '.$user['first'].' '.$user['last'].'</h6>                    
                      <a type="button" class="btn btn-secondary text-white ms-5" href="logout.php">Logout</a>
                      </div>
                      </div>
                      </nav>
                      ';
                    }
                                  
                  }
                  else{
                  

                    echo '
                    <a class="btn btn-secondary text-white nav-btn ms-5 me-2" href="signup.php">
                    Sign Up
                    </a>
                    <button type="button" class="btn btn-secondary text-white nav-btn" id="loginModal" data-bs-toggle="modal" data-bs-target="#modal">
                      Login
                    </button>
                    <!-- Modal -->
                    
                    
                    ';
                    include('reusable/loginModal.php');
                  
                  }
              ?>
          </div>
        </nav>
      </div>
    </div>
              
  </header>
  <script>

    var navLinkEls = document.querySelectorAll('.nav-link');
    var windowPath = window.location.pathname;

    navLinkEls.forEach(navLink =>{
      const navLinkPathname = new URL(navLink.href).pathname;
      if(windowPath === navLinkPathname){
      navLink.classList.add('active');
    }
    });

  </script>

<script>
window.onload = () => {  <?php
 if($login_error_message !=""){
    ?>
    //$("#loginModal").click();
    const myModal = new bootstrap.Modal('#modal');
      myModal.show();
    <?php } ?>
};
</script>