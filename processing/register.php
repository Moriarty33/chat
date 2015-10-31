<?php
/*
* Collect all Details from Angular HTTP Request.
*/
session_start();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$username = $request->username;
$password = $request->password;
$password1 = $request->password1;
$email = $request->email;
$code = $request->captcha;
include '../bd/connect.php';

//echo $username.$password.$password1.$email; //this will go back under "data" of angular call.
$check_username = $mysqli->query("SELECT user_login FROM users WHERE user_login LIKE '$username'");
$check_email = $mysqli->query("SELECT email FROM users WHERE email LIKE '$email'");


if ($code == $_SESSION['code']) {
    if (strlen($password) > 5) {
        if ($password == $password1) {
            if (strlen($username) > 4) {
                if (mysqli_num_rows($check_username) > 0) {
                    echo "Пользователь с таким именем уже существует";
                } else {
                    //Пользователя нет.Проверяим емаіл
                    if (mysqli_num_rows($check_email) > 0) {
                        echo "Пользователь с таким емайлов уже существует";
                    } else {
                        $sql = "INSERT INTO users (user_login, user_password, email)
                                            VALUES ('$username', '$password', '$email')";
                        if ($mysqli->query($sql) === TRUE) {
                            $_SESSION['login'] = $username; // Initializing Session
                            $response['session'] = "yes";
                            $res[] = $response;
                            echo json_encode($res) . "\n";
                            $mysqli->close();
                        } else {
                            echo "Error: " . $sql . "<br>" . $mysqli->error;
                            $mysqli->close();
                        }

                    }
                }

            } else {
                echo "Имя должно быть больше чем 4 символа!";
                $mysqli->close();
            }

        } else {
            echo "Разные пароли";
            $mysqli->close();
        }
    } else {
        echo "Пароль должен быть больше 5 символов!";
        $mysqli->close();
    }
} else echo "Пароль из капчи не совпадает!";
?>