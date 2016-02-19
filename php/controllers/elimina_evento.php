<?php
  include '../models/authentication.class.php';
  $id = $_POST['id'];
  $auth = new UserAuthentication();
  $ok = $auth->EliminaEvento($id);
  if (!$ok)
  {
    header("Location: ../views/errore.php?err=1");
  }
  $ok = $auth->EliminaFesta($id);
  if ($ok)
  {
    header("Location: ../views/home.php");
  }
  else
  {
    header("Location: ../views/errore.php?err=1");
  }
?>

