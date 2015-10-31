<?php
session_start();
/*
* Collect all Details from Angular HTTP Request.
*/
include '../bd/connect.php';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$username = $request->username;
$password = $request->password;
$code = $request->captcha;
$check_user = $mysqli->query("select * from users where user_password='$password' AND user_login='$username'");

if ($code == $_SESSION['code']) {
    if (strlen($password) > 5) {
        if (strlen($username) > 4) {
            if (mysqli_num_rows($check_user) == 1) {
                $_SESSION['login'] = $username; // Initializing Session
                $response['session'] = "yes";
                $res[] = $response;
                echo json_encode($res) . "\n";
            } else {
                echo "Пароль или логин не правильный!";
            }
        } else echo "Имя должно бить больше 4 символов";

    } else echo "Пароль дожен быть больше 5 символов!" . $code;
} else echo "Пароль из капчи не совпадает!";

?>