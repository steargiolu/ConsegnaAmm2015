<?php
  include '../models/authentication.class.php';
  $nome = $_POST['nome'];
  $regione = $_POST['regione'];
  $provincia = $_POST['provincia'];
  $citta = $_POST['citta'];
  $piccola_descrizione = $_POST['piccola_descrizione'];
  $grande_descrizione = $_POST['grande_descrizione'];
  $auth = new UserAuthentication();
  /**ricerca id libero**/
  $id = 1;
  $a = 1;
  while ($a >= 0)
  { 
      $controllo = $auth->RegistraEvento($id,$nome,$regione,$provincia,$citta,$piccola_descrizione,$grande_descrizione);
      if($controllo == false)
      {
        $id++; 
        $a++;
      }
      else
      {
        $a = -10;
      }
  }

  /** registrazione su tblEventi**/ 
  $auth->RegistraFesta($id);
  header("Location: ../views/home.php");
?>

