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
    <title>EventOne - Home</title>

    <! Dati descrittivi e utili />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Sito per la creazione di eventi a cui il mondo piò partecipare"/>
    <meta name="keywords" content="evento, feste, divertimento, amici"/>

    <! Collegamento a css />
    <link href="../../css/home.css" rel="stylesheet" type="text/css">
    <link href="../../css/footer.css" rel="stylesheet" type="text/css">
    
    <script type="text/javascript" src="../../script/ajax_go.js"></script>
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
          <li><a href="#">Bacheca</a></li>
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
        </br></br></br></br></br>
        <p>Nel sito è possibile grazie al menu a sinistra creare un evento e modificare/eliminare un avento precedentemente creato, nel reparto centrale è invece possibile vedere i nuovi eventi creati da tutti gli utenti EventOne. Nella barra in alto è inoltre possibile accedere alla propria pagina e cercare un evento di cui si conosce il nome o parte di esso.</p>
        </br></br></br></br></br>
        <input type='button' value='So tutto' onClick="ajax_go('messaggio_ajax.php','sidebar_right')" />
        </br></br></br></br></br>
      </div>


      <div id="content">
        <?php 
 	  $ndati = $auth->RecuperaNumeroEventi();
          $i = 0; 
          $neventi = $auth->RecuperaNumeroEventiTotali();
          while($i < $ndati)
          { 
 	    $dati = $auth->RecuperaDatiEvento($i);
            $idUtenteCreatore = $auth->RecuperaIdUtenteCreatore($dati['idEvento']);
            $nomeCreatore = $auth->RecuperaNomeCreatore($idUtenteCreatore);
            $nPartecipanti = $auth->RecuperaNumeroPartecipanti($dati['idEvento']);
            $nIdecisi = $auth->RecuperaNumeroIndecisi($dati['idEvento']);
            $nonPartecipanti = $auth->RecuperaNumeroNonPartecipanti($dati['idEvento']);
            if($dati['nome']!="")
            {
  	    echo '<div id="blocco_evento">
		    <ul id="orizz">
    		      <li><h1>'. $dati['nome'] .'</h1> </li>
   		      <li><p></p></li>
   		      <li><h5>by:</h5><a href="profilo_utente.php?id='. $idUtenteCreatore .'">'. $nomeCreatore .'</a></li>
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
                      <input type="submit" id="submit" value="Partecipo">
                  </form>
                  <hr align="center" size="1" width="78%" color="darkgrey">';
             }  
             $forse = $auth->ControlloSeForsePartecipa($idUtenteCreatore,$dati['idEvento']);

             if($forse > 0)
             {
             $id = $auth->RecuperaIdForse($idUtenteCreatore,$dati['idEvento']);
             echo '<form id="login" action="../controllers/nonPartecipo.php?n=2&id='. $id .'" method="post">
                      <input type="submit" id="submit" value="Forse">
                  </form>
                  <hr align="center" size="1" width="78%" color="darkgrey">';
             } 
             $nonPartecipa = $auth->ControlloSeNonPartecipa($idUtenteCreatore,$dati['idEvento']);

             if($nonPartecipa > 0)
             {
             $id = $auth->RecuperaIdNo($idUtenteCreatore,$dati['idEvento']);
             echo '<form id="login" action="../controllers/nonPartecipo.php?n=3&id='. $id .'" method="post">
                      <input type="submit" id="submit" value="Non partecipo">
                  </form>
                  <hr align="center" size="1" width="78%" color="darkgrey">';
             } 
             if($partecipa == 0 && $forse == 0 && $nonPartecipa == 0)
             {  
               echo '<form id="login" action="../controllers/pensieroSuEvento.php?id='. $idUtenteCreatore .'&evento='. $dati['idEvento'] .'" method="post">
                      <select id="pensiero" name="pensiero" required>
                        <option value="1">Partecipo</option>
                        <option value="2">Forse</option>
                        <option value="3">Non Partecipo</option>
                      </select>
                      <input type="submit" id="submit" value="Rispondi">
                  </form>
                  <hr align="center" size="1" width="78%" color="darkgrey">';
              }
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


