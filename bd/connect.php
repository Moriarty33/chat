<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
//define('NAME_BD', 'chat');

$mysqli = @new mysqli(HOST, USER, PASSWORD);
if (mysqli_connect_errno()) {
    echo "Подключение невозможно: ".mysqli_connect_error();
}
$mysqli->select_db("chat");
?>