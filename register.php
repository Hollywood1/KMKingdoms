<?php
session_start();
include("header.php");
?>
Register
<br /><br />
<?php
if(isset($_POST['register'])){
    $username = protect($_POST['username']);
    $password = protect($_POST['password']);
    $email = protect($_POST['email']);
    
    if($username == "" || $password == "" || $email == ""){
        echo "Please supply all fields!";
    }elseif(strlen($username) > 20){
        echo "Username must be less than 20 characters!";
    }elseif(strlen($email) > 100){
        echo "E-mail must be less than 100 characters!";
    }else{
        $register1 = mysql_query("SELECT `id` FROM `user` WHERE `username`='$username'") or die(mysql_error());
        $register2 = mysql_query("SELECT `id` FROM `user` WHERE `email`='$email'") or die(mysql_error());
        if(mysql_num_rows($register1) > 0){
            echo "That username is already in use!";
        }elseif(mysql_num_rows($register2) > 0){
            echo "That e-mail address is already in use!";
        }else{
            $ins1 = mysql_query("INSERT INTO `stats` (`health`,`gold`,`attack`,`defense`,`food`,`income`,`farming`,`mana`,`turns`) VALUES (100,100,10,10,100,10,11,0,100)") or die(mysql_error());
            $ins1 = mysql_query("INSERT INTO `stats` (`health`,`gold`,`mana`,`attack`,`defense`,`food`,`income`,`farming`,`manapow`,`turns`) VALUES (100,100,100,10,10,100,10,11,0,100)") or die(mysql_error());
            $ins2 = mysql_query("INSERT INTO `unit` (`worker`,`farmer`,`warrior`,`defender`,`wizard`) VALUES (5,5,0,0,0)") or die(mysql_error());
            $ins3 = mysql_query("INSERT INTO `user` (`username`,`password`,`email`) VALUES ('$username','".md5($password)."','$email')") or die(mysql_error());
            $ins4 = mysql_query("INSERT INTO `weapon` (`sword`,`shield`,`tome`) VALUES (0,0,0)") or die(mysql_error());
            $ins5 = mysql_query("INSERT INTO `ranking` (`attack`,`defense`,`overall`) VALUES(0,0,0)") or die(mysql_error());
            echo "You have registered!";
        }
    }
}
?>
<br /><br />
<form action="register.php" method="POST">
Username: <input type="text" name="username"/><br />
Password: <input type="password" name="password"/><br />
E-mail: <input type="text" name="email"/><br />
<input type="submit" name="register" value="Register"/>
</form>
<?php
include("footer.php");
?>
