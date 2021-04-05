<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);

$sql = "SELECT * FROM users WHERE NOT user_id = '$user_id' AND user_name LIKE '%$searchTerm%' AND '$searchTerm' != ''";

$output = "";
$query = mysqli_query($con, $sql);
if(mysqli_num_rows($query) > 0){
    while($row = mysqli_fetch_assoc($query)){
        $offline = $row['active_now'];
        $output .= '                
        <a href="./index.php?user_id='. $row['id'] .'" class="friend">
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
}else{
    $output = "";
    }
echo $output;
?>