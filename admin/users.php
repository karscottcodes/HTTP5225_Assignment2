<?php

include( '../includes/database.php' );
include( '../includes/config.php' );
include( '../includes/functions.php' );

secure();

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM users
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
  
  set_message( 'User has been deleted' );
  
  header( 'Location: users.php' );
  die();
  
}

include( '../includes/header.php' );

$query = 'SELECT *
  FROM users 
  ORDER BY permission DESC';

$result = mysqli_query( $connect, $query );

?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">



<h2>Manage Users</h2>

<p class="pt-3"><a class="btn btn-secondary text-white" href="users_add.php"><i class="bi bi-plus-square"></i> &nbsp;Add New User</a></p>

<table class="table">
  <thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Active</th>
    <th scope="col">Admin</th>
    <th scope="col">Edit User</th>
    <th scope="col">Delete User</th>
  </tr>
</thead>
<tbody>
<?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td><?php echo $record['id']; ?></td>
      <td><?php echo htmlentities( $record['first'] ); ?> <?php echo htmlentities( $record['last'] ); ?></td>
      <td><a href="mailto:<?php echo htmlentities( $record['email'] ); ?>"><?php echo htmlentities( $record['email'] ); ?></a></td>
      <td>
        <?php echo $record['active']; ?>
      </td>
      <td>
        <?php echo $record['permission']; ?>
      </td>
      <td><a class="btn btn-secondary text-white" href="users_edit.php?id=<?php echo $record['id']; ?>"><i class="bi bi-body-text"></i> &nbsp;Edit</a></td>
      <td>
        <?php if( $_SESSION['id'] != $record['id'] ): ?>
          <a class="btn btn-secondary text-white" href="users.php?delete=<?php echo $record['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');"><i class="bi bi-trash3"></i> &nbsp;Delete</a>
          <?php else: ?>
          <button type="button" class="btn btn-secondary text-white" disabled><i class="bi bi-trash3"></i> &nbsp;Delete</button>
        <?php endif; ?>
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