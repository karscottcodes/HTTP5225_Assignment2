<?php
include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');

if(isset($_POST['login'])){
    include('reusable/loginConnect.php');
    }
    
     //$error=[];

?>
 <?php
    $email="";
    $login_error_message ="";
    if(isset($_SESSION['error_message']) && $_SESSION['error_message']!="")
    {
    $login_error_message= $_SESSION['error_message'];
    unset($_SESSION['error_message']);
    }

    ?>



<!doctype html>
<html>
<head>

        <meta charset="UTF-8">
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Toronto Gallery Guide | Sign Up</title>

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
                                <a class="nav-link active" aria-current="page" href="index.php<?php 
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
                        <button type="button" class="btn btn-secondary text-white nav-btn" data-bs-toggle="modal" data-bs-target="#modal">
                            Login
                        </button>
                        <?php
                        include('reusable/loginModal.php');
                        ?>
                    </div>
                </nav>
            </div>
        </div>
                
    </header>
    <?php
    if(isset($_POST['signUp'])){

        $query = 'INSERT INTO users (first,last, email, password) 
        VALUES(
        "'.mysqli_real_escape_string($connect,$_POST['first']).'",
        "'.mysqli_real_escape_string($connect,$_POST['last']).'",
        "'.mysqli_real_escape_string($connect,$_POST['email']).'",
        "'.md5($_POST['password']).'"
            )';
        mysqli_query($connect,$query);
        set_message('<h3>Thank you for your registration!</h3>');
        echo'
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-5 mt-4 mb-4">SIGN UP</h1>
                </div>
            </div>
        </div>
        <div class="container">
        ';
        echo get_message();
        echo '
            <div class = "row center" style="width:200px">
                <button type="button" class="btn btn-secondary text-white nav-btn" data-bs-toggle="modal" data-bs-target="#modal">
                    Login
                </button>
                ';
                
                include('reusable/loginModal.php');
        echo '
        
        </div>
        ';


        }
    else{

        echo'
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="display-5 mt-4 mb-4">SIGN UP</h1>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class = "row">
                <form action="" method="POST">
                    <div class="form-group col-sm-6">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="first" name="first" aria-describedby="firstname" placeholder="Enter First Name" required>
                        
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="lastname">Last name</label>
                        <input type="text" class="form-control" id="last" name="last" aria-describedby="lastname" placeholder="Enter Last Name" required>
                        
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="email" placeholder="Enter email" required>
                        
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" name="signUp" class="btn btn-secondary mt-3">Sign Up</button>
                </form>
            </div>
        </div>

        ';
    }


    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
    </script>
 <script type="text/javascript">
    window.onload = () => {  
    <?php
    if($login_error_message !=""){
        ?>
        const myModal = new bootstrap.Modal('#modal');
        myModal.show();
        <?php } ?>
    };
</script>
    </body>
    <?php

include( 'includes/footer.php' );

?>
</html>
