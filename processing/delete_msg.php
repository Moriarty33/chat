<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$id = $request->id;
$login = $request->login;
include '../bd/connect.php';

$sql = "UPDATE msg SET visible=1 WHERE msg_id=$id";
if ($mysqli->query($sql) === TRUE) {
    echo "Сообщение удалено";
} else {
    echo "Ошыбка удаления!: " . $mysqli->error;
}

$mysqli->close();

?>