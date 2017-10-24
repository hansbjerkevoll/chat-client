$(document).ready(function () {
    var interval = setInterval(function () {
        
        //Get number of messages currently displayed
        var oldMsgNum = document.getElementsByClassName('message').length;

        //Fetch messages
        $.ajax({
            url: 'scripts/php/chat.php',
            success: function (data) {
                $('#messages').html(data);
            }
        });

        //Get number of messages on the server
        $.ajax({
            url: 'scripts/php/getMsgNum.php',
            success: function (data) {
                var newMsgNum = data.trim();
                if(newMsgNum > oldMsgNum){
                    var messages = document.getElementById('messages');
                    messages.scrollTop = messages.scrollHeight;
                }
            }
        });
    }, 250)
});




