<?php
  if (isset($_GET['julkaisu'])) {
    require 'julkaisu.php';
  }
  else {
    require 'julkaisut.php';
  }
?>
