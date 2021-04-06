<?php
// error_reporting(0);
// ini_set('display_errors', 0);
session_start();
include_once("connection.php");
include_once("functions.php");

$user_data = check_login($con);
$user_name = $user_data['user_name'];   
$user_id = $user_data['id'];


$friends = "SELECT b.user_name, b.PP, b.active_now, b.id FROM sql11403330.users_friends a, users b WHERE a.friendID_fk = b.id AND '$user_id' = a.myID_fk ORDER BY b.active_now"; 
$sql = mysqli_query($con, $friends);
$output = "";

if (mysqli_num_rows($sql) == 0) {
    $output .= "You have no friends retard";
} else if(mysqli_num_rows($sql) > 0) {
    while ($row = mysqli_fetch_assoc($sql)) {
        $offline = $row['active_now'];
        $output .= '
                <a onclick="userid = '. $row['id'] .'; openmsgbox();" class="friend message_reciever">   
                        <div class="friend-image">
                            <img src="./upload/'. $row['PP'] .'">
                        </div>
                        <div class="friend-col">
                            <div>
                                <h3>'. $row['user_name'] .'<i class="fas fa-circle '. $offline .'"></i></h3>
                            </div>
                            <div>
                                <p>'. $row['active_now'] .'</p>
                            </div>
                        </div>
                </a>';
    }
}echo $output;
?>

<script></script>