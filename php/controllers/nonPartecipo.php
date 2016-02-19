<?php
  include '../models/authentication.class.php';
  $n = $_GET['n'] ;
  $id = $_GET['id'] ;

  $auth = new UserAuthentication();

  if($n==1)
  {
    $ok = $auth->EliminaSi($id);
    if (!$ok)
    {
      header("Location: ../views/errore.php?err=1");
    }
  }
  if($n==2)
  {
    $ok = $auth->EliminaForse($id);
    if (!$ok)
    {
      header("Location: ../views/errore.php?err=1");
    }
  }
  if($n==3)
  {
    $ok = $auth->EliminaNo($id);
    if (!$ok)
    {
      header("Location: ../views/errore.php?err=1");
    }
  }
  

  header("Location: ../views/home.php");
?>
