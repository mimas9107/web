<?php
  //include "load-config.php";
  require __DIR__ . '/vendor/autoload.php';

  $conf = loadDefault();

  loadHTMLSegment("html-head.inc.php", $conf);
  loadHTMLSegment("html-body.inc.php", $conf);
  loadHTMLSegment("html-ending.inc.php");
?>
