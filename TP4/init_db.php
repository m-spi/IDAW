<?php
  require_once('open.php');

  $file = file_get_contents("./dbtest.sql");
  $request = $pdo->prepare($file);

  $request->execute();

  /*** close the database connection ***/
  $pdo = null;
?>
