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
                        <a class="btn btn-secondary text-white nav-btn" href="logout.php">Logout</a>
                        </form>
                        ';
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
  </header>
  <section>
    <div class="container-fluid">
    <div class="container my-5">
    <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
      <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
        <h1 class="display-3 fw-bold lh-1">Welcome to the Toronto Gallery Guide</h1>
        <p class="lead">Leave a review of your favourite museums and galleries in the city.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
          <button type="button" class="btn btn-secondary btn-lg px-4 me-md-2 fw-bold">Sign-Up</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Login</button>
        </div>
      </div>
      <div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg">
          <img class="rounded-lg-3" src="admin/imgs/museum-7409275_1280.jpg" alt="" width="720">
      </div>
    </div>
  </div>
    </div>
  </section>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h2>Recently Added Museums</h2>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
        $query = "SELECT m.*, 
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
          ORDER BY m.id
          LIMIT 6; 
 ";

        $result = mysqli_query($connect, $query);

        foreach ($result as $museum) {
          if(isset($_GET['userid'])){
            echo "
            <div class='col'>
              <div class='card h-100'>
                  <img src=" . $museum['image'] . " class='card-img-top' alt='" . $museum['name'] . "'>
                  <div class='card-body'>
                    <h5 class='card-title'>" . $museum['name'] . "</h5>
                    <p class='card-text'>" . $museum['summary'] . "</p>
                    <div class='text-center'>
                    <form>
                      <input type='hidden' value='" . $museum['id'] . "'>
                      <a class='btn btn-outline-dark' href='museum_details.php?userid=".$_GET['userid']."&id=" . $museum['id'] . "'>Museum Details</a>
                    </form>
                    </div>
                  </div>
                  <div class='card-footer'>
                    <p class='card-text'> Total Comments: " . $museum['comment_count'] . "</p>
                    <p class='card-text'> Most Recent Comment: " . $museum['latest_comment']. "</p>

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
                    <div class='text-center'>
                    <form>
                    <input type='hidden' value='" . $museum['id'] . "'>
                    <a class='btn btn-outline-dark' href='museum_details.php?id=" . $museum['id'] . "'>Museum Details</a>
                    </form>
                </div>
                  </div>
                  <div class='card-footer'>
                  <p class='card-text'>Total Comments: " . $museum['comment_count'] . "</p>
                  <p class='card-text'>Most Recent Comment: " . $museum['latest_comment']. "</p>
              </div>
              </div>
            </div>
          ";
          }
          
        }
        ?>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h2>Recent Comments</h2>
        </div>
      </div>
    </div>
  </main>
  <section>

      <?php
      $query = "SELECT 
      c.id AS comment_id,
      c.comment,
      c.dateAdded AS comment_date,
      u.first AS user_first_name,
      u.last AS user_last_name,
      m.name AS museum_name,
      m.image AS museum_image
      FROM 
          comments c
      JOIN 
          users u ON c.user_id = u.id
      JOIN 
          museums m ON c.museum_id = m.id
      ORDER BY
          c.dateAdded DESC
      LIMIT 6    
      ;";

        $resultComment = mysqli_query($connect, $query);
        ?>
    <div class="container-fluid">
      <div class="row">
        <?php foreach ($resultComment as $comment): ?> 
          <div class="card h-100 m-3" style="max-width: 485px;">
            <div class="row">
              <div class="col-lg-4">
                  <img src="<?php echo $comment['museum_image']; ?>" class="img-fluid rounded-start" alt="">
              </div>
              <div class="col-lg-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $comment['museum_name']; ?></h5>

                  <p class="card-text"><?php echo $comment['comment']; ?></p>
                  <p class="card-text">
                    <small class="text-muted">Posted by: <?php echo $comment['user_first_name'] . " " . $comment['user_last_name']; ?></small><br>
                    <small class="text-muted">Posted on: <?php echo $comment['comment_date'];?></small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

        </div>
    </div>
    
  </section>
  <section>
<?php

        $query = "SELECT * FROM museums ORDER BY `id`;";

        $resultChoices = mysqli_query($connect, $query);


if(isset($_GET['userid'])){

  echo'
        <h4>Logged in as: '.$_SESSION['username'].'</h4>
          <form action="comment/add_comment.php" method="POST">
          <input type="hidden" id="userid" name="userid" value="'.$_GET['userid'].'">
            <div>
              <label for="museum">Museum</label>
                <select name="museum_id">';
                foreach ($resultChoices as $choice){
                  echo '<option value="'.$choice['id'].'">'. $choice['name'] .'</option>';
                }
             echo   '</select>
              </div>
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

?>

  </section>


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