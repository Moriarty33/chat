<?php
include '../bd/connect.php';

$sql = "SELECT msg_id,user_login,text,time FROM msg WHERE visible=0 ORDER BY time ASC LIMIT 0 , 50  ";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        //echo "login " . $row["user_login"]. " text: " . $row["text"]. "msg id  " . $row["msg_id"]. " time ". $row["time"]. "<br>";
        $response['login'] = $row["user_login"];
        $response['text'] = $row["text"];
        $response['msg_id'] = $row["msg_id"];
        $response['time'] = $row["time"];
        $res[] = $response;
    }
    echo json_encode($res) . "\n";
} else {
    echo "0 results";
}
$mysqli->close();

?>