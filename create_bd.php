<?php ?>
<?php
include 'bd/connect.php';

$sql = "CREATE DATABASE chat";
if ($mysqli->query($sql) === TRUE) {
    echo "Database Chat created successfully <br>";

} else {
    echo "Error creating database: <br>" . $mysqli->error;
}
$mysqli->select_db("chat");
$sql_create_table_users = "CREATE TABLE users(
user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_login VARCHAR(30) NOT NULL,
user_password VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
)";
$sql_create_table_msg = "CREATE TABLE msg(
msg_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_login VARCHAR(30) NOT NULL,
text TEXT NOT NULL,
time TIMESTAMP,
visible INT(1)  NULL DEFAULT  '0'
)";
if ($mysqli->query($sql_create_table_users) === TRUE) {
    echo "<br> Table Users created successfully <br>";
} else {
    echo "<br> Error creating table: <br>" . $mysqli->error;
}
if ($mysqli->query($sql_create_table_msg) === TRUE) {
    echo "<br> Table Msg created successfully <br>";
} else {
    echo "<br> Error creating table: <br>" . $mysqli->error;
}

$mysqli->close();

?>
