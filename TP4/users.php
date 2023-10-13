<?php
  require_once('open.php');

  $request = $pdo->prepare("select * from users");

  // TODO: add your code here
  // retrieve data from database using fetch(PDO::FETCH_OBJ) and
  // display them in HTML array

  $request->execute();
  $res = $request->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>dbtest users</title>
  </head>
  <body>
    <h1>Users</h1>
    <hr>
    <table>
      <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Email</th>
      </tr>
      <?php
        foreach($res as $r){
          echo "<tr>
                  <td>{$r->id}</td>
                  <td>{$r->name}</td>
                  <td>{$r->email}</td>
                </tr>
          ";}
      ?>
    </table>
    <hr>
    <form action="adduser.php" method="post">
      <table>
        <tr>
          <th>Nom :</th>
          <td><input type="text" name="name"></td>
        </tr>
        <tr>
          <th>Email :</th>
          <td><input type="text" name="email"></td>
        </tr>
        <tr>
          <th></th>
          <td><input type="submit" value="Créer utilisateur" /></td>
        </tr>
      </table>
    </form>
  </body>
</html>

<?php
  /*** close the database connection ***/
  $pdo = null;
?>
