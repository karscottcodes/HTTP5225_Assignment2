<?php
  if(isset($_POST['addComment'])){
    // print_r($_POST);  
    $user = $_POST["userid"];
    $museum = $_POST["museum_id"];
    $comment = $_POST["comment"];
    // include('../admin/includes/database.php');
    $connect = mysqli_connect('localhost', 'root', '', '5225cms');
    if (!$connect) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $query = "INSERT INTO comments (user_id, museum_id, comment) VALUES (
      '".mysqli_real_escape_string($connect,$user)."',
      '".mysqli_real_escape_string($connect,$museum)."',
      '".mysqli_real_escape_string($connect,$comment)."'
      )";
    $comments = mysqli_query($connect, $query);
    if($comments){
      header('Location: ../museum_details.php?userid='.$user.'&id='.$museum.'');
    }else
    {
      echo "Error" . mysqli_error($connect);
    }
  }else{
    echo "You shouldn't be here!";
  }


?>
