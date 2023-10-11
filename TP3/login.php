<?php
  session_start();
  require_once('template_header.php');
?>
    <form id="login_form" action="connected.php" method="POST">
      <table>
        <tr>
          <th>Login :</th>
          <td><input type="text" name="login"></td>
        </tr>
        <tr>
          <th>Mot de passe :</th>
          <td><input type="password" name="password"></td>
        </tr>
        <tr>
          <th></th>
          <td><input type="submit" value="Se connecter..." /></td>
        </tr>
      </table>
    </form>
    <a href="index.php">GOTO index.php</a>
  </body>
</html>
