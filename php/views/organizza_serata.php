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
  $dati = $auth->RecuperaNome();
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
    <link href="../../css/organizza_serata.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="top_bar">
      <div id="bar_container">
        <ul>
          <li><a href="home.php"><?php 
 					    $dati = $auth->RecuperaNome();
  					    echo $dati;
					   ?>
            </a></li>
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
        <p>a</p>
      </div>


      <div id="content">
        <div id="blocco_dati">
          <form action="../controllers/organizza_serata.php" method="post">
              <p>Nome</p>
              <input id="nome" name="nome" type="nome" placeholder="Nome" required>
              <p>Regione</p>

              <select id="regione" name="regione" required>
                <option value="ABRUZZO">ABBRUZZO</option>
                <option value="BASILICATA">BASILICATA</option>
                <option value="CALABRIA">CALABRIA</option>
                <option value="CAMPANIA">CAMPANIA</option>
                <option value="EMILIA-ROMAGNA">EMILIA-ROMAGNA</option>
                <option value="FRIULI-VENEZIA-GIULIA">FRIULI-VENEZIA-GIULIA</option>
                <option value="LAZIO">LAZIO</option>
                <option value="LIGURIA">LIGURIA</option>
                <option value="LOMBARDIA">LOMBARDIA</option>
                <option value="MARCHE">MARCHE</option>
                <option value="MOLISE">MOLISE</option>
                <option value="PIEMONTE">PIEMONTE</option>
                <option value="PUGLIA">PUGLIA</option>
                <option value="SARDEGNA">SARDEGNA</option>
                <option value="SICILIA">SICILIA</option>
                <option value="TOSCANA">TOSCANA</option>
                <option value="TRENTINO-ALTO ADIGE">TRENTINO-ALTO ADIGE</option>
                <option value="UMBRIA">UMBRIA</option>
                <option value="VALLE D AOSTA">VALLE D AOSTA</option>
                <option value="VENETO">VENETO</option>
              </select>
              <p>Provincia</p>
              <select id="provincia" name="provincia" required>
                <option value="AG">AGRIGENTO</option>
                <option value="AL">ALESSANDRIA</option>
                <option value="AN">ANCONA</option>
                <option value="AO">AOSTA</option>
                <option value="AR">AREZZO</option>
                <option value="AP">ASCOLI PICENO</option>
                <option value="AT">ASTI</option>
                <option value="AV">AVELLINO</option>
                <option value="BA">BARI</option>
                <option value="BT">BARLETTA-ANDRIA-TRANI</option>
                <option value="BL">BELLUNO</option>
                <option value="BN">BENEVENTO</option>
                <option value="BG">BERGAMO</option>
                <option value="BI">BIELLA</option>
                <option value="BO">BOLOGNA</option>
                <option value="BZ">BOLZANO</option>
                <option value="BS">BRESCIA</option>
                <option value="BR">BRINDISI</option>
                <option value="CA">CAGLIARI</option>
                <option value="CL">CALTANISSETTA</option>
                <option value="CB">CAMPOBASSO</option> 
                <option value="CI">CARBONIA-IGLESIAS</option>
                <option value="CE">CASERTA</option>
                <option value="CT">CATANIA</option>
                <option value="CZ">CATANZARO</option>
                <option value="CH">CHIETI</option>
                <option value="CO">COMO</option>
                <option value="CS">COSENZA</option> 
                <option value="CR">CREMONA</option> 
                <option value="KR">CROTONE</option> 
                <option value="CN">CUNEO</option> 
                <option value="EN">ENNA</option>
                <option value="FM">FERMO</option>
                <option value="FE">FERRARA</option>
                <option value="FI">FIRENZE</option>
                <option value="FG">FOGGIA</option>
                <option value="FC">FORLI’-CESENA</option>
                <option value="FR">FROSINONE</option>
                <option value="GE">GENOVA</option> 
                <option value="GO">GORIZIA</option>
                <option value="GR">GROSSETO</option> 
                <option value="IM">IMPERIA</option>
                <option value="IS">ISERNIA</option>
                <option value="SP">LA SPEZIA</option>
                <option value="AQ">L’AQUILA</option>
                <option value="LT">LATINA</option>
                <option value="LE">LECCE</option>
                <option value="LC">LECCO</option>
                <option value="LI">LIVORNO</option>
                <option value="LO">LODI</option>
                <option value="LU">LUCCA</option>
                <option value="MC">MACERATA</option>
                <option value="MN">MANTOVA</option> 
                <option value="MS">MASSA-CARRARA</option>
                <option value="MT">MATERA</option>
                <option value="VS"> MEDIO CAMPIDANO</option>
                <option value="ME">MESSINA</option>
                <option value="MI">MILANO</option>
                <option value="MO">MODENA</option>
                <option value="MB">MONZA E DELLA BRIANZA</option>
                <option value="NA">NAPOLI</option>
                <option value="NO">NOVARA</option>
                <option value="NU">NUORO</option>
                <option value="OG">OGLIASTRA</option>
                <option value="OT">OLBIA-TEMPIO</option>
                <option value="OR">ORISTANO</option>
                <option value="PD">PADOVA</option>
                <option value="PA">PALERMO</option>
                <option value="PR">PARMA</option>
                <option value="PV">PAVIA</option>
                <option value="PG">PERUGIA</option>
                <option value="PU">PESARO E URBINO</option>
                <option value="PE">PESCARA</option>
                <option value="PC">PIACENZA</option>
                <option value="PI">PISA</option>
                <option value="PT">PISTOIA</option>
                <option value="PN">PORDENONE</option>
                <option value="PZ">POTENZA</option>
                <option value="PO">PRATO</option>
                <option value="RG">RAGUSA</option>
                <option value="RA">RAVENNA</option>
                <option value="RC">REGGIO DI CALABRIA</option> 
                <option value="RE">REGGIO NELL’EMILIA</option>
                <option value="RI">RIETI</option>
                <option value="RN">RIMINI</option>
                <option value="RM">ROMA</option>
                <option value="RO">ROVIGO</option>
                <option value="SA">SALERNO</option>
                <option value="SS">SASSARI</option>
                <option value="SV">SAVONA</option>
                <option value="SI">SIENA</option>
                <option value="SR">SIRACUSA</option>
                <option value="SO">SONDRIO</option>
                <option value="TA">TARANTO</option>
                <option value="TE">TERAMO</option>
                <option value="TR">TERNI</option>
                <option value="TO">TORINO</option>
                <option value="TP">TRAPANI</option>
                <option value="TN">TRENTO</option>
                <option value="TV">TREVISO</option>
                <option value="TS">TRIESTE</option>
                <option value="UD">UDINE</option>
                <option value="VA">VARESE</option>
                <option value="VE">VENEZIA</option>
                <option value="VB">VERBANO-CUSIO-OSSOLA</option>
                <option value="VC">VERCELLI</option>
                <option value="VR">VERONA</option>
                <option value="VV">VIBO VALENTIA</option>
                <option value="VI">VICENZA</option>
                <option value="VT">VITERBO</option>
              </select>
              <p>Citta</p>
              <input id="citta" name="citta" type="text" placeholder="Citta" required>
              <p>Piccola descrizione</p>
              <input id="piccola_descrizione" name="piccola_descrizione" type="text" placeholder="Descrizione (255 max)" required>
              <p>Descrizione completa</p>
              <textarea id="grande_descrizione" name="grande_descrizione" rows="10" cols="90"></textarea>
            <fieldset id="actions">
              <input type="submit" id="submit" value="Organizza">
            </fieldset>
          </form> 

   








        </div>
      </div>
    </div>

<?php
//Footer
include('footer.php');
?>



  </body>
</html>


