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
        
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" type="image/png" href="ducksong.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
        <audio id="audiotwo" controls>
            <source src="penguin.mp3" type="audio/mp3">
        </audio>
        <audio id="audiotwo" controls>
            <source src="liyue.mp3" type="audio/mp3">
        </audio>
        <script>
            $(document).ready(function(){
                setInterval(function(){
                    $("#Messages").load("load-messages.php");
                    refresh();
                }, 1000);
            });
        </script>
        
    </head>

    <body id='bowday'>

    <pre id="website">Imposter Chat</pre><pre id="creds"> by Justin Bongcaron</pre>
        
    <form autocomplete="off">
    <?php
        $user = $_COOKIE['user'];
        if($user != ''){
            echo "<input type='text' id='name' placeholder='";
            echo $user;
            echo " (Change Name)'size='30'>";
            }
        else{
            echo "<input type='text' id='name' placeholder='Anonymous (Change Name)' size='30'>";
            }
        echo "<button type='submit' name='submitname' onclick='buttonpressone()'>Change</button>";
    ?>
    </form>

    <script>
        function buttonpressone(){
        var name = document.getElementById("name").value;
        Cookies.set('user', name, {expires:1});
        var haspfp = Cookies.get('haspfp');
        if(haspfp != 'true'){
            var randomnumber = Math.floor(Math.random() * 20);
            Cookies.set('pfp', randomnumber, {expires:1});
            Cookies.set('haspfp', true, {expires:1});
            }
        }
    </script>
    
    <form autocomplete="off" action="chat/sendmessage.inc.php" method="post">
        <input type="text" name='message' placeholder="Insert Message" size='30'>
        <button type="submit" name="submit">Send</button>
    </form>
            
    <br>

    <div id = "Messages"> 
        <?php include('load-messages.php') ?>
    <div>
    </body>
</html>
