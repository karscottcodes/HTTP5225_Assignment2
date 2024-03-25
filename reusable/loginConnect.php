<?php
if(isset($_POST['login'])){
  $email=$_POST['email'];
  $query= 'SELECT *
    FROM users
    WHERE email = "'.$email.'"
    AND password = "'.md5($_POST['password']).'"
    And permission = 0
    LIMIT 1';

  $admin_query='SELECT *
    FROM users
    WHERE email = "'.$email.'"
    AND password = "'.md5($_POST['password']).'"
    And permission = 1
    LIMIT 1';

  $result = mysqli_query($connect,$query);

  $result_admin = mysqli_query($connect,$admin_query);

  if(mysqli_num_rowS($result)>0){
      $record = mysqli_fetch_assoc($result);
      $_SESSION['id'] = $record['id'];
      $_SESSION['email'] = $record['email'];
      $pagename = htmlspecialchars(basename($_SERVER['PHP_SELF']));
      if(isset($_GET['id'])){
        header('Location: '.$pagename.'?userid='.$_SESSION['id'].'&id='.$_GET['id'].'');
      die();
      }
      else{
        header('Location: index.php?userid='.$_SESSION['id'].'');
        die();
      }

  
    }
    if(mysqli_num_rowS($result_admin)>0){
        $record = mysqli_fetch_assoc($result_admin);
        $_SESSION['id'] = $record['id'];
        $_SESSION['email'] = $record['email'];
        header('Location: admin/dashboard.php?adminid='.$_SESSION['id'].'');
        die();
    
    }
    else{
      $_SESSION['email']=$email;
        $_SESSION['error_message'] ='incorrect email/password';
        $pagename = htmlspecialchars(basename($_SERVER['PHP_SELF']));
        if(isset($_GET['id'])){
          header('Location: '.$pagename.'?id='.$_GET['id'].'');
        die();
        }
        else{
          header('Location: '.$pagename.'');
          die();
        }

    }
  }
  ?>