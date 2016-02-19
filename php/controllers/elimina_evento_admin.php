<?php
  include '../models/authentication.class.php';
  $idEvento = $_POST['video'];
  $auth = new UserAuthentication();
  $ok = $auth->EliminaEventoAdmin($idEvento);
  header("Location: ../views/homeAdmin.php");
?>

