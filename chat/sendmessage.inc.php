<?php
session_start();
?>

<?php
    $dbServername = "localhost";
    $dbUsername = "mirai";
    $dbPassword = "";
    $dbName = "chat";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    $message = $_POST['message'];
    $user = $_COOKIE['user'];
    $pfp = $_COOKIE['pfp'];
    $spam = strpos($message, '/spam');
    $spammessage = substr("$message",6);
    
    if (strlen($user) < 1){
        $user = 'Anonymous';
    }

    if($message != ''){
        $sql = "INSERT INTO talk (words, user, pfp) VALUES ('$message', '$user', '$pfp');";
        mysqli_query($conn, $sql);
        header("Location: ../index.php?message=sent");
    }

    if($message == '/reset'){
        $sqltwo = "SELECT MAX(id) FROM talk;";
        $resulttwo = mysqli_query($conn, $sqltwo);
        $resultChecktwo = mysqli_num_rows($resulttwo);
        if ($resultChecktwo > 0){
            while ($rowtwo = mysqli_fetch_assoc($resulttwo)){
                $maxnumber = (int)$rowtwo['MAX(id)'];
            }
        }
        for($deletevalue=$maxnumber - 201; $deletevalue<$maxnumber + 1; $deletevalue++){
            $sqlfour = "DELETE FROM talk WHERE id = $deletevalue;";
            mysqli_query($conn, $sqlfour);
        }
        $sqlsix = 'ALTER TABLE talk AUTO_INCREMENT = 0;';
        mysqli_query($conn, $sqlsix);
    }
    
    //if($spam = true && $spammessage != ''){
        //for($i=0; $i<200; $i++){
            //$sqlfive = "INSERT INTO talk (words, user, pfp) VALUES ('$spammessage', '$user', '$pfp');";
            //mysqli_query($conn, $sqlfive);
        //}
    //}  
    if($message == '/kungfu'){
        $_SESSION["background"] = "kungfu";
    }
    if($message == '/mario'){
        $_SESSION["background"] = "mario";
    } 
    if($message == '/bisc'){
        $_SESSION["background"] = "bisc";
    } 
    else{
        header("Location: ../index.php?message=not_sent");
    }  
?>