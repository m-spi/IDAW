<?php
  require_once('open.php');

  if(isset($_POST['add']) && strlen($_POST['name']) > 0 && strlen($_POST['name']) > 0){
    try{
      $request = $pdo->prepare("INSERT INTO users (id, name, email) VALUES (NULL, '{$_POST['name']}', '{$_POST['email']}')");
      $request->execute();
    }catch(PDOException $erreur){
      echo 'Erreur : '.$erreur->getMessage();
    }
  }elseif(isset($_POST['change']) && strlen($_POST['name']) > 0 && strlen($_POST['name']) > 0){
    $once = 0;
    foreach($_POST as $key => $value){
      if(is_numeric($key)){
        $once++;
        $id = $key;
      }
    }
    if($once == 1){
      try{
        $request = $pdo->prepare("UPDATE users SET name='{$_POST['name']}', email='{$_POST['email']}' WHERE id={$id}");
        $request->execute();
      }catch(PDOException $erreur){
        echo 'Erreur : '.$erreur->getMessage();
      }
    }
  }elseif (isset($_POST['delete'])) {
    foreach ($_POST as $key => $value) {
      if(is_numeric($key)){
        try{
          $request = $pdo->prepare("DELETE FROM users WHERE id={$key}");
          $request->execute();
        }catch(PDOException $erreur){
          echo 'Erreur : '.$erreur->getMessage();
        }
      }
    }
  }

  $request = $pdo->prepare("SELECT * FROM users");

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
    <form method="post">
      <table>
        <tr>
          <th></th>
          <th>Id</th>
          <th>Nom</th>
          <th>Email</th>
        </tr>
        <?php
          foreach($res as $r){
            echo "<tr>
                    <td><input type=\"checkbox\" name=\"{$r->id}\"/></td>
                    <td>{$r->id}</td>
                    <td>{$r->name}</td>
                    <td>{$r->email}</td>
                  </tr>
            ";}
        ?>
      </table>
      <hr>
      <table>
        <tr>
          <th>Nom :</th>
          <td><input type="text" name="name"/></td>
        </tr>
        <tr>
          <th>Email :</th>
          <td><input type="text" name="email"/></td>
        </tr>
      </table>
      <input type="submit" name="add" value="Créer utilisateur"/>
      <input type="submit" name="change" value="Changer l'utilisateur"/>
      <input type="submit" name="delete" value="Supprimer"/>
    </form>
  </body>
</html>

<?php
  /*** close the database connection ***/
  $pdo = null;
?>
