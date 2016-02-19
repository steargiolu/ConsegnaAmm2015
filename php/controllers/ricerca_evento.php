<?php
  include '../models/authentication.class.php';
  $ricerca = $_POST['ricerca'];

  header("Location: ../views/cerca_evento.php?ric=$ricerca");




?>
