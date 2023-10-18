<?php
  require_once('config.php'); // constants: _API_URL
  require(__DIR__.'/../vendor/autoload.php');

  use GuzzleHttp\Client;
  use GuzzleHttp\Handler\MockHandler;
  use GuzzleHttp\HandlerStack;
  use GuzzleHttp\Psr7\Response;
  use GuzzleHttp\Psr7\Request;
  use GuzzleHttp\Exception\RequestException;

  $client = new Client();

  $res = $client->request('POST', _API_URL, [
      'json' => [
        'name' => 'bob',
        'email' => 'bob@leponge.fr'
      ]]);
  if($res->getStatusCode() !== 201)
    throw new \Exception("POST : Wrong response code !", 1);


  $res = $client->request('GET', _API_URL);
  if($res->getStatusCode() !== 200)
    throw new \Exception("GET : Wrong response code !", 1);
  if(!str_starts_with($res->getHeader('content-type')[0], 'application/json'))
    throw new Exception("GET : Wrong content-type !", 1);

  echo "All good !\n";
?>
