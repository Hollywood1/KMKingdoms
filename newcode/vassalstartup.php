<?php
    session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}else{
	$id=protect($_POST['id']);
	$user_check = mysql_query("SELECT * FROM `stats` WHERE `id`='".$id."'") or die(mysql_error());
	$king = mysql_fetch_assoc($user_check);
    if ($stats['kingid'] != 0) {
    	output("You are already a vassal of '".$king_user['username']."'!");
    }elseif($id == $_SESSION['uid']){
        output("You cannot Request to Vassalize yourself!");
	}else {
		
		if ($vassalrequest = 1) {
			mysql_query("UPDATE `stats` SET `kingid`='".$king_user['id']."' WHERE `id`='".$id."'") or die(mysql_error());
			output("Your Vassalization Request was Accepted!");
		} elseif ($vassalrequrest = 2) {
			output("Your Vassalization Request was denied!");
		}else{
			output("Your Vassalization Request is Pending...");
		}}
		
    
    
    
	}
include("footer.php");

?>
