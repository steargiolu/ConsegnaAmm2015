<?php
 
session_start();
 
class UserAuthentication
{
  public $conn;
 
  protected function DbConnect()
  {
    include "dbConfig.php";
    $this->conn = mysql_connect(DB_HOST,DB_USER,DB_PASS) OR die("Impossibile connettersi al database");
    mysql_select_db(DB_NAME, $this->conn);
  }
 

  public function VerifyLogin($username,$password)
  {
    $this->DbConnect();
    $sql = "SELECT * FROM tblUtenti WHERE username='$username' AND password='$password'";
    $res = mysql_query($sql,$this->conn);
    if($row = mysql_fetch_array($res))
    {
      return $row['idUtente'];
    }
    else
    {
      return false;
    }  

}
  public function IsAuth()
  {
    if(!isset($_SESSION['auth']))
    {
      header("Location: login.php");
      die;
    }
  }
  public function NumeroUtentiRegistrati()
  {
    $this->DbConnect();
    $sql = "SELECT * FROM tblUtenti;";
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }    
  public function RecuperaNome()
  {
    $this->DbConnect();
    $sql = "SELECT * FROM tblUtenti WHERE idUtente = '$_SESSION[user_id]';";
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row['nome'];
  }
  public function RegistraEvento($id,$nome,$regione,$provincia,$citta,$piccola_descrizione,$grande_descrizione)
  {
    $this->DbConnect();
    $sql = "INSERT INTO tblEventi (idEvento, nome, regione, provincia, citta, piccolaDescrizione, grandeDescrizione) VALUES ('$id','$nome','$regione','$provincia','$citta','$piccola_descrizione','$grande_descrizione');";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    if(!$res)
    {
      return false;
    } 
    else
    {
      return true;
    }
  }
  public function RegistraFesta($idEvento)
  {
    $this->DbConnect();
    $idUtente = $_SESSION['user_id'];
    $sql = "INSERT INTO tblFeste (idFesta, utenteId, eventoId) VALUES (DEFAULT, '$idUtente' ,'$idEvento');";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    if(!$res)
    {
      return false;
    } 
    else
    {
      return true;
    }
  }
  public function RecuperaDatiEvento($nriga)
  { 
    $this->DbConnect();
    $sql = 'SELECT * FROM tblEventi LIMIT 1 OFFSET '. $nriga .' ;';
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row;
  }
  public function RecuperaIdUtenteCreatore($idEvento)
  { 
    $this->DbConnect();
    $sql = "SELECT * FROM tblFeste WHERE eventoId = ' $idEvento ';";
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row['utenteId'];
  }
  public function RecuperaNomeCreatore($idUtenteCreatore)
  {
    $this->DbConnect();
    $sql = "SELECT * FROM tblUtenti WHERE idUtente = ' $idUtenteCreatore ';";
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row['nome'];
  }
  public function RecuperaNumeroEventi()
  {
    $this->DbConnect();
    $sql = "SELECT * FROM tblEventi;";
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }     
  public function RecuperaNumeroEventiTotali()
  {
    $this->DbConnect();
    $sql = "SELECT * FROM tblFeste;";
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }
  public function RecuperaNumeroEventiTotaliUtente()
  {
    $this->DbConnect();
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM tblFeste WHERE utenteId = ' $id ';";
    if(!mysql_query($sql,$this->conn)){return 0;}
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    return $num;
  }   
  public function RecuperaDatiEventoUtente($nriga)
  { 
    $this->DbConnect();
    $id = $_SESSION['user_id'];
    $sql = 'SELECT * FROM tblEventi INNER JOIN tblFeste ON tblEventi.idEvento = tblFeste.eventoId AND tblFeste.utenteId = '. $id .' LIMIT 1 OFFSET '. $nriga .';';
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row;
  }
  public function ModificaEvento($id,$nome,$regione,$provincia,$citta,$piccola_descrizione,$grande_descrizione)
  {
    $this->DbConnect();
    $sql = "UPDATE tblEventi SET nome = ' $nome ', regione = ' $regione ', provincia = ' $provincia ', citta = ' $citta ', piccolaDescrizione = ' $piccola_descrizione ', grandeDescrizione = ' $grande_descrizione ' WHERE idEvento = ' $id ';";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    return $res;
  }
  public function EliminaEvento($id)
  {
    $this->DbConnect();
    $sql = "DELETE FROM tblEventi WHERE idEvento = ' $id ';";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    return $res;
  }
  public function EliminaFesta($id)
  {
    $this->DbConnect();
    $sql = "DELETE FROM tblFeste WHERE eventoId = ' $id ';";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    return $res;
  }
  public function ControlloUsername($username)
  {
    $this->DbConnect();
    $sql = "SELECT * FROM tblUtenti WHERE username = ' $username';";
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    if($num > 0)
    {
      return 0;
    }
    return 1;
  }   
  public function RegistraUtente($id,$nome,$cognome,$provincia,$username,$password)
  {
    $this->DbConnect();
    $sql = "INSERT INTO tblUtenti (idUtente, nome, cognome, username, password, nfans, provincia) VALUES ('$id','$nome','$cognome','$username','$password',0,'$provincia');";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    if(!$res)
    {
      return false;
    } 
    else
    {
      return true;
    }

  }
  public function RecuperaDatiUtente($id)
  {
    $this->DbConnect();
    $sql = 'SELECT * FROM tblUtenti WHERE idUtente = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    if(!$res)
    {
      return null;
    } 
    else
    {
      return $row;
    }
  }
  public function RecuperaDatiEventoVicino($id,$nriga)
  { 
    $this->DbConnect();
    $sql = 'SELECT tblEventi.nome, tblEventi.regione, tblEventi.provincia, tblEventi.citta, tblEventi.piccolaDescrizione, tblEventi.idEvento FROM tblEventi INNER JOIN tblUtenti ON tblEventi.provincia = tblUtenti.provincia AND tblUtenti.idUtente = '. $id .' LIMIT 1 OFFSET '. $nriga .';';
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row;
  }
  public function RecuperaNumeroEventiVicini($id)
  {
    $this->DbConnect();
    $sql = 'SELECT * FROM tblUtenti INNER JOIN tblEventi ON tblEventi.provincia = tblUtenti.provincia AND tblUtenti.idUtente = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }
 public function RecuperaNumeroEventiRicerca($ricerca)
  {
    $this->DbConnect();
    $sql = 'SELECT * FROM tblEventi WHERE nome LIKE "%'. $ricerca .'%";';
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }
  public function RecuperaDatiEventoRicerca($ricerca,$nriga)
  { 
    $this->DbConnect();
    $sql = 'SELECT * FROM tblEventi WHERE nome LIKE "%'. $ricerca .'%" LIMIT 1 OFFSET '. $nriga .';';
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row;
  }
  public function ControlloSePartecipa($idUtente,$idEvento)
  { 
    $this->DbConnect();
    $sql = "SELECT * FROM tblSi WHERE utenteId =  '$idUtente'  AND eventoId =  '$idEvento' ;";
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }
  public function RecuperaNumeroPartecipanti($idEvento)
  { 
    $this->DbConnect();
    $sql = "SELECT * FROM tblSi WHERE eventoId =  '$idEvento' ;";
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }
  public function ControlloSeForsePartecipa($idUtente,$idEvento)
  { 
    $this->DbConnect();
    $sql = "SELECT * FROM tblForse WHERE utenteId =  '$idUtente'  AND eventoId =  '$idEvento' ;";
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }
  public function RecuperaNumeroIndecisi($idEvento)
  { 
    $this->DbConnect();
    $sql = "SELECT * FROM tblForse WHERE eventoId =  '$idEvento' ;";
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }
  public function ControlloSeNonPartecipa($idUtente,$idEvento)
  { 
    $this->DbConnect();
    $sql = "SELECT * FROM tblNo WHERE utenteId =  '$idUtente'  AND eventoId =  '$idEvento' ;";
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }
  public function RecuperaNumeroNonPartecipanti($idEvento)
  { 
    $this->DbConnect();
    $sql = "SELECT * FROM tblNo WHERE eventoId =  '$idEvento' ;";
    $res = mysql_query($sql,$this->conn);
    $num = mysql_num_rows($res);
    mysql_close($this->conn);
    return $num;
  }
  public function RecuperaIdPartecipo($idUtente,$idEvento)
  {
    $this->DbConnect();
    $sql = "SELECT * FROM tblSi WHERE utenteId =  '$idUtente'  AND eventoId =  '$idEvento' ;";
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row['idSi'];
  }
  public function RecuperaIdForse($idUtente,$idEvento)
  {
    $this->DbConnect();
    $sql = "SELECT * FROM tblForse WHERE utenteId = ' $idUtente ' AND eventoId = ' $idEvento ';";
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row['idForse'];
  }
  public function RecuperaIdNo($idUtente,$idEvento)
  {
    $this->DbConnect();
    $sql = "SELECT * FROM tblNo WHERE utenteId = ' $idUtente ' AND eventoId = ' $idEvento ';";
    $res = mysql_query($sql,$this->conn);
    $row = mysql_fetch_array($res);
    mysql_close($this->conn);
    return $row['idNo'];
  }
  public function RegistraPartecipo($idUtente,$idEvento)
  {
    $this->DbConnect();
    $sql = "INSERT INTO tblSi (idSi, utenteId, eventoId) VALUES (DEFAULT,' $idUtente ',' $idEvento ');";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    if(!$res)
    {
      return false;
    } 
    else
    {
      return true;
    }
  }
  public function RegistraForse($idUtente,$idEvento)
  {
    $this->DbConnect();
    $sql = "INSERT INTO tblForse (idForse, utenteId, eventoId) VALUES (DEFAULT,' $idUtente ',' $idEvento ');";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    if(!$res)
    {
      return false;
    } 
    else
    {
      return true;
    }
  }
  public function RegistraNonPartecipo($idUtente,$idEvento)
  {
    $this->DbConnect();
    $sql = "INSERT INTO tblNo (idNo, utenteId, eventoId) VALUES (DEFAULT,' $idUtente ',' $idEvento ');";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    if(!$res)
    {
      return false;
    } 
    else
    {
      return true;
    }
  }
  public function EliminaSi($id)
  {
    $this->DbConnect();
    $sql = "DELETE FROM tblSi WHERE idSi = ' $id ';";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    return $res;
  }
  public function EliminaForse($id)
  {
    $this->DbConnect();
    $sql = "DELETE FROM tblForse WHERE idForse = ' $id ';";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    return $res;
  }
  public function EliminaNo($id)
  {
    $this->DbConnect();
    $sql = "DELETE FROM tblNo WHERE idNo = ' $id ';";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    return $res;
  }
  public function EliminaUtente($id)
  {
    $this->DbConnect();
    $sql = "DELETE FROM tblUtenti WHERE idUtente = ' $id ';";
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    return $res;
  }
  public function EliminaEventoUtenteEliminato($id)
  {
    $this->DbConnect();
    $i = 0;
    $sql = 'DELETE tblEventi.* FROM tblFeste INNER JOIN tblEventi ON tblFeste.eventoId = tblEventi.idEvento WHERE tblFeste.utenteId = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    $sql = 'DELETE FROM tblFeste WHERE tblFeste.utenteId = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    $sql = 'DELETE FROM tblSi WHERE tblSi.utenteId = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    $sql = 'DELETE FROM tblNo WHERE tblNo.utenteId = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    $sql = 'DELETE FROM tblSi WHERE tblSi.utenteId = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    return true;
  }

  public function EliminaEventoAdmin($id)
  {
    $this->DbConnect();
    $i = 0;
    $sql = 'DELETE tblFeste.* FROM tblEventi INNER JOIN tblFeste ON tblFeste.eventoId = tblEventi.idEvento WHERE tblEventi.idEvento = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    $sql = 'DELETE FROM tblEventi WHERE idEvento = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    $sql = 'DELETE FROM tblSi WHERE tblSi.eventoId = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    $sql = 'DELETE FROM tblNo WHERE tblNo.eventoId = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    $sql = 'DELETE FROM tblNo WHERE tblSi.eventoId = '. $id .';';
    $res = mysql_query($sql,$this->conn);
    mysql_close($this->conn);
    return true;
  }
}
?>

