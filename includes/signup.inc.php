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
    $dbPassword = " ";
    $dbName = "loginsystem";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_password) VALUES ('$first', '$last', '$email', '$uid', '$password');";
    mysqli_query($conn, $sql);

    header("Location: ../index.php?signup=success");
?>