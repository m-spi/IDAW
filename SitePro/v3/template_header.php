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

  foreach ($headersMap as $key => $value) {
    if($key == $currentPageId) $out = "<h1>{$value}</h1><div id=\"page\">";
  }
  echo $out;
}
?>
