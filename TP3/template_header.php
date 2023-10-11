<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
      if(isset($_GET['css']))
        echo "<link rel=\"stylesheet\" href=\"styles/{$_GET['css']}.css\">";
      elseif(isset($_COOKIE['css']))
        echo "<link rel=\"stylesheet\" href=\"styles/{$_COOKIE['css']}.css\">";
      else
        echo "<link rel=\"stylesheet\" href=\"styles/style1.css\">";
    ?>
  </head>
  <body>
    <?php
      if(isset($_SESSION['login'])){
        echo "<h1>Bienvenue {$_SESSION['login']}</h1>";
        echo "<form id=\"deco\" action=\"deco.php\" method=\"POST\"> <input type=\"submit\" value=\"Déconnexion\"> </form>";
      }
    ?>
