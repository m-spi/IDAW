<?php
  require_once('open.php');

  if(isset($_POST['name']) && isset($_POST['email'])){
    try{
      $request = $pdo->prepare("INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL,
        '{$_POST['name']}',
        '{$_POST['email']}')");
      $request->execute();
    }catch(PDOException $erreur){
      echo 'Erreur : '.$erreur->getMessage();
    }
  }else{
    echo "no param";
  }

  $pdo = null;

  header("Location: users.php");
?>
