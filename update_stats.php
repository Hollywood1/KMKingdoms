<?php

$health = protect($_POST['health']);
$updatehp = round($health + 1 + floor(.001* $builing['tower']));
if ($updatehp > 100) {
	$updatehp = 100;
}

if ($user['align'] = "gold") {
	$income = round( ($health*0.01) * ((2 * $unit['merchant'])+(5 * $building['taxhouse'])))*1.1;
}else{
	$income = round( ($health*0.01) * ((2 * $unit['merchant'])+(5 * $building['taxhouse'])) );
}

if ($user['align'] = "nature") {
	$farming = round( ($health*0.01) * ( 5 * pow($unit['farmer'],0.5) * (5 * $building['granary']) ) )*1.1 ;
}
else {
	$farming = round( ($health*0.01) * ( 5 * pow($unit['farmer'],0.5) * (5 * $building['granary']) ) ) ;
}

$num1 = min($weapon['sword'],$unit['warrior']);
if ($user['align'] = blood) {
	if($num1 == $weapon['sword']){
    $attack = (10 * $weapon['sword']) + ($unit['warrior'] - $weapon['sword']) + (15 * $building['seige']) *1.075;
}else{
    $attack = (10 * $unit['warrior'] + (15 * $building['seige']))*1.075;
}
} else {
	if($num1 == $weapon['sword']){
    	$attack = (10 * $weapon['sword']) + ($unit['warrior'] - $weapon['sword']) + (15 * $building['seige']);
	}else{
    	$attack = (10 * $unit['warrior'] + (15 * $building['seige']));
}

$num2 = min($weapon['shield'],$unit['defender']);
if ($user['align'] = "order") {
	if($num2 == $weapon['shield']){
    	$defense = (10 * $weapon['shield']) + ($unit['defender'] - $weapon['shield']) + (15 * $building['tower'])*1.075;
	}else{
    	$defense = (10 * $unit['defender']) + (15 * $building['tower'])*1.075;
}
} else {
	if($num2 == $weapon['shield']){
    $defense = (10 * $weapon['shield']) + ($unit['defender'] - $weapon['shield']) + (15 * $building['tower']);
	}else{
    $defense = (10 * $unit['defender']) + (15 * $building['tower']);
}
}

$num3 = min($weapon['tome'],$unit['wizard']);

if ($user['align']= "magic") {
	if($num3 == $weapon['tome']){
		$manapow = (50 * $weapon['tome']) + (10 *($unit['wizard'] - $weapon['tome']) + (100 * $building['wizguild']))*1.055;
	}else{
		$manapow = (10 * $unit['wizard']) + (100 * $building['wizguild'])*1.055;
}	
} else {
	if($num3 == $weapon['tome']){
		$manapow = (50 * $weapon['tome']) + (10 *($unit['wizard'] - $weapon['tome']) + (100 * $building['wizguild']));
	}else{
		$manapow = (10 * $unit['wizard']) + (100 * $building['wizguild']);
}


$update_stats = mysql_query("UPDATE `stats` SET 
                            `income`='".$income."',`farming`='".$farming."',
                            `health`='".$updatehp."',`attack`='".$attack."',`defense`='".$defense."',
                            `mana`='".$mana."'
                            WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());

?>
