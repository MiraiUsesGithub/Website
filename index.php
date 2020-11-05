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
        <title> Anonymous Chat</title>
        
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" type="image/png" href="ducksong.png" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
        <script>
            $(document).ready(function(){
                setInterval(function(){
                    $("#Messages").load("load-messages.php");
                    refresh();
                }, 1000);
            });
        </script>
        
    </head>

    <body>

        <h1> Anonymous Chat </h1>
        
        
        <form>
            <input type="text" id='name' placeholder="Select Name (Enter Once)">
            <button type="submit" name="submitname" onclick="buttonpressone()">Select</button>
        </form>

        <script>
            function buttonpressone(){
                var name = document.getElementById("name").value;
                Cookies.set('user', name, {expires:1});
                }
        </script>
        
        <form action="chat/sendmessage.inc.php" method="post">
            <input type="text" name='message' placeholder="Insert Message">
            <button type="submit" name="submit">Send</button>
        </form>

        <br>

        <div id = "Messages"> 
        <?php
            $sql = "SELECT * FROM talk ORDER by id DESC;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0){
                while ($row = mysqli_fetch_assoc($result)){
                echo '<div id = "username">';
                echo $row['user'];
                echo '</div>';
                echo ' ';
                echo '<div id = "date">';
                echo '[';
                echo $row['dt'];
                echo '] ';
                echo '</div>';
                echo '<div id = "words">';
                echo $row['words']."<br>"."<br>";
                echo '</div>';
                }
            }
            $sqltwo = "SELECT MAX(id) FROM talk;";
            $resulttwo = mysqli_query($conn, $sqltwo);
            $resultChecktwo = mysqli_num_rows($resulttwo);
            if ($resultChecktwo > 0){
                while ($rowtwo = mysqli_fetch_assoc($resulttwo)){
                    $maxnumber = (int)$rowtwo['MAX(id)'];
                }
            }
            $deletionnumber = $maxnumber - 20;
            if($maxnumber > 20){
                for($deletevalue=0;$deletevalue<$deletionnumber; $deletevalue++){
                    $sqlfour = "DELETE FROM talk WHERE id = $deletevalue;";
                    mysqli_query($conn, $sqlfour);
                }
            }
        ?>
        <div>
    </body>
</html>