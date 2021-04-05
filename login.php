<?php
    session_start();
    $title = "Login";
    include("header.php");
    include("navOut.php");
    include("connection.php");
    include("functions.php");
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

        if(!empty($user_name) && !empty($password))
        {
            //read to DB   
            $query = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";
            
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    $user_id = $user_data['id']; 
                    $hash = $user_data['psw'];

                    if(password_verify($password, $hash))
                        {
                            $user_id = $user_data['id'];
                            $query = "UPDATE users SET active_now = 'logged in' WHERE id = '$user_id'";
                            $result = mysqli_query($con,$query);
                            $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: index.php");
                            die;
                    }
                }
            }
            echo "<div 
            style='color: red; 
            display: flex; 
            justify-content: center; 
            margin-top: 2em;
            '>
            <p>Error: Wrong username or password!</p></div>";
        }else
        {
            echo "<div 
            style='color: red; 
            display: flex; 
            justify-content: center; 
            margin-top: 2em;
            '>
            <p>Error: Please enter valid information!</p></div>";
        }
    }
?>

<div id="box">
<h1>Login</h1>
    <form method="post">
        <input type="text" name="user_name" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        
        <input id="signup-btn" type="submit" value="Log In">
        <a class="signupredir" href="signup.php" id="gae"><b>Click here to sign up</b></a>
    </form>

</div>

<?php
require_once ("footer.php");
?>