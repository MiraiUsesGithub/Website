<?php
    $dbServername = "localhost";
    $dbUsername = "mirai";
    $dbPassword = "";
    $dbName = "chat";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    $message = $_POST['message'];
    $user = $_COOKIE['user'];
    $pfp = $_COOKIE['pfp'];
    
    if (strlen($user) < 1){
        $user = 'Anonymous';
    }

    if($message != ''){
        $sql = "INSERT INTO talk (words, user, pfp) VALUES ('$message', '$user', '$pfp');";
        mysqli_query($conn, $sql);
        header("Location: ../index.php?message=sent");
    }
    else{
        header("Location: ../index.php?message=not_sent");
    }
?>