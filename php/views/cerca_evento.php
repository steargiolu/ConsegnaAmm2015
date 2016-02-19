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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
  </head>
  <body>
    <div id="top_bar">
      <div id="bar_container">
        <ul>
          <li><a href="profilo_utente.php"><?php
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
        <?php 
          $ricerca = $_GET['ric'] ;
 	  $ndati = $auth->RecuperaNumeroEventiRicerca($ricerca);
          $i = 0; 
          while($i < $ndati)
          { 
 	    $dati = $auth->RecuperaDatiEventoRicerca($ricerca,$i);
            $idUtenteCreatore = $auth->RecuperaIdUtenteCreatore($dati['idEvento']);
            $nomeCreatore = $auth->RecuperaNomeCreatore($idUtenteCreatore);
  	    echo '<div id="blocco_evento">
		    <ul id="orizz">
    		      <li><h1>'. $dati['nome'] .'</h1> </li>
   		      <li><p></p></li>
   		      <li><h5>by:</h5><a href="schedaUtente.php?id='. $idUtenteCreatore .'">'. $nomeCreatore .'</a></li>
		    </ul><br><br>          
                    <ul id="orizz">
    		      <li><p>- '. $dati['regione'] .' -</p></li>
   		      <li><p>- '. $dati['provincia'] .' -</p></li>
    		      <li><p>- '. $dati['citta'] .' -</p></li>
		    </ul><br><br>
          	    <p id="mini">Descrizione: </p><p>'. $dati['piccolaDescrizione'] .'</p>
                    <ul id="orizz">
    		      <li><p>Parteciperanno '. $nPartecipanti .' </p></li>
   		      <li><p>Indecisi '. $nIdecisi .' </p></li>
    		      <li><p>Non parteciperanno '. $nonPartecipanti .' </p></li>
		    </ul><br><br>
                  </div>';
             $partecipa = $auth->ControlloSePartecipa($idUtenteCreatore,$dati['idEvento']);

             if($partecipa > 0)
             {
             $id = $auth->RecuperaIdPartecipo($idUtenteCreatore,$dati['idEvento']);
             echo '<form id="login" action="../controllers/nonPartecipo.php?n=1&id='. $id .'" method="post">
                    <fieldset>
                      <input type="submit" id="submit" value="Partecipo">
                    </fieldset>
                  </form>';
             }  
             $forse = $auth->ControlloSeForsePartecipa($idUtenteCreatore,$dati['idEvento']);

             if($forse > 0)
             {
             $id = $auth->RecuperaIdForse($idUtenteCreatore,$dati['idEvento']);
             echo '<form id="login" action="../controllers/nonPartecipo.php?n=2&id='. $id .'" method="post">
                    <fieldset>
                      <input type="submit" id="submit" value="Forse">
                    </fieldset>
                  </form>';
             } 
             $nonPartecipa = $auth->ControlloSeNonPartecipa($idUtenteCreatore,$dati['idEvento']);

             if($nonPartecipa > 0)
             {
             $id = $auth->RecuperaIdNo($idUtenteCreatore,$dati['idEvento']);
             echo '<form id="login" action="../controllers/nonPartecipo.php?n=3&id='. $id .'" method="post">
                    <fieldset>
                      <input type="submit" id="submit" value="Non partecipo">
                    </fieldset>
                  </form>';
             } 
             if($partecipa == 0 && $forse == 0 && $nonPartecipa == 0)
             {  
               echo '<form id="login" action="../controllers/pensieroSuEvento.php?id='. $idUtenteCreatore .'&evento='. $dati['idEvento'] .'" method="post">
                    <fieldset>
                      <select id="pensiero" name="pensiero" required>
                        <option value="1">Partecipo</option>
                        <option value="2">Forse</option>
                        <option value="3">Non Partecipo</option>
                      </select>
                      <input type="submit" id="submit" value="Rispondi">
                    </fieldset>
                  </form>';
              }


            $i++; 
          };
	?>

      </div>


<?php
//Footer
include('footer.php');
?>



  </body>
</html>


