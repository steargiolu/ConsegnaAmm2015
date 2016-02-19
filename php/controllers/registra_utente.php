<?php
  include '../models/authentication.class.php';
  $nome = $_POST['nome'];
  $cognome = $_POST['cognome'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $provincia = $_POST['provincia'];

  $auth = new UserAuthentication();
  $ok = $auth->ControlloUsername($username);
  /**controlla se esistono già utenti con quel nome**/

  
  /**ricerca id libero**/
  $id = 1;
  $a = 1;
    while ($a >= 0)
    { 
      $controllo = $auth->RegistraUtente($id,$nome,$cognome,$provincia,$username,$password);
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

  header("Location: ../views/messaggio_registrazione.php");
  //get con registrazione effettuata con successo

?>

