<html>
  <head>
    <! Titolo compare barra in alto />
    <title>EventOne - LogIn</title>

    <! Dati descrittivi e utili />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Sito per la creazione di eventi a cui il mondo piò partecipare"/>
    <meta name="keywords" content="evento, feste, divertimento, amici"/>

    <! Collegamento a css />

    <link href="../../css/login.css" rel="stylesheet" type="text/css">
    <link href="../../css/footer.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <p id="p_logo">EventOne</p>
    <div id="top_banda">
      
    </div>
    <div id="page">
      <div id="sidebar_left">
        <p id="p_scritta">->Organizza una festa dove vuoi</p>
        <p id="p_scritta">--------->Inserisci l annuccio</p>
        <p id="p_scritta">----->DIVERTITI</p>
        <p id="p_scritta">--------->DIVENTA FAMOSO</p>
      </div>

      <div id="sidebar_right">
        <h1 id="login_registrati">Registrati</h1>
        <form id="login" action="../controllers/registra_utente.php" method="post">
          <fieldset id="inputs">
            <p>Nome</p>
            <input id="nome" name="nome" type="text" placeholder="Nome" required>
            <p>Cognome</p>
            <input id="cognome" name="cognome" type="text" placeholder="Cognome" required>
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
            <p>Username</p>
            <input id="username" name="username" type="text" placeholder="Username" required>
            <p>Password</p>
            <input id="password" name="password" type="password" placeholder="Password" required>
          </fieldset>
          <fieldset id="actions">
            <input type="submit" id="submit" value="Registrati">
          </fieldset>
        </form>
      </div>
      
      <div id="content">
        <h1 id="login_registrati">Login</h1>
        <form id="login" action="../controllers/verify_login.php" method="post">
          <fieldset id="inputs">
            <p>Username</p>
            <input id="username" name="username" type="text" placeholder="Username" autofocus required>
            <p>Password</p>
            <input id="password" name="password" type="password" placeholder="Password" required>
          </fieldset>
          <fieldset id="actions">
            <input type="submit" id="submit" value="Collegati">
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>



