<?php
session_start();
include("header.php");

if(isset($_POST['login'])){
    if(isset($_SESSION['uid'])){
        echo "You are already logged in!";
    }else{
        $username = protect($_POST['username']);
        $password = protect($_POST['password']);
        
        $login_check = mysql_query("SELECT `id` FROM `user` WHERE `username`='$username' AND `password`='".md5($password)."'") or die(mysql_error());
        if(mysql_num_rows($login_check) == 0){
            echo "Invalid Username/Password Combination!";
        }else{
            $get_id = mysql_fetch_assoc($login_check);
            $_SESSION['uid'] = $get_id['id'];
            header("Location: main.php");
        }
    }
}else{
    echo "You have visited this page incorrectly!";
}



include("footer.php");
?>
