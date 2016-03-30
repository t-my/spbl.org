<?php
  if (isset($_GET['tiedote'])) {
    require 'tiedote.php';
  }
  else {
    require 'tiedotteet.php';
  }
?>
