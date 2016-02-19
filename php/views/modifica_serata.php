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
    <title>EventOne</title>

    <! Dati descrittivi e utili />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Sito per la creazione di eventi a cui il mondo piò partecipare"/>
    <meta name="keywords" content="evento, feste, divertimento, amici"/>

    <! Collegamento a css />
    <link href="../../css/home.css" rel="stylesheet" type="text/css">
    <link href="../../css/modifica_serata.css" rel="stylesheet" type="text/css">
    <link href="../../css/footer.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="top_bar">
      <div id="bar_container">
        <ul>
          <li><a href="profilo_utente.php"><?php 
 					    $dati = $auth->RecuperaNome();
  					    echo $dati
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
          <li><a href="organizza_serata.php">Organizza Serata</a></li>
          <li><a href="modifica_serata.php">Modifica Serata</a></li>
          <li><a href="elimina_evento.php">Elimina Serata</a></li>
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
        <?php 
          $i = 0; 
          $neventi = $auth->RecuperaNumeroEventiTotaliUtente();
          if($neventi == 0){echo 'Non hai organizzato nessun evento';}
          while($i < $neventi)
          { 
 	    $dati = $auth->RecuperaDatiEventoUtente($i);
  	    echo '<div id="blocco_evento_modifica">
                    <form action="../controllers/modifica_serata.php" method="post">
                        <p>Id</p>
                        <input id="id" name="id" type="text" value="'. $dati['eventoId'] .'" readonly = "readonly" >
                        <p>Nome</p>
                        <input id="nome" name="nome" type="text" value="'. $dati['nome'] .'" required>
                        <p>Regione</p>
                        <input id="regione" name="regione" type="text" value="'. $dati['regione'] .'" required>
                        <p>Provincia</p>
                        <input id="provincia" name="provincia" type="text" value="'. $dati['provincia'] .'" required>
                        <p>Citta</p>
                        <input id="citta" name="citta" type="text" value="'. $dati['citta'] .'" required>
                        <p>Piccola descrizione</p>
                        <input id="piccola_descrizione" name="piccola_descrizione" type="text" value="'. $dati['piccolaDescrizione'] .'" required>
                        <p>Grande descrizione</p>
                        <textarea id="grande_descrizione" name="grande_descrizione" rows="10" cols="90">'. $dati['grandeDescrizione'] .'</textarea>
						<p>
    					<input type="submit" id="submit" value="Salva">
                    </form>
                  </div>';
            $i++; 
          }?>

      </div>
<?php
//Footer
include('footer.php');
?>
  </body>
</html>


