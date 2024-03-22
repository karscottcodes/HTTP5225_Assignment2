<?php
require_once '../includes/wideimage/WideImage.php';

include ('../includes/database.php');
include ('../includes/config.php');
include ('../includes/functions.php');

secure();

if (!isset ($_GET['id'])) {
  header('Location: museums.php');
  exit();
}

if (isset ($_FILES['image'])) {
  if ($_FILES['image']['error'] == 0) {
    // Validate file type based on content rather than MIME type
    $allowed_types = ['image/png', 'image/jpeg', 'image/gif'];
    $file_type = mime_content_type($_FILES['image']['tmp_name']);
    if (in_array($file_type, $allowed_types)) {
      $image_data = file_get_contents($_FILES['image']['tmp_name']);
      $encoded_image = 'data:image/' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION) . ';base64,' . base64_encode($image_data);
      $query = 'UPDATE museums SET `image` = ? WHERE id = ? LIMIT 1';
      $stmt = mysqli_prepare($connect, $query);
      mysqli_stmt_bind_param($stmt, 'si', $encoded_image, $_GET['id']);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      set_message('Museum image has been updated');
    } else {
      set_message('Invalid file type. Please upload a PNG, JPEG, or GIF image.', 'error');
    }
    header('Location: museums.php');
    exit();
  } else {
    set_message('Error uploading image. Please try again.', 'error');
    header('Location: museums.php');
    exit();
  }
}

if (isset ($_GET['id']) && isset ($_GET['delete'])) {
  $query = 'UPDATE museums SET `image` = "" WHERE id = ? LIMIT 1';
  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, 'i', $_GET['id']);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  set_message('Museum image has been deleted');
  header('Location: museums.php');
  exit();
}

$query = 'SELECT * FROM museums WHERE id = ? LIMIT 1';
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, 'i', $_GET['id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) == 0) {
  header('Location: museums.php');
  exit();
}

$record = mysqli_fetch_assoc($result);

include ('../includes/header.php');
?>
<div class="container">
  <div class="row">
    <div class="col">


      <h2>Edit Museum Photo</h2>

      <?php if ($record['image']): ?>
        <p>
          <img src="<?= htmlspecialchars($record['image']) ?>" width="200" height="200">
        </p>
        <p>
          <a class="btn btn-danger text-white" href="museums_photo.php?id=<?= $_GET['id'] ?>&delete">
            <i class="bi bi-trash"></i> Delete this Photo
          </a>
        </p>
      <?php endif; ?>

      <form method="post" enctype="multipart/form-data">
        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        <br><br>
        <input type="submit" value="Save Image">
      </form>
    </div>
  </div>
  <div class="row pt-3">
    <div class="col">
      <p><a href="museums.php"><i class="fas fa-arrow-circle-left"></i> Return to Museum List</a></p>
    </div>
  </div>
</div>
<?php
include ('../includes/footer.php');
?>