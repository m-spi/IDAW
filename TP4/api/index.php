<?php
  require_once('../open.php');
  require_once('functions.php');

  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: *");
  header("Content-Type: application/json; charset=UTF-8");

  switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
      getUsers($pdo);

      break;

    case 'POST':
      checkCT();

      $input = json_decode(file_get_contents('php://input'));
      createUser($pdo, $input);

      break;

    case 'PUT':
      checkCT();

      $uri = explode('/', $_SERVER['REQUEST_URI']);
      $user = $uri[5];
      $input = json_decode(file_get_contents('php://input'));
      updateUser($pdo, $user, $input);

      break;

    case 'DELETE':
      $uri = explode('/', $_SERVER['REQUEST_URI']);
      $user = $uri[5];
      deleteUser($pdo, $user);

      break;

    default:
      exit(1);
  }

  $pdo = null;

  function checkCT(){
      if(str_contains($_SERVER["SERVER_SOFTWARE"], 'Apache')){
        $headers = apache_request_headers();
        $h = $headers['Content-Type'];
        if(!str_contains($h, 'application/json')){
          echo 'Erreur : Mauvais Content-Type dans le request header.';
          http_response_code(400);
          exit(1);
        }
      }else{
        if(!str_contains($_SERVER['HTTP_CONTENT_TYPE'], 'application/json')){
          echo 'Erreur : Mauvais Content-Type dans le request header.';
          http_response_code(400);
          exit(1);
        }
      }
  }
?>
