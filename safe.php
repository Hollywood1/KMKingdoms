<?php

// Code-Related
$stats_get = mysql_query("SELECT * FROM `stats` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$stats = mysql_fetch_assoc($stats_get);

$unit_get = mysql_query("SELECT * FROM `unit` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$unit = mysql_fetch_assoc($unit_get);

$user_get = mysql_query("SELECT * FROM `user` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$user = mysql_fetch_assoc($user_get);

$weapon_get = mysql_query("SELECT * FROM `weapon` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$weapon = mysql_fetch_assoc($weapon_get);

$building_get = mysql_query("SELECT * FROM `building` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$building = mysql_fetch_assoc($building_get);

$dev_get = mysql_query("SELECT * FROM `dev` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$dev = mysql_fetch_assoc($dev_get);

//Devotion Related

//order
if ($user['align'] = order) {
	if ($dev['devlevel'] = 1) {
		$o1= mysql_query("UPDATE `dev` SET `aligndev`='o1' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 2) {
		$o2= mysql_query("UPDATE `dev` SET `aligndev`='o2' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 3) {
		$o3= mysql_query("UPDATE `dev` SET `aligndev`='o3' WHERE `id`='".$_SESSION['uid']."'");}
	}elseif($dev['devlevel'] = 4) {
		$o4= mysql_query("UPDATE `dev` SET `aligndev`='o4' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 5) {
		$o5= mysql_query("UPDATE `dev` SET `aligndev`='o5' WHERE `id`='".$_SESSION['uid']."'");}
//nature
elseif($user['align'] = nature) {
	if ($dev['devlevel'] = 1) {
		$n1= mysql_query("UPDATE `dev` SET `aligndev`='n1' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 2) {
		$n2= mysql_query("UPDATE `dev` SET `aligndev`='n2' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 3) {
		$n3= mysql_query("UPDATE `dev` SET `aligndev`='n3' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 4) {
		$n4= mysql_query("UPDATE `dev` SET `aligndev`='n4' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 5) {
		$n5= mysql_query("UPDATE `dev` SET `aligndev`='n5' WHERE `id`='".$_SESSION['uid']."'");}
//blood
elseif($user['align'] = blood) {
	if ($dev['devlevel'] = 1) {
		$b1= mysql_query("UPDATE `dev` SET `aligndev`='b1' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 2) {
		$b2= mysql_query("UPDATE `dev` SET `aligndev`='b2' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 3) {
		$b3= mysql_query("UPDATE `dev` SET `aligndev`='b3' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 4) {
		$b4= mysql_query("UPDATE `dev` SET `aligndev`='b4' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 5) {
		$b5= mysql_query("UPDATE `dev` SET `aligndev`='b5' WHERE `id`='".$_SESSION['uid']."'");}
//gold
elseif($user['align'] = gold) {
	if ($dev['devlevel'] = 1) {
		$g1= mysql_query("UPDATE `dev` SET `aligndev`='g1' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 2) {
		$g2= mysql_query("UPDATE `dev` SET `aligndev`='g2' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 3) {
		$g3= mysql_query("UPDATE `dev` SET `aligndev`='g3' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 4) {
		$g4= mysql_query("UPDATE `dev` SET `aligndev`='g4' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 5) {
		$g5= mysql_query("UPDATE `dev` SET `aligndev`='g5' WHERE `id`='".$_SESSION['uid']."'");}	
	}
//magic
elseif($user['align'] = magic) {
	if ($dev['devlevel'] = 1) {
		$mag1= mysql_query("UPDATE `dev` SET `aligndev`='mag1' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 2) {
		$mag2= mysql_query("UPDATE `dev` SET `aligndev`='mag2' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 3) {
		$mag3= mysql_query("UPDATE `dev` SET `aligndev`='mag3' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 4) {
		$mag4= mysql_query("UPDATE `dev` SET `aligndev`='mag4' WHERE `id`='".$_SESSION['uid']."'");
	}elseif($dev['devlevel'] = 5) {
		$mag5= mysql_query("UPDATE `dev` SET `aligndev`='mag5' WHERE `id`='".$_SESSION['uid']."'");}	
	}
?>