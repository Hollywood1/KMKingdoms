<?php

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

$div_get = mysql_query("SELECT * FROM `div` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$div = mysql_fetch_assoc($stats_get);

?>
