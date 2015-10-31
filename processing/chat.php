<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$msg = $request->msg;
$login = $request->login;
include '../bd/connect.php';



if(strlen($msg)>0){
    $sql = "INSERT INTO msg (user_login, text)
                                        VALUES ('$login', '$msg')";
    if ($mysqli->query($sql) === TRUE) {
        echo "Сообщение отправлено!";
        $mysqli->close();
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
        $mysqli->close();
    }
}
else echo "Напишите свое сообщение!";
?>