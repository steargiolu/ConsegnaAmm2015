<?php
  
  if(isset($_GET['alert']) AND $_GET['alert'] == 1)
  {  
    echo '
    <script type="text/javascript">
      alert("Nome utente o password errati oppure account non attivato!")
    </script>';
  }
  include '../models/authentication.class.php';
  $auth = new UserAuthentication();
  $auth->IsAuth();
?>
<html>
  <head>
    <! Titolo compare barra in alto />
    <title>EventOne - Admin</title>

    <! Dati descrittivi e utili />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Sito per la creazione di eventi a cui il mondo piò partecipare"/>
    <meta name="keywords" content="evento, feste, divertimento, amici"/>

    <! Collegamento a css />
    <link href="../../css/home.css" rel="stylesheet" type="text/css">
    <link href="../../css/footer.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="top_bar">
      <div id="bar_container">
        <ul>
          <li><p>Admin</p>
          </li>
          <li><p>Bacheca</p></li>
        </ul>
      </div>
    </div>
    <div id="page">
      <div id="sidebar_left">
        <a id="logout" href="../controllers/logout.php">Logout</a>  
      </div>

      <div id="sidebar_right">
        <p></p>
      </div>


      <div id="content">
        <?php 
          $id = $_SESSION['user_id'];
          $i = 1;
          $nUtenti = $auth->NumeroUtentiRegistrati();
          $nUtenti++;
          echo '<p>Utenti</p>
                  <form id="login" action="../controllers/admin_elimina_utente.php" method="post">
                    <fieldset><select id="utente" name="utente" required>';
          $i = 2;
          while($i < $nUtenti)
          { 
          	
            $dati = $auth->RecuperaDatiUtente($i);
            if($dati!=null)
            {
 	      echo '<option value="'. $dati['idUtente'] .'">'. $dati['idUtente'] .' - '. $dati['nome'] .' - '. $dati['cognome'] .' - '. $dati['username'] .'</option>';
            }
            else
            {
              $nUtenti++;
            }
            $i++; 
          };
          echo '</select></fieldset>
	  	  <p>
		  <input type="submit" id="submit" value="Elimina">
          <p>(Cancella anche dati collegati)</p>
        </form>';


          $nEventi = $auth->RecuperaNumeroEventiTotali();
          $i = 0;
          echo '<p>Eventi</p>
                  <form id="login" action="../controllers/elimina_evento_admin.php" method="post">
                    <fieldset id="inputs"><select id="video" name="video" required>';
          while($i < $nEventi)
          { 
 	    $dati = $auth->RecuperaDatiEvento($i);
            if($dati['idEvento']!=null)
            {
 	      echo '<option value="'. $dati['idEvento'] .'">'. $dati['idEvento'] .' - '. $dati['nome'] .'</option>';           
            }
            else
            {
              $nEventi++;
            }
            $i++; 
          };
          echo '</select></fieldset>
              <fieldset id="actions">
            <input type="submit" id="submit" value="Elimina">
          </fieldset>
        <p>(Cancella anche dati collegati)</p>
        </form>';

	?>

      </div>


  </body>
</html>


