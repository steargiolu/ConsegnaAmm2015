<?php
  session_start();

  // destroy PHP session
  session_destroy();

  // return to site homepage
  header("Location: ../../index.php");
?>

