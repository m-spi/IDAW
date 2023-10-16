<?php
/*
  require_once('../config.php');

  use PHPUnit\Framework\TestCase;

  class APITests extends TestCase{
    public function testPOST(){
      $url = 'http://localhost/~spinelli/TP4/api/users.php';

      $data = array(
        'name' => 'bob',
        'email' => 'bob@leponge.fr'
      );

      $options = [
          'http' => [
              'header' => "Content-type: application/json\r\n",
              'method' => 'POST',
              'content' => json_encode($data),
          ],
      ];

      $context = stream_context_create($options);
      $resp = file_get_contents($url, false, $context);
      echo "resp is : ".gettype($resp)." : ".$resp;

      //----------------------------------------------------------------------

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json'));
      // set url
      curl_setopt($ch, CURLOPT_URL, "example.com");

      //return the transfer as a string
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      //enable headers
      curl_setopt($ch, CURLOPT_HEADER, 1);
      //get only headers
      curl_setopt($ch, CURLOPT_NOBODY, 1);
      // $output contains the output string
      $output = curl_exec($ch);

      // close curl resource to free up system resources
      curl_close($ch);

      // $this->assertEquals(201, $resp->getStatusCode());
      // $this->assertTrue($response->hasHeader('Location'));
      // $data = json_decode($response->getBody(true), true);
      // $this->assertArrayHasKey('id', $data);
    }
  }*/

  require_once('config.php'); // constants: _API_URL
  use PHPUnit\Framework\TestCase;
  use Http\Mock\Client;

  class APITests extends TestCase
  {
  public function testPOST()
  {
  $client = new Client(_API_URL, array(
  'request.options' => array(
  'exceptions' => false,
  )
  ));
  $data = array(
  'name' => 'bob',
  'email' => 'bob@leponge.fr'
  );
  $request = $client->post('/api/programmers', null, json_encode($data));
  $response = $request->send();
  $this->assertEquals(201, $response->getStatusCode());
  $this->assertTrue($response->hasHeader('Location'));
  $data = json_decode($response->getBody(true), true);
  $this->assertArrayHasKey('id', $data);
  }
  }
?>
