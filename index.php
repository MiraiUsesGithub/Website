<!DOCTYPE html>
<html>
<head>
    <title> Anonymous Chat</title>
    <link rel="stylesheet" href="chat/style.css"/>
</head>
<body>
<h1> Anonymous Chat </h1>
<meta http-equiv="refresh" content="10" >
<form action="chat/signup.inc.php" method="post">
    <input type="text" name='message' placeholder="Insert Message">
    <button type="submit" name="submit">Send</button>
</form>
<?php
    $dbServername = "localhost";
    $dbUsername = "mirai";
    $dbPassword = "";
    $dbName = "chat";
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    $sql = "SELECT * FROM talk ORDER by id DESC;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if ($resultCheck > 0){
        while ($row = mysqli_fetch_assoc($result)){
            $sample = $row['dt'];
            echo substr($sample, -8);
            echo ' ';
            echo $row['id'];
            echo ' ';
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


<?php

$random = rand(1,7);
if ($random == 1){
    echo "<style>body{background-color:red}</style>";
}
if($random == 2){
    echo "<style>body{background-color:green}</style>";
}
if ($random == 3){
    echo "<style>body{background-color:blue}</style>";
}
if($random == 4){
    echo "<style>body{background-color:purple}</style>";
}
if ($random == 5){
    echo "<style>body{background-color:turquoise}</style>";
}
if($random == 6){
    echo "<style>body{background-color:orange}</style>";
}
if ($random == 7){
    echo "<style>body{background-color:yellow}</style>";
}
?>

</body>
</html>