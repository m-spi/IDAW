<?php
  session_start();
  if(isset($_GET['css']))
    setcookie('css', $_GET['css']);
  elseif(!isset($_COOKIE['css']))
    setcookie('css', 'style1');

  require_once('template_header.php');
?>
    <form id="style_form" action="index.php" method="GET">
      <select name="css">
        <option value="style1">style1</option>
        <option value="style2">style2</option>
      </select>
      <input type="submit" value="Appliquer" />
    </form>
    <a href="login.php">GOTO login.php</a>
  </body>
</html>
