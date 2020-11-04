<?php
    //$sql = "SELECT * FROM users;";
    //$result = mysqli_query($conn, $sql);
    //$resultCheck = mysqli_num_rows($result);
    //if($resultCheck > 0){
        //while($row = mysqli_fetch_assoc($result)){
            //echo $row['user_first' . "<br>"];
        //}
    //}
    $dbServername = "localhost";
    $dbUsername = "mirai";
    $dbPassword = "";
    $dbName = "chat";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    $message = $_POST['message'];

    $sql = "INSERT INTO talk (words) VALUES ('$message');";
    mysqli_query($conn, $sql);

    header("Location: ../index.php?message=sent");
?>