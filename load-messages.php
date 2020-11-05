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
            echo '<div id = "pfp">';
            $pfp = $row['pfp'];
            if ($pfp != ''){
                echo "<img src='photos/BakedFriedBreadedShredded";
                echo $pfp;
                echo ".png'>";
            }
            else{
                echo "<img src='photos/BakedFriedBreadedShredded0.png'>";
            }
            echo '</div>';
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
    $sqltwo = "SELECT MAX(id) FROM talk;";
    $resulttwo = mysqli_query($conn, $sqltwo);
    $resultChecktwo = mysqli_num_rows($resulttwo);
    if ($resultChecktwo > 0){
        while ($rowtwo = mysqli_fetch_assoc($resulttwo)){
            $maxnumber = (int)$rowtwo['MAX(id)'];
        }
    }
    $deletionnumber = $maxnumber - 200;
    if($maxnumber > 200){
        for($deletevalue=$deleteionnumber-50;$deletevalue<$deletionnumber; $deletevalue++){
            $sqlfour = "DELETE FROM talk WHERE id = $deletevalue;";
            mysqli_query($conn, $sqlfour);
        }
    }
?>