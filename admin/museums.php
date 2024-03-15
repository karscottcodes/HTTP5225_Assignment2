<?php
require_once '../includes/wideimage/WideImage.php';

include( '../includes/database.php' );
include( '../includes/config.php' );
include( '../includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM museums
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Museum has been deleted' );
  
  header( 'Location: museums.php' );
  die();
  
}

include( '../includes/header.php' );

$query = 'SELECT *
  FROM museums
  ORDER BY id';
$result = mysqli_query( $connect, $query );

?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">


  <h2>Manage Museums</h2>

  <p class="p-3"><a class="btn btn-secondary text-white" href="museums_add.php"><i class="bi bi-plus-square"></i>&nbsp; Add New Museum</a></p>

  <table class="table">
    <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Type</th>
      <th scope="col">Summary</th>
      <th scope="col">Upload New Photo</th>
      <th scope="col">Edit Museum</th>
      <th scope="col">Delete Museum</th>
    </tr>
  </thead>
  <tbody>
    <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
      <tr>
        <td><?php echo $record['id']; ?></td>
        <td>
          <img src="<?php echo $record['image']; ?>" style="max-width:100px;">
        </td>
        <td>
          <?php echo $record['name']; ?>
      </td>
      <td>
          <?php echo $record['type']; ?>
      </td>
      <td>
          <?php echo $record['summary']; ?>
      </td>
      <td>
        <a class="btn btn-secondary text-white" href="museums_photo.php?id=<?php echo $record['id']; ?>"><i class="bi bi-camera"></i> &nbsp;Photo</a>
      </td>
      <td>
          <a class="btn btn-secondary text-white" href="museums_edit.php?id=<?php echo $record['id']; ?>"><i class="bi bi-body-text"></i> &nbsp;Edit</a>
      </td>
      <td>
          <a class="btn btn-secondary text-white" href="museums.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this museum?');"><i class="bi bi-trash3"></i> &nbsp;Delete</i></a>
      </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
  </table>
</div>
</div>
  </div>

<?php

include( '../includes/footer.php' );

?>