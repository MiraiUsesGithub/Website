<?php
    session_start();
?>

<?php
    $dbServername = "localhost";
    $dbUsername = "mirai";
    $dbPassword = "";
    $dbName = "chat";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Imposter Chat</title>
        
        <link rel="stylesheet" href="chat/style.php"/>
        <link rel="icon" type="image/png" href="photos/ducksong.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>

        <audio controls id="audioone">
                <source src="chat/pen.mp3" type="audio/mpeg">
        </audio>

        <script>
            $(document).ready(function(){
                setInterval(function(){
                    $("#Messages").load("chat/load-messages.php");
                }, 1000);
            });
        </script>
        
    </head>

    <body>
    
    <pre id="website">Imposter Chat</pre><pre id="creds"> by Justin Bongcaron</pre>

    <br>

    <div id='posing'>
        <?php include('chat/posing.php') ?>
    </div>
    
    <form id="submitname" autocomplete="off">
        <input type='text' id='name' name='name' placeholder='Change Name' size='30'>
        <button type='submit' name='submitname'>Change</button>
    </form>

    <br>

    <script>
        $("#submitname").on("submit", function (e) {
            var name = document.getElementById("name").value;
            Cookies.set('user', name, {expires:1});
            var haspfp = Cookies.get('haspfp');
            if(haspfp != 'true'){
                var randomnumber = Math.floor(Math.random() * 20);
                Cookies.set('pfp', randomnumber, {expires:1});
                Cookies.set('haspfp', true, {expires:1});
            }
            document.getElementById("name").value = "";
            $("#posing").load("posing.php");
            e.preventDefault();
        });
    </script>
    
    <form id="submitmessage" autocomplete="off">
        <input type="text" id="typemessagehere" name='message' placeholder="Send Message" size='30'>
        <button type="submit" name="submit">Send</button>
    </form>
            
    <script>
    $("#submitmessage").on("submit", function (e) {
        var dataString = $(this).serialize();
        $.ajax({
            type: "POST",
            url: "chat/sendmessage.inc.php",
            data: dataString,
        });
        document.getElementById("typemessagehere").value = "";
        e.preventDefault();
    });
    </script>

    <br>
    
    <div id = "Messages"> 
        
        <?php include('load-messages.php') ?>
    <div>
    </body>
    <script src="canvas.js"></script>
</html>
