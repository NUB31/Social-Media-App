<?php
include("header.php");
?>
<body>
<!__ nav
    <nav class="nav">
    <div id="searchbar">
                <form mathod="POST">
                    <input id="searchbarinput" type="text" placeholder="Search for users, friends or posts">
                </form>
                <div id="hidden-search-wrapper">
                    <div id="hidden-search">

                    </div>
                </div>
            </div>
        <div class="wrapper">
            <h1>
            <?php    
                 print "$title"; ?>
            </h1>
            <ul>
                    <li id="navitem1"><a id="link1" href="logout.php"><strong>Logout</strong></a></li>
                    <li id="navitem2"><a id="link2" href="settings.php"><strong>Settings</strong></a></li>
                    <li id="navitem4"><a id="link3" href="index.php"><strong>Home</strong></a></li>
            </ul>
        </div>
    </nav>
<!__ main stuff
    <div class="wrapper">