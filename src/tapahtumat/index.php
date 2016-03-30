<?php
  if (isset($_GET['tapahtuma'])) {
    require 'tapahtuma.php';
  }
  else {
    require 'tapahtumat.php';
  }
?>
