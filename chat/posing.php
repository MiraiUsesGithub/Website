<?php
    $user = $_COOKIE['user'];
    if ($user != ''){
        echo "You are posing as ";
        echo $user;
    }
    else{
        echo "You are posing as ";
        echo "Anonymous";
    }
?>