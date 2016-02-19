<?php
  include '../models/authentication.class.php';
  $pensiero = $_POST['pensiero'];
  $idUtente = $_GET['id'] ;
  $idEvento = $_GET['evento'] ;

  $auth = new UserAuthentication();

  if($pensiero == 1)
  {
     $registra = $auth->RegistraPartecipo($idUtente,$idEvento);
     if($registra == FALSE)
     {
       header("Location: ../views/errore.php?err=1");
     }
  }
  if($pensiero == 2)
  {
     $registra = $auth->RegistraForse($idUtente,$idEvento);
     if($registra == FALSE)
     {
       header("Location: ../views/errore.php?err=1");
     }
  }
  if($pensiero == 3)
  {
     $registra = $auth->RegistraNonPartecipo($idUtente,$idEvento);
     if($registra == FALSE)
     {
       header("Location: ../views/errore.php?err=1");
     }
  }

  header("Location: ../views/home.php");




?>
