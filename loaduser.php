<?php
session_start();
include_once("connection.php");
include_once("functions.php");

$messengerid = mysqli_real_escape_string($con, $_POST['userid']);

$sql = mysqli_query($con, "SELECT * FROM users WHERE id = '$messengerid'");
if(mysqli_num_rows($sql) > 0){
    $row = mysqli_fetch_assoc($sql);
    $username = $row["user_id"];
    echo '
<div class="message-wrapper">
    <div class="user_profile_message">
        <div class="messenger-image">
            <img src="./upload/'. $row['PP'] .'">
        </div>
        <div>
            <h3>'. $row['user_name'] .'<i class="fas fa-circle '. $row['active_now'] .'"></i></h3>
        </div>
    </div>
    <div class="message-column" id="message-column-id">
        <div class="my-message">
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et impedit quisquam pariatur!
            </p>
        </div>
        <div class="friend-message">
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et impedit quisquam pariatur!
            </p>
        </div>
        <div class="my-message">
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et impedit quisquam pariatur!
            </p>
        </div>
        <div class="friend-message">
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et impedit quisquam pariatur!
            </p>
        </div>
        <div class="my-message">
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et impedit quisquam pariatur!
            </p>
        </div>
        <div class="friend-message">
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Et impedit quisquam pariatur!
            </p>
        </div>
    </div>
</div>';
}
?>



