<!DOCTYPE html>
<html>
<head>
    <title> </title>
</head>
<body>
<meta http-equiv="refresh" content="10" >
<form action="chat/signup.inc.php" method="post">
    <input type="text" name='message' placeholder="Insert Message">
    <button type="submit" name="submit">Send</button>
</form>
<?php
    $dbServername = "localhost";
    $dbUsername = "mirai";
    $dbPassword = "gamerdude617";
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
            echo $row['words']. "<br>";
        }
    }
    $sqlthree = "SELECT MAX(ID) FROM talk";
    $max = mysqli_query($connm,$sqlthree);
    echo $max;
    number_format($max);

    $diff = $max - 50;
    for($deletevalue=0;$deletevalue<$diff; $deletevalue++){
        $sqltwo = "DELETE FROM `talk` WHERE `id` = $deletevalue;";
        mysqli_query($conn, $sqltwo);

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