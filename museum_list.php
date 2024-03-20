<?php

include ('includes/database.php');
include ('includes/config.php');
include ('includes/functions.php');

//Pagination Variables
$page = isset ($_GET['page']) ? $_GET['page'] : 1;
$items_per_page = 9; //WE CAN CHANGE THIS
$offset = ($page - 1) * $items_per_page;

?>
<!doctype html>
<html>

<?php
include ("reusable/head.php");
?>
<section id="hero" class="p-5">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-11 col-lg-9 col-xl-7 col-xxl-6 text-center text-white">
        <h1 class="display-3 fw-bold mb-3 overlay-text">Your Voice, Your Museums.</h1>
        <p class="lead mb-5 overlay-text">Empowering Opinions on Enriching Experiences.</p>
      </div>
    </div>
  </div>
</section>

<main>
  <div class="container">
    <div class="row">
      <div class="col">
        <h2 class="m-3">List of Museums</h2>
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
      ORDER BY latest_comment
      LIMIT $items_per_page OFFSET $offset"; // Add For Pagination
      
      $result = mysqli_query($connect, $query);

      foreach ($result as $museum) {
        if (isset ($_GET['userid'])) {
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
                      <a class='btn btn-outline-dark' href='museum_details.php?userid=" . $_GET['userid'] . "&id=" . $museum['id'] . "'>Museum Details</a>
                    </form>
                  </div>
                  <div class='card-footer'>
                    <p class='card-text'> Total Comments: " . $museum['comment_count'] . "</p>
                    <p class='card-text'> Most Recent Comment: " . $museum['latest_comment'] . "</p>

              </div>
              </div>
            </div>
          ";
        } else {
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
                  <p class='card-text'>Most Recent Comment: " . $museum['latest_comment'] . "</p>
              </div>
              </div>
            </div>
          ";
        }

      }
      ?>

      <!-- Pagination -->
      <div class="container pt-3">
        <div class="row">
          <div class="col">
            <ul class="pagination justify-content-center">
            <?php
                $count_total = "SELECT COUNT(*) AS total FROM museums";
                $result_total = mysqli_query($connect, $count_total);
                $row_total = mysqli_fetch_assoc($result_total);
                $total_pages = ceil($row_total['total'] / $items_per_page);

                // Previous Page Link
                if ($page > 1) {
                    echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."'>Previous</a></li>";
                }

                // Page Numbers
                for ($i = 1; $i <= $total_pages; $i++) {
                    echo "<li class='page-item";
                    if ($i == $page) echo " active";
                    echo "'><a class='page-link' href='?page=$i'>$i</a></li>";
                }

                // Next Page Link
                if ($page < $total_pages) {
                    echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1)."'>Next</a></li>";
                }
                ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include ("reusable/foot.php") ?>
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

</body>

</html>