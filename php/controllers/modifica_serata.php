<?php
  include '../models/authentication.class.php';
  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $regione = $_POST['regione'];
  $provincia = $_POST['provincia'];
  $citta = $_POST['citta'];
  $piccola_descrizione = $_POST['piccola_descrizione'];
  $grande_descrizione = $_POST['grande_descrizione'];
  $auth = new UserAuthentication();

  echo $id;
  echo $nome;
  $ok = $auth->ModificaEvento($id,$nome,$regione,$provincia,$citta,$piccola_descrizione,$grande_descrizione);
  if ($ok)
  {
    header("Location: ../views/home.php");
  }
  else
  {
    header("Location: ../views/errore.php?err=1");
  }
?>

