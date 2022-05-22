<?php 

require 'config.php';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$httpMethod = $_SERVER['REQUEST_METHOD'];
$contentType = explode(":",$_SERVER['CONTENT_TYPE'])[0];



switch ($httpMethod) {
  case 'GET':
    # code...
    $sql = 'SELECT * FROM `questions` WHERE 1';
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_num_rows($result);
    //Initializing arrays
    $question = array();
    $a = array();
    $b = array();
    $c = array();
    $d = array();
    $rightAnswer = array();
    while ($req=mysqli_fetch_assoc($result)) {
      $question[$i] = $req['question'];
      $a[$i] = $req['a'];
      $b[$i] = $req['b'];
      $c[$i] = $req['c'];
      $d[$i] = $req['d'];
      $rightAnswer[$i] = $req['rightAnswer'];

      // echo $question[$i].$a[$i];
      $json = json_decode(["question" => '$question']);
      echo $json;
      $i++;
    }


    break;
  case 'POST':
    # code...
    
    $dataJson = json_encode(file_get_contents('php://input'));
    $sql = 'INSERT INTO `questions`(`question`, `a`, `b`, `c`, `d`, `rightAnswer`)
      VALUES (
        "Qual dos nomes abaixo é de um dos criadores do Facebook Inc. agora META",
        "Ellon Musk",
        "Mark Zuckerberg",
        "Bill Gates",
        "Jeff Bazzos",
        "b"
    )';
  
    mysqli_query($connection, $sql);
    $f = json_decode($dataJson);
    echo $f;
    die();
    break;
  
  default:
    # code...
    echo "cannot ".$httpMethod;
    
    break;
}


// $sql = 'INSERT INTO `feedbacks`(`id`, `type`, `comment`, `screenshot`)
//   VALUES (
//     md5(NOW()),
//     "BUG",
//     "Shii!",
//     "test.png"
// )';

// mysqli_query($connection, $sql)


?>