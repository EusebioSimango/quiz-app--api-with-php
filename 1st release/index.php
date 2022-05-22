<?php 

require 'config.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$httpMethod = $_SERVER['REQUEST_METHOD'];
$contentType = explode(":",$_SERVER['CONTENT_TYPE'])[0];


switch ($httpMethod) {
  case 'GET':
    $sql = 'SELECT * FROM `questions` WHERE 1';
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_num_rows($result);
    echo "[";
    while ($req=mysqli_fetch_assoc($result)) {
      $json = array();
      $questions = array();
      $questions[$i]['question'] = $req['question'];
      $questions[$i]['optionA'] = $req['a'];
      $questions[$i]['optionB'] = $req['b'];
      $questions[$i]['optionC'] = $req['c'];
      $questions[$i]['optionD'] = $req['d'];
      $questions[$i]['rightAnswer'] = $req['rightAnswer'];
      $json[$i] = $questions[$i];
      $jsonEncoded = json_encode($json);
      $jsonDecoded = json_decode($jsonEncoded, false);

      if ($i > 0) echo ",".json_encode($jsonDecoded->$i);
      if ($i == 0) echo(json_encode($jsonDecoded->$i));

      $i++;
    }
    echo "]";

    break;
  case 'POST':
    
    $dataJson = file_get_contents('php://input');
    $f = json_encode($dataJson);
    $data = json_decode([$dataJson][0]);
    $sql = "INSERT INTO `questions`(`question`, `a`, `b`, `c`, `d`, `rightAnswer`)
      VALUES (
        '$data->question',
        '$data->a',
        '$data->b',
        '$data->c',
        '$data->d',
        '$data->rightAnswer'
    )";
  
    mysqli_query($connection, $sql);
    die();
    break;
  
  default:
    echo "cannot ".$httpMethod;
    break;
}
?>