<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Matis Spinelli</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="default" charset="utf-8"/>
  </head>
  <body>

<?php
function renderHeaderToHTML($currentPageId, $headersMap) {

  echo "<div id=\"header\"> <img src=\"../img/photo_profil.jpg\" alt=\"Moi\" width=150 height=165/>";
  foreach ($headersMap as $key => $value) {
    if($key == $currentPageId) $out = "<h1>{$value}</h1>";
  }
  echo $out;
  if(substr($currentPageId, 0, 2) == 'fr')
    echo "<a href=\"index.php?page=en" .substr($currentPageId, 2). "\"><img src=\"../img/uk.jpg\" alt=\"UK\" width=70 height=50/></a>";
  else
    echo "<a href=\"index.php?page=fr" .substr($currentPageId, 2). "\"><img src=\"../img/fr.jpg\" alt=\"FR\" width=70 height=50/></a>";

  echo "</div> <div id=\"page\">";
}
?>
