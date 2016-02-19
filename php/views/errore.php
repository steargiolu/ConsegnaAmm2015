<?php
  $err = $_GET['err'] ;
   
  switch($i)
  {
    case 1:
      $msg = "Errore durante operazione con Db!"; 
    case 2:
      $msg = "Errore, username già utilizzato!";
    case 3:
      $msg = "Errore, username non presente!";
  }
/*  echo '
  <?php
$messaggio = '';
if(condizione) {
   $messaggio = 'Messaggio di errore';
}*/
?>
<html>
   <head>
      <script  type="text/javascript" language="javascript">
      var errorMsg = '<? echo addslashes($messaggio); ?>';
      if (errorMsg != '') {
         document.getElementById('Errore').style.display: 'block';
         document.getElementById('Errore').innerHTML = '<p>' + errorMsg + '</p>';
      }
      </script>
   </head>
   <body>
   <div id="Errore" style="display:none"></div>
   </body>
</html>


