<?php
  
  if(isset($_GET['alert']) AND $_GET['alert'] == 1)
  {  
    echo '
    <script type="text/javascript">
      alert("Nome utente o password errati oppure account non attivato!")
    </script>';
  }

?>
<html>
  <head>
    <! Titolo compare barra in alto />
    <title>EventOne</title>

    <! Dati descrittivi e utili />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Sito per la creazione di eventi a cui il mondo piò partecipare"/>
    <meta name="keywords" content="evento, feste, divertimento, amici"/>

    <! Collegamento a css />
    <link href="../../css/home.css" rel="stylesheet" type="text/css">
    <link href="../../css/footer.css" rel="stylesheet" type="text/css">
    <link href="../../css/profilo_utente.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="top_bar">
      <div id="bar_container">
        <ul>
          <li><a href="profilo_utente.php"><?php 
							    include '../models/authentication.class.php';
  							    $auth = new UserAuthentication();
 							    $auth->IsAuth();
 							    $dati = $auth->RecuperaNome();
  							    echo $dati;
							  ?>
	       </a>
          </li>
          <li><a href="home.php">Bacheca</a></li>
          <li>
            <form id="searchThis" action="../controllers/ricerca_evento.php" method="post">
              <fieldset id="ricerca">
                <input id="ricerca" name="ricerca" type="nome" placeholder="Cerca evento" required>
              </fieldset>
              <fieldset id="cerca">
                <input type="submit" id="submit" value="Go">
              </fieldset>
            </form>
          </li>
        </ul>
      </div>
    </div>
    <div id="page">
      <div id="sidebar_left">
        <ul>
          <li><a href="organizza_serata.php">Organizza evento</a></li>
          <li><a href="modifica_serata.php">Modifica evento</a></li>
          <li><a href="elimina_evento.php">Elimina evento</a></li>
        </ul>
        <ul>
          <li><a href="cerca_vicino_te.php">Cerca vicino a te</a></li>
        </ul>
        <a id="logout" href="../controllers/logout.php">Logout</a>
      </div>

      <div id="sidebar_right">
        <p></p>
      </div>


      <div id="content">
        <div id="blocco_dati">
        <?php  

          $id = $_SESSION['user_id'];
          $dati = $auth->RecuperaDatiUtente($id);
          echo '<ul id="orizz">
    		  <li><p>'. $dati['nome'] .'</p></li>
   		  <li><p>'. $dati['cognome'] .'</p></li>
	        </ul><BR><BR><BR><BR><BR>
                <p></p>
    	        <p>Provincia</p>
    	        <p id="imp">'. $dati['provincia'] .'</p>
    	        <p>Username</p>
                <p id="imp">'. $dati['username'] .'</p>
                <BR><BR><BR><BR>';

	?> 

        </div>
      </div>


<?php
//Footer
include('footer.php');
?>


  </body>
</html>


