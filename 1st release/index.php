<?php 

require 'config.php';
echo 'Hola, mundo!';

echo $id;

$sql = 'INSERT INTO `feedbacks`(`id`, `type`, `comment`, `screenshot`)
  VALUES (
    md5(NOW()),
    "BUG",
    "Shii!",
    "test.png"
)';

mysqli_query($connection, $sql)


?>