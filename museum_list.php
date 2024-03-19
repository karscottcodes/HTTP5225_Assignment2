<?php

include('includes/database.php');
include('includes/config.php');
include('includes/functions.php');

?>
<!doctype html>
<html>

<?php
include("reusable/head.php");
?>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h2>List of Museums</h2>
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
          LIMIT 6 ";

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