<?php
error_reporting(0);
ini_set('display_errors', 0);

session_start();
$title = "Profile";
include("header.php");
include("navIn.php");
include("connection.php");
include("functions.php");

$user_data = check_login($con);
$user_name = $user_data['user_name'];   
$user_id = $user_data['id'];
$profile_pic = "./upload/".$user_data["PP"];

$newuser_id = mysqli_real_escape_string($con, $_GET['user_id']);

if (!$newuser_id) {
    header("location: index.php?user_id=". $user_id);
}

$sql = mysqli_query($con, "SELECT * FROM users WHERE id = '$newuser_id'");
if(mysqli_num_rows($sql) > 0){
  $row = mysqli_fetch_assoc($sql);
  $profile_pic = "./upload/".$row["PP"];
  $username = $row["PP"];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $user_name = $_POST['username_input'];
    $query1 = "UPDATE users SET user_name = '$user_name' WHERE id = $user_id";
    $result = mysqli_query($con, $query1);


    if(isset($_FILES['fileToUpload'])){
        $errors= array();
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $date = time();
        $file_ext = strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));

        $extensions= array("jpeg","jpg","png","gif");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG, PNG or GIF file.";
        }
        
        if($file_size > 11000000){
           $errors[]='File size must be more than 10 MB';
        }
        
        if(empty($errors)==true){
            $img_name = $date.$file_name;
            move_uploaded_file($file_tmp,"./upload/".$img_name);
            $query2 = "UPDATE users SET PP = '$img_name' WHERE id = $user_id";
            $result = mysqli_query($con, $query2);
            header("Refresh:0");
        }
    }else {
        print_r($errors);
    }
}
?>
<div id="content-wrapper">
    <div id="profile-info-wrapper">
        <div class="main-class" id="profileInfo">
            <div>
                <img src="<?php 
                echo $profile_pic; 
                ?>">
            </div>
<?php 
if ($user_id == $newuser_id) {
    echo "
    <section class='form signup'>
    <form method='post' enctype='multipart/form-data' id='pp_form'>
        <div class='inputwrappers' id='fileinputwrapper'>
            <h4>Change you profile picture</h4>
            <input type='file' name='fileToUpload' id='fileToUpload'>
        </div>
        <div class='inputwrappers' id='usernameinputwrapper'>
            <h4>Change your username</h4>
            <input type='text' name='username_input' id='username_input' value='$user_name'>
        </div>
        <input class='submit-hover' id='pp-button' type='submit' value='Save changes' name='submit'>
    </form>
    </section>
    ";
}
?>
            <div class="welcomeMessage" id="username">
                <?php 
                echo $row["user_name"];
                ?>
            </div>
            <div>
                <a style="background-color: #dcdcdc" id="edit-button" class="submit-hover" onclick="editP()"> edit profile </a>
            </div>
        </div>    
    </div>
    <div id="profile-main-wrapper">
        <div class="main-class" id="alerts">
            <h3>
                Alerts
            </h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, illum recusandae. Dignissimos corrupti eligendi aspernatur cumque laudantium minima iste obcaecati.
            </p>
        </div>
        <div class="main-class" id="feed">
            <h3>
                Feed
            </h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, illum recusandae. Dignissimos corrupti eligendi aspernatur cumque laudantium minima iste obcaecati.
            </p>
        </div>
        <div class="main-class" id="friends">
            <h3>Your friends</h3>
            <div>
            <div class="friend">
                <div style="<?php 
                $boxcolor = $user_data['BoxColor']; 
                echo "background-color:". $boxcolor?>">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: rgba(0, 0, 0, 0) none repeat scroll 0% 0%; display: block; shape-rendering: auto;" width="118px" height="118px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                    <g transform="rotate(0 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.9049773755656109s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(21.176470588235293 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.8484162895927602s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(42.35294117647059 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.7918552036199095s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(63.529411764705884 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.7352941176470589s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(84.70588235294117 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.6787330316742082s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(105.88235294117646 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.6221719457013575s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(127.05882352941177 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.5656108597285068s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(148.23529411764707 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.5090497737556561s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(169.41176470588235 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.45248868778280543s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(190.58823529411765 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.39592760180995473s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(211.76470588235293 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.3393665158371041s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(232.94117647058823 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.2828054298642534s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(254.11764705882354 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.22624434389140272s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(275.29411764705884 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.16968325791855204s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(296.47058823529414 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.11312217194570136s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(317.6470588235294 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="-0.05656108597285068s" repeatCount="indefinite"></animate>
                    </rect>
                    </g><g transform="rotate(338.8235294117647 50 50)">
                    <rect x="49" y="22.5" rx="0" ry="0" width="2" height="11" fill="#0a0a0a">
                        <animate attributeName="opacity" values="1;0" keyTimes="0;1" dur="0.9615384615384615s" begin="0s" repeatCount="indefinite"></animate>
                    </rect>
                    </g>
                    </svg>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div id="message-button">
            <a onclick="message()">
                <i id="messageico" class="fas fa-comments"></i>
            </a>
    </div>
    <div id="msgbox-wrapper">
        <div id="msgbox">

        </div>
    </div>
</div>
<script src="./index.js"></script>
<script src="./users.js"></script>
<script src="./message.js"></script>
<?php
require_once ("footer.php");
?>
