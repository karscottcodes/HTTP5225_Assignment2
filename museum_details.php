<?php
include('includes/config.php');
include('includes/database.php');
include('includes/functions.php');
if(isset($_POST['login'])){
  include('reusable/loginConnect.php');
  }

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

    <?php
    include("reusable/head.php");
    ?>

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
            <h4 class="pt-5">About '. $museum['name'] .'</h4>
            <p class="card-text">' . $museum['summary'] . '</p>
            <h4 class="pt-3">Address</h4>
            <p class="card-text-">'. $museum['address'] .'<br>
              '.$museum['postalcode'].'</p>
            <h4 class="pt-3">Contact</h4>
            <p class="card-text">Phone: '. $museum['phone'] . '<br>Website: 
            <a href="'.$museum['url'].'" target="_blank">'.$museum['url'].'</a></p>
            <h4 class="pt-3">Located in (City Ward):</h4>
            <p class="card-text">'. $museum['ward'] . '</p>
            </section>
            <section>
              <div class="container">
                <div class="row pt-5 pb-3">
                  <div class="col-sm-12">
                    <h2>Recent Comments</h2>
                  </div>
                </div>
                <div class="row justify-content-center">
                  <div class="col-sm-8">
        ';
    }
    
    echo '<div class="list-group">';

    while ($comment = mysqli_fetch_assoc($resultComments)) {
        echo '
        <div class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h6 class="mb-1">'.$comment['username'].'</h6>
            <small>'.$comment['dateAdded'].'</small>
          </div>
          <p class="mb-1">'.$comment['comment'].'</p>
        </div>
        ';
    }

    echo '</div>';


  
if(isset($_GET['userid'])){

  $userId = mysqli_real_escape_string($connect, $_GET['userid']);

  $query ="SELECT *
  FROM users
  WHERE id = '$userId' 
  ";
$result = mysqli_query($connect, $query);
foreach($result as $user){
      echo'
      <div class="mt-4">
      <h4> Leave your comment as: '.$user['first'].'  '.$user['last'].'</h4>';
}

      echo '
              <form action="comment/add_comment.php" method="POST">
              <input type="hidden" id="userid" name="userid" value="'.$_GET['userid'].'">
              <input type="hidden" id="museum_id" name="museum_id" value="'.$museumID.'">
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Leave a comment here" id="comment" name="comment"></textarea>
                  <label for="floatingTextarea">Comments</label>
                </div>
                <button type="submit" class="btn btn-secondary text-white mt-3" name="addComment">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    
      </section>
      ';
  
  }
  else{
    echo '
    <button type="button" class="btn btn-secondary text-white nav-btn" data-bs-toggle="modal" data-bs-target="#modal">
    Login
    </button>';
    include('reusable/loginModal.php');
    echo'
    </div>
    </nav>
    ';
  }          
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

</html>