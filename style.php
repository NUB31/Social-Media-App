<?php  
    header("Content-type: text/css; charset: UTF-8");

    session_start();
    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
    $bgcolor = $user_data['BgColor'];
    $boxcolor = $user_data['BoxColor'];
    $textcolor = $user_data['TextColor'];
    $hovercolor = $user_data['HoverColor'];
?>
#navitem1 a :hover, #navitem2 a :hover, #navitem3 a :hover, #navitem4 a :hover{
    transition: .2s;
    color: <?php echo $hovercolor; ?>;
}

body {
    background: <?php echo $bgcolor;?>;
    color: <?php echo $textcolor;?>;
}

a {
    color: <?php echo $textcolor. "!important";?>;
}

.submit-hover {
    background-color: <?php echo $textcolor;?>;
    color: <?php echo $bgcolor;?>;
}

.submit-hover:hover {
    background-color: <?php echo $hovercolor; ?> !important;
    <?php echo $bgcolor;?>;
}

.welcomeMessage {
    color: <?php echo $textcolor;?>;
}

.main-class {
    color: <?php echo $textcolor;?> ; 
    background-color: <?php echo $boxcolor;?>;
}

#profileInfo button {
    background-color: <?php echo $textcolor;?>;
    color: <?php echo $bgcolor;?>;
}

.friend {
    background: <?php echo $bgcolor;?>;
    color: <?php echo $textcolor;?>;
}

#setting-wrapper {
    background: <?php echo $boxcolor;?>;
}

#edit-button {
    background-color: <?php echo $textcolor;?>!important;
    color: <?php echo $bgcolor;?>!important;

}

#edit-button:hover {
    background-color: <?php echo $hovercolor; ?> !important;
}

#pp-button {
    background-color: <?php echo $textcolor;?> !important;
    color: <?php echo $bgcolor;?> !important;
}

#pp-button:hover {
    background-color: <?php echo $hovercolor; ?> !important;
}