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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">MuseumComments</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
          aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
          </ul>
          <form class="d-flex">
            <a class="btn btn-outline-success" href="admin/index.php">Admin</a>
          </form>
        </div>
      </div>
    </nav>
  </header>
  <section>
    <?php
    $query = 'SELECT * FROM `museums` ORDER BY `id` LIMIT 3';
    $carousels = mysqli_query($connect, $query);
    ?>
    <div class="container-fluid">
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
                    <img src="<?php echo $carousel['image']; ?>" class="d-block w-100"
                        alt="<?php echo $carousel['name']; ?>">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $carousel['name']; ?></h5>
                        <a class="btn btn-primary"
                            href="museum_details.php?id=<?php echo $carousel['id']; ?>">More Details About This
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
</section>

  <section>
  <div class="container">
  <?php
  $query = 'SELECT * FROM `museums` ORDER BY `id`';
  $result = mysqli_query($connect, $query);
  $count = 0; // Counter to keep track of the number of cards in the current row

  while ($record = mysqli_fetch_assoc($result)) {
    // Start a new row if the count is divisible by 2 (i.e., every 2 cards)
    if ($count % 2 == 0) {
      echo '<div class="row">';
    }
    ?>
    <div class="col-md-6"> <!-- Each card takes half of the row -->
      <div class="card">
        <div class="card-img-body">
          <img class="card-img" src="<?php echo $record['image']; ?>" alt="Card image cap">
        </div>
        <div class="card-body">
          <h4 class="card-title"><?php echo $record['name']; ?></h4>
          <p class="card-text"><?php echo $record['summary']; ?></p>
          <a href="museum_details.php?id=<?php echo $record['id']; ?>" class="btn btn-outline-primary">More Details</a>
        </div>
      </div>
    </div>
    <?php
    $count++;
    // Close the row if the count is divisible by 2 and it's not the last card
    if ($count % 2 == 0 && mysqli_num_rows($result) != $count) {
      echo '</div>'; // Close the row
    }
  }
  ?>
</div>


  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

</body>

</html>