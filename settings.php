<?php
    session_start();
    $title = "Settings";
    include("header.php");
    include("navIn.php");
    include("connection.php");
    include("functions.php");
    
    $user_data = check_login($con);
    $user_name = $user_data['user_name']; 
    $user_id = $user_data['id'];
    
    $bgcolor = $user_data['BgColor'];
    $textcolor = $user_data['TextColor'];
    $hovercolor = $user_data['HoverColor'];
    $boxcolor = $user_data['BoxColor'];
    

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $bgcolor = $_POST['bg-text-input'];
        $boxcolor = $_POST['box-text-input'];
        $textcolor = $_POST['text-text-input'];
        $hovercolor = $_POST['hover-text-input'];
        $query = "UPDATE users SET BgColor  = '$bgcolor', BoxColor = '$boxcolor', TextColor = '$textcolor', HoverColor = '$hovercolor' WHERE id = $user_id";
        $result = mysqli_query($con, $query);
    }
?>
<div>
    <form method="POST">
        <div id="setting-wrapper">
            <div>
                <div class="settingHeader">
                    <h4>Background color: </h4>
                </div>
                <div class="settingInput">
                    <input class="settings" onchange="updateColor()" type="color" name="bg-input" id="bg-input" value="<?php echo ($bgcolor); ?>">
                    <input class="settings textfield" onchange="updateText()" type="text" name="bg-text-input" id="bg-text-input" value="<?php echo ($bgcolor); ?>">
                </div>
            </div>
            <div>
                <div class="settingHeader">
                    <h4>Box color: </h4>
                </div>
                <div class="settingInput">
                    <input class="settings" onchange="updateColor()" type="color" name="box-input" id="box-input" value="<?php echo ($boxcolor); ?>">
                    <input class="settings textfield" onchange="updateText()" type="text" name="box-text-input" id="box-text-input" value="<?php echo ($boxcolor); ?>">
                </div>
            </div>
            <div>
                <div class="settingHeader">
                    <h4>Text color: </h4>
                </div>
                <div class="settingInput">
                    <input class="settings" onchange="updateColor()" type="color" name="text-input" id="text-input" value="<?php echo ($textcolor); ?>">
                    <input class="settings textfield" onchange="updateText()" type="text" name="text-text-input" id="text-text-input" value="<?php echo ($textcolor); ?>">
                </div>
            </div>
            <div>
                <div class="settingHeader">
                    <h4>Accent color: </h4>
                </div>
                <div class="settingInput">
                    <input class="settings" onchange="updateColor()" type="color" name="hover-input" id="hover-input" value="<?php echo ($hovercolor); ?>">
                    <input class="settings textfield" onchange="updateText()" type="text" name="hover-text-input" id="hover-text-input" value="<?php echo ($hovercolor); ?>">
                </div>
            </div>
            <div>
                <input class="submit-hover" id="submit-button" type="submit" value="SAVE">
                <p class="submit-hover" id="submit-button" onclick="resetCol()">Deafult</p>
            </div>
        </div>
    </form>
    <script src="./main.js"></script>
</div>

<?php
include("footer.php");
?>
