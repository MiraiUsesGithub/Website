<?php
    $name = $_POST['name'];
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
    echo "function buttonpressone(){
        Cookies.set('user', $name, {expires:1});
        var haspfp = Cookies.get('haspfp');
        if(haspfp != 'true'){
            var randomnumber = Math.floor(Math.random() * 20);
            Cookies.set('pfp', randomnumber, {expires:1});
            Cookies.set('haspfp', true, {expires:1});
        }
    }
    </script>";
?>