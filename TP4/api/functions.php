<?php
  function getUsers($pdo){
      $request = $pdo->prepare("SELECT * FROM users");

      $request->execute();
      $res = $request->fetchAll(PDO::FETCH_OBJ);

      echo json_encode($res);
  }

  function createUser($pdo, $input){
      if(!isset($input->name) || !isset($input->email)){
        echo 'Erreur : Il manque au moins un paramètre.';
        http_response_code(400);
      }else{
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
            echo 'Veuillez envoyer un nom et une adresse mail valide.';
            http_response_code(400);
          }
        }catch(ErrorException $err){
          echo 'Erreur : '.$err->getMessage();
          http_response_code(500);
        }
      }
  }

  function updateUser($pdo, $user, $input){
      if(!isset($input->name) || !isset($input->email)){
        echo 'Erreur : Il manque au moins un paramètre.';
        http_response_code(400);
      }else{
        try{
          $request = $pdo->prepare("UPDATE users SET name='{$input->name}', email='{$input->email}' WHERE id='{$user}'");

          if(!$request->execute()){
            echo 'Erreur : Aucun utilisateur avec cet id.';
            http_response_code(400);
          }else{
            echo "\nSuccessfully updated user {$user}\n";
            http_response_code(202);
          }
        }catch(Exception $err){
          echo 'Erreur : '.$err->getMessage();
          http_response_code(500);
        }
      }
  }

  function deleteUser($pdo, $user){
      try{
        $request = $pdo->prepare("DELETE FROM users WHERE id='{$user}'");

        if(!$request->execute()){
          echo 'Erreur : Aucun utilisateur avec cette id.';
          http_response_code(400);
        }else{
          echo 'Successfully deleted user {$user}';
          http_response_code(202);
        }
      }catch(Exception $err){
        echo 'Erreur : '.$err->getMessage();
        http_response_code(500);
      }
  }
?>
