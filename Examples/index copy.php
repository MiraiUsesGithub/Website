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
        //<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css"/>
    </head>

    <body>

        <h1> Anonymous Chat </h1>

        <meta http-equiv="refresh" content="10" >

        <script>
            $(document).ready(function(){
                    $("button").click(function{
                        $("#Messages").load("load-comments.php", {

                        });
                    });
            });
        </script>


        <form action="chat/signup.inc.php" method="post">
            <input type="text" name='message' placeholder="Insert Message">
            <button type="submit" name="submit">Send</button>
        </form>

        <div id = "Messages"> 
        <?php
            $sql = "SELECT * FROM talk ORDER by id DESC;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($resultCheck > 0){
                while ($row = mysqli_fetch_assoc($result)){
                echo '[';
                echo $row['dt'];
                echo '] ';
                //echo $row['id'];
                //echo ' ';
                echo $row['words']. "<br>";
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
            $deletionnumber = $maxnumber - 200;
            if($maxnumber > 100){
                for($deletevalue=0;$deletevalue<$deletionnumber; $deletevalue++){
                    $sqlfour = "DELETE FROM talk WHERE id = $deletevalue;";
                    mysqli_query($conn, $sqlfour);
                }
            }
        ?>
        <div>
    </body>
</html>