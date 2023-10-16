<?php
  require_once('../open.php');

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $request = $pdo->prepare("SELECT * FROM users");

    $request->execute();
    $res = $request->fetchAll(PDO::FETCH_OBJ);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($res);
  }elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'));
    try{
      if(isset($input->name) && isset($input->email)){
        $name = $input->name;
        $email = $input->email;

        try{
          $request = $pdo->prepare("INSERT INTO users (id, name, email) VALUES (NULL, '{$name}', '{$email}')");
          $request->execute();
          echo "\nSuccessfully created user {$pdo->lastInsertId()}\n";
          http_response_code(201);
        }catch(PDOException $erreur){
          echo 'Erreur : '.$erreur->getMessage();
          http_response_code(500);
        }
      }

      else{
        http_response_code(400);
      }
    }catch(ErrorException $err){
      echo 'Erreur : '.$err->getMessage();
      http_response_code(500);
    }
  }

  $pdo = null;
?>
