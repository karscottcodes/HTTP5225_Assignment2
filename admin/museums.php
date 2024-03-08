<?php
require_once 'includes/wideimage/WideImage.php';

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

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

include( 'includes/header.php' );

$query = 'SELECT *
  FROM museums
  ORDER BY id';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Museums</h2>

<table>
  <tr>
    <th>Id</th>
    <th>Image</th>
    <th>Name</th>
    <th>Address</th>
    <th>Type</th>
    <th>Summary</th>
    <th>Edit Photo</th>
    <th>Edit Details</th>
    <th>Delete Museum</th>
  </tr>
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
        <?php echo $record['address']; ?>
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
</table>

<p><a href="museums_add.php"><i class="fas fa-plus-square"></i> Add Museum</a></p>


<?php

include( 'includes/footer.php' );

?>