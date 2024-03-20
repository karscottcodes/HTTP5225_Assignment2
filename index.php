<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

?>
<!doctype html>
<html>


<?php
    include('reusable/head.php')
    ?>
  <section>
    <div class="container-fluid">
      <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
          <div class="col-lg-7 p-3 p-lg-5 pt-lg-3">
            <h1 class="display-3 fw-bold lh-1">Welcome to the Toronto Gallery Guide</h1>
            <p class="lead">Leave a review of your favourite museums and galleries in the city.</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
              <button type="button" class="btn btn-secondary btn-lg px-4 me-md-2 fw-bold">Sign-Up</button>

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
                    echo '';
                  }
                                
                }
                    else{
                    

                      echo '
                      <button type="button" class="btn btn-outline-secondary nav-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                      </div>';
                    }
                      ?>
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
    <div class="container">
      <div class="row p-3">
        <div class="col">
          <h2>Most Commented Museums</h2>
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
          ORDER BY comment_count DESC
          LIMIT 6 ";

        $result = mysqli_query($connect, $query);

        foreach ($result as $museum) {
          if(isset($_GET['userid'])){
            echo "
            <div class='col'>
              <div class='card h-100 d-flex flex-column'>
                  <img src=" . $museum['image'] . " class='card-img-top museum-image' alt='" . $museum['name'] . "'>
                  <div class='card-body'>
                    <h5 class='card-title'>" . $museum['name'] . "</h5>
                    <p class='card-text'>" . $museum['summary'] . "</p>

                  </div>
                  <div class='mt-auto'>
                  <form class='card-button p-3'>
                    <input type='hidden' value='" . $museum['id'] . "'>
                    <a class='btn btn-outline-dark' href='museum_details.php?userid=".$_GET['userid']."&id=" . $museum['id'] . "'>Museum Details</a>
                  </form>
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
              <div class='card h-100 d-flex flex-column'>
                  <img src=" . $museum['image'] . " class='card-img-top museum-image' alt='" . $museum['name'] . "'>
                  <div class='card-body'>
                    <h5 class='card-title'>" . $museum['name'] . "</h5>
                    <p class='card-text'>" . $museum['summary'] . "</p>
                  </div>
                  <div class='mt-auto'>
                  <form class='card-button p-3'>
                    <input type='hidden' value='" . $museum['id'] . "'>
                    <a class='btn btn-outline-dark' href='museum_details.php?id=" . $museum['id'] . "'>Museum Details</a>
                  </form>
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
    <div class="container">
      <div class="row pt-5">
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
    <div class="container">
      <div class="row justify-content-center">
        <?php foreach ($resultComment as $comment): ?> 
          <div class="card h-100 m-3" style="max-width: 420px;">
            <div class="row">
              <div class="col-lg-4 align-self-center">
                  <img src="<?php echo $comment['museum_image']; ?>" class="img-fluid rounded-start comment-image" style="height: 100px; width: 125px;" alt="">
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
<?php include ("reusable/foot.php") ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous">
  </script>
  <script>


// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => { form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
  </script>

</body>

</html>