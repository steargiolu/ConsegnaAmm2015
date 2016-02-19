<?php
  include '../models/authentication.class.php';
  $idUtente = $_POST['utente'];
  $auth = new UserAuthentication();
  $ok = $auth->EliminaUtente($idUtente);
  $ok = $auth->EliminaEventoUtenteEliminato($idUtente);
  header("Location: ../views/homeAdmin.php");
?>

