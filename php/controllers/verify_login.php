<?php
 
  include '../models/authentication.class.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $auth = new UserAuthentication();
  $controllo = $auth->VerifyLogin($username,$password);
  if($controllo == false)
  {
    header("Location: ../views/messaggio_login_errato.php");
  }
  else
  {
    $_SESSION['auth'] = 1;
    $_SESSION['user_id'] = $controllo['idUtente'];
    if($controllo['idUtente'] == 1)
    {
      header("Location: ../views/homeAdmin.php");
    }
    else
    {
      header("Location: ../views/home.php");
    }

  }

?>


