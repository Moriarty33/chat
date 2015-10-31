<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$msg = $request->msg;
$id = $request->id;
include '../bd/connect.php';
$sql = "SELECT time FROM msg WHERE msg_id=$id ";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $time = $row["time"];
    }
} else {
    echo "0 results";
}
if (strlen($msg) > 0) {
    $sql = "UPDATE msg SET text='$msg',time ='$time'  WHERE msg_id=$id";
    if ($mysqli->query($sql) === TRUE) {
        echo "Сообщение Изменено";
    } else {
        echo "Ошыбка Изминения!: " . $mysqli->error;
    }
} else echo "Напишите свое сообщение!";
?>