<?php
    include("connection.php");
    include("functions.php");
    session_start();

    if(isset($_SESSION['user_id']))
{
        $user_data = check_login($con);
        $user_id = $user_data['id'];
        $query = "UPDATE users SET active_now = 'not online' WHERE id = '$user_id'";
        $result = mysqli_query($con,$query);
        unset($_SESSION['user_id']);
}

header("location: login.php");
die;