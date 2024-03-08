<?php

include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');

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

          <a class="navbar-brand" href="#">
            <img src="admin/imgs/logo.png" alt="Logo" width="66" height="60" class="d-inline-block align-text-top">
            Museum Commenter
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
              <a class="btn btn-outline-success" href="admin/index.php">Admin</a>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </header>
  <!-- <section>
    <?php
    $query = 'SELECT * FROM `museums` ORDER BY `id` LIMIT 3';
    $carousels = mysqli_query($connect, $query);
    ?>
    <div class="container-fluid" style="max-height: 500px;">
      <div class="row">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <?php
            $first = true;
            foreach ($carousels as $carousel) {
              $activeClass = $first ? 'active' : '';
              ?>
              <div class="carousel-item <?php echo $activeClass; ?>">
                <img src="<?php echo $carousel['image']; ?>" class="d-block w-100" alt="<?php echo $carousel['name']; ?>">
                <div class="carousel-caption d-none d-md-block">
                  <h5>
                    <?php echo $carousel['name']; ?>
                  </h5>
                  <a class="btn btn-primary" href="museum_details.php?id=<?php echo $carousel['id']; ?>">More Details
                    About
                    This
                    Museum</a>
                </div>
              </div>
              <?php
              $first = false;
            }
            ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </section> -->

  <section>
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
        $query = 'SELECT * FROM `museums` ORDER BY `id`';
        $result = mysqli_query($connect, $query);
        
        foreach ($result as $museum) {
          echo "
                <div class='col'>
                  <div class='card h-100'>
                      <img src=".$museum['image']." class='card-img-top' alt='".$museum['name']."'>
                      <div class='card-body'>
                        <h5 class='card-title'>".$museum['name']."</h5>
                        <p class='card-text'>".$museum['summary']."</p>
                      </div>
                      <div class='card-footer text-body-secondary text-center'>
                      <form>
                          <input type='hidden' value='".$museum['id']."'>
                          <a class='btn btn-outline-info' href='museum_details.php?id=".$museum['id']."'>Museum Details</a>
                      </form>
                  </div>
                  </div>
                </div>
              ";
        }
        ?>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>