<?php
session_start();

if(!isset($_SESSION['Username'])){
    header("Location: index.php");
    exit();
}

include 'includes/database.inc.php';
include 'includes/chat-functions.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Alpha Chat v0.8</title>
    <link rel="icon" href="img/chat-icon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class = "page-body">
    <div class="sidebar">

        <div class="settings">
            <button id="settings-button" onclick="toggleSettings()">
                <img id="settings-img" src="img/settings.png">
            </button>
            <div id="settings-content">
                <a href="#">About</a>
                <a href="#">Settings</a>
                <a href="#">Report a problem</a>
                <a id="logout" href="includes/logout.inc.php" onclick = "return confirm('Do you want to log out?')">Logout</a>
            </div>

        </div>

        <div class="sidebarHeader">
            <div class="logo">
                Alpha Chat v0.8
            </div>
        </div>

        <div class="userList">

            <div class="user highlight" onclick='messageLogoChange(this), highlight(this)'>
                <img class='user-icon' src= 'img/group-usericon.png'>
                <div class='user-details'>
                    <b><span class='fullName'>Group Chat</span> <i hidden>(<span class='username'>group</span>)</i></b>
                </div>
            </div>

            <?php

            //Looping through all users and displaying them in the sidebar

            $sql = "SELECT * FROM Users";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){

                $fullName = $row['FirstName'] . " " . $row['LastName'];
                $userName = $row['Username'];
                $email = $row['Email'];

                if($row['Gender'] == "Male"){
                    $imgLink = 'img/male-usericon.png';
                }
                else{
                    $imgLink = 'img/female-usericon.png';
                }

                echo "<div class='user' 
                        onclick='messageLogoChange(this), highlight(this)'> 
                        <img class='user-icon' src= $imgLink >
                        <div class='user-details'><span class='fullName'>" . $fullName . "</span> <i>(<span class='username'>"  .$userName . "</span>)</i></div>
                      </div>";
            }
            ?>
        </div>
    </div>

    <div class = "page-wrapper">
        <p id = "messageLogo">
            <span class='fullName'> Group Chat</span> <i hidden>(<span class='username'>group</span>)</i>
        </p>
        <div id = "messages"></div>

        <div>
            <form action="#" method="post" id="message-form">
                <textarea name = "message" placeholder="Type a message..." id = "message" required autofocus></textarea>
                <button id="sendButton" type = "submit" name="submit">
                    <img id="sendImg" src="img/send-icon.png">
                </button>
            </form>
        </div>


    </div>

</div>

<script type="text/javascript" src="scripts/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="scripts/js/auto-chat.js"></script>
<script type="text/javascript" src="scripts/js/send.js"></script>

<script type="text/javascript">

    function highlight(item){
        var classList = document.getElementsByClassName('highlight');
        for(i = 0; i < classList.length; i++){
            classList[i].classList.remove('highlight');
        }
        item.classList.add('highlight');
    }

    //Hide settings when clicked away
    $(document).ready(function() {
        $('#settings-button').click(function() {
            $('#settings-content').slideToggle("medium");
        });
    });


    // Script to change color to active element
    function messageLogoChange(item) {
        document.getElementById('messageLogo').innerHTML = item.getElementsByClassName('user-details')[0].innerHTML;
    }

    //Script to send message when enter is clicked
    $(document).ready(function(){
        $('#message').keypress(function(e){
            if(e.which === 13 && !e.shiftKey){
                // submit via ajax or
                $('#message-form').submit();
            }
        });
    });
</script>




</body>
</html>