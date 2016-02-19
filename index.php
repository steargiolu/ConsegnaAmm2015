<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h2> Descrizione dell'applicazione </h2>
        <p>
            L’applicazione supporta la programmazione di eventi sul web. 
            La funzionalità di base prevede che un utente possa inserire i dati 
            relativi a un evento che desidera programmare. 
            I dati che figurano per ogni statino sono i seguenti:
        </p>
        <ul>
            <li>Nome evento</li>
            <li>Posizione (città, indirizzo, etc)</li>
            <li>Descrizione dell'evento</li>
        </ul>

        <p>Inoltre, altri utenti potranno controllare la lista degli eventi che si terranno nei 
           suoi dintorni e decidere di segnalare la sua partecipazione o meno agli aventi caricati.
        </p>

        <p>L’applicazione mantiene il numero dei partecipanti e non all'evento in modo che ogni utente 
 	   capisca tramite il numero di partecipanti se si tratta della festa giusta per lui.  	   
 	</p>

        <p>
            Inoltre,  l’applicazione permette a ogni utente di modificare o rimuovere un evento da lui creato
	    eventando grattacapi con gli altri utenti.
        </p>
        <p>
	    Un utente detto "admin", ovvero colui che controlla e gestisce l'intero sito può decidere di rimuovere
	    un evento che non rispetti le regole del sito.
	</p>

        <h2> Requisiti del progetto </h2>
        <ul>
            <li>Utilizzo di HTML e CSS</li>
            <li>Utilizzo di PHP e MySQL</li>
            <li>Utilizzo del pattern MVC </li>
            <li>Due ruoli (utente e admin)</li>
            <li>Transazione per la registrazione/modifica e eliminazione degli eventi/utenti
	       (possibile trovare tali nella cartella controllers, e nel file Models.php)</li>
            <li>Rimozione ajax dell'help a lato della pagina home (ruolo utente)</li>

        </ul>
    </ul>

    <h2>Accesso al progetto</h2>
    <p>
        La homepage del progetto si trova sulla URL <a href="php/views/login.php">EventOne</a>
    <p>
    <p>Si pu&ograve; accedere alla applicazione con le seguenti credenziali</p>
    <ul>
        <li>Ruolo admin:</li>
        <ul>
            <li>username: admin</li>
            <li>password: argiolu</li>
        </ul>
        <li>Ruolo studente:</li>
        <ul>
            <li>username: utente</li>
            <li>password: utente</li>

        </ul>
        <li>Creando nuovo utente</li>
    </ul>
</body>
</html>


