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

<h2>Manage Museums</h2>

<table class="table">
  <thead>
  <tr>
    <th scope="col">Id</th>
    <th scope="col">Image</th>
    <th scope="col">Name</th>
    <th scope="col">Type</th>
    <th scope="col">Summary</th>
    <th scope="col">Edit Photo</th>
    <th scope="col">Edit Details</th>
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
      <a href="museums_photo.php?id=<?php echo $record['id']; ?>">Photo</a>
    </td>
    <td>
        <a href="museums_edit.php?id=<?php echo $record['id']; ?>">Edit Details</a>
    </td>
    <td>
        <a href="museums.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this museum?');">Delete</i></a>
    </td>
    </tr>
  <?php endwhile; ?>
</tbody>
</table>

<p><a href="museums_add.php"><i class="fas fa-plus-square"></i> Add Museum</a></p>


<?php

include( '../includes/footer.php' );

?>