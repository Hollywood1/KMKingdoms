<?php

$health = protect($_POST['health']);
$updatehp = $health + 1;
<<<<<<< HEAD:update_stats.php

$income = ((2 * $unit['worker']) + ( ($health*0.01) * (2 * $unit['worker'])));

$farming = (5 * pow($unit['farmer'],0.5)) + (($health*0.01) * (5 * pow($unit['farmer'],0.5))) ;
=======
if ($updatehp > 100) {
	$updatehp = 100;
}

$income = round( ($health*0.01) * (2 * $unit['worker']) );

$farming = round( ($health*0.01) * ( 5 * pow($unit['farmer'],0.5) ) ) ;
>>>>>>> origin/pr/4:newcode/update_stats.php

$num1 = min($weapon['sword'],$unit['warrior']);

if($num1 == $weapon['sword']){
    $attack = (10 * $weapon['sword']) + ($unit['warrior'] - $weapon['sword']);
}else{
    $attack = (10 * $unit['warrior']);
}

$num2 = min($weapon['shield'],$unit['defender']);

if($num2 == $weapon['shield']){
    $defense = (10 * $weapon['shield']) + ($unit['defender'] - $weapon['shield']);
}else{
    $defense = (10 * $unit['defender']);
}

$num3 = min($weapon['tome'],$unit['wizard']);

if($num3 == $weapon['tome']){
	$manapow = (50 * $weapon['tome']) + (10 *($unit['wizard'] - $weapon['tome']));
}else{
	$manapow = (10 * $unit['wizard']);
}
$update_stats = mysql_query("UPDATE `stats` SET 
<<<<<<< HEAD:update_stats.php
                            `income`='".$income."',`farming`='".$farming."',
                            `health`='".$updatehp."',`attack`='".$attack."',`defense`='".$defense."',
                            `mana`='".$mana."'
=======
                            `health`='".$updatehp."', `income`='".$income."', `farming`='".$farming."',
                            `attack`='".$attack."',`defense`='".$defense."',
                            `manapow`='".$manapow."'
>>>>>>> origin/pr/4:newcode/update_stats.php
                            WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());

?>
