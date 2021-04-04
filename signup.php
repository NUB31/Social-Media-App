<?php
session_start();
$title = "Signup";
include("header.php");
include("navOut.php");
include("connection.php");
include("functions.php");
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        if(!empty($user_name) && !empty($password))
        {
            //save to DB   
            $user_id = random_num(20);
            $query = "INSERT INTO users (user_id,user_name,psw) VALUES ('$user_id','$user_name','$hashedpassword')";
            
            mysqli_query($con,$query);

            header("Location: login.php");
            die;
        }else
        {
            print "<div 
            style='color: red; 
            display: flex; 
            justify-content: center; 
            margin-top: 2em;
            '>
            <p>Error: Please enter valid information!</p></div>";
        }
    }
?>

<head>

</head>

<div id="box">
<h1>Sign up</h1>
    <form method="post">
        <input type="text" name="user_name" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        
        <input id="signup-btn" type="submit" value="Sign Up">
        <a href="login.php"><b>Click here to log in</b></a>
    </form>
</div>

<?php
include("footer.php");
?>