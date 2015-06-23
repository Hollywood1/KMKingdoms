<?php
session_start();
include("header.php");
if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}else{
    if(isset($_POST['gold'])){
<<<<<<< HEAD:battle.php
		$health = $stats['health'];
=======
    	$health = $stats['health'];
>>>>>>> origin/pr/4:newcode/battle.php
        $turns = protect($_POST['turns']);
        $id = protect($_POST['id']);
        $user_check = mysql_query("SELECT * FROM `stats` WHERE `id`='".$id."'") or die(mysql_error());
        if(mysql_num_rows($user_check) == 0){
            output("There is no user with that ID!");
        }elseif($turns < 1 || $turns > 10){
            output("You must attack with 1-10 turns!");
        }elseif($turns > $stats['turns']){
            output("You do not have enough turns!");
<<<<<<< HEAD:battle.php
		}elseif($health < 10){
=======
        }elseif($health < 10){
>>>>>>> origin/pr/4:newcode/battle.php
        	echo "Your health is too low to mount an assault!";
        }elseif($id == $_SESSION['uid']){
            output("You cannot attack yourself!");
        }else{
            $enemy_stats = mysql_fetch_assoc($user_check);
			$elosehp = ($enemy_stats['health']-2);
			$losehpwin = ($health-1);
			$losehplose =($health-3);
			$losehpdecim =($health-5); 
            $attack_effect = $turns * 0.1 * $stats['attack'];
            $defense_effect = $enemy_stats['defense'];
            
            echo "You send your warriors into battle!<br><br>";
            echo "Your warriors dealt " . number_format($attack_effect) . " damage!<br>";
            echo "The enemy's defenders dealt " . number_format($defense_effect) . " damage!<br><br>";
            if($attack_effect > $defense_effect){
                $ratio = ($attack_effect - $defense_effect)/$attack_effect * $turns;
                $ratio = min($ratio,1);
                $gold_stolen = floor($ratio * $enemy_stats['gold']);
                echo "You won the battle! You stole " . $gold_stolen . " gold!";
                $battle1 = mysql_query("UPDATE `stats` SET `gold`=`gold`-'".$gold_stolen."' WHERE `id`='".$id."'") or die(mysql_error());
                $battle2 = mysql_query("UPDATE `stats` SET `gold`=`gold`+'".$gold_stolen."',`turns`=`turns`-'".$turns."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
                $battle3 = mysql_query("INSERT INTO `logs` (`attacker`,`defender`,`attacker_damage`,`defender_damage`,`gold`,`food`,`time`) 
<<<<<<< HEAD:battle.php
                                        VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defense_effect."','".$gold_stolen."','0','".time()."')") or die(mysql_error());									
				$losehp1 = mysql_query("UPDATE `stats` SET `health`= `health`-1 WHERE `id`='".$id."'") or die(mysql_error());
=======
                                        VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defense_effect."','".$gold_stolen."','0','".time()."')") or die(mysql_error());
				$losehp1 = mysql_query("UPDATE `stats` SET `health`= `".$selflosthp."' WHERE `id`='".$id."'") or die(mysql_error());
				$losehpenemy = mysql_query("UPDATE `stats` SET `health`= '".$elosthp."' WHERE `id`='".$enemy_stats['id']."'") or die(mysql_error());
>>>>>>> origin/pr/4:newcode/battle.php
                $stats['gold'] += $gold_stolen;
                $stats['turns'] -= $turns;
            }elseif( floor($defense_effect /3) > ($defense_effect-$attack_effect) ) {
            	$warriordecimation = floor($_POST['warrior']*0.02);
            	echo "You have been decimated! Some troops desert due to low morale!";
				$battle4 = mysql_query("UPDATE `unit` SET `warrior`=`warrior`-'".$warriordecimation."' WHERE `id`='".$id."'") or die(mysql_error());
<<<<<<< HEAD:battle.php
				$losehp2 = mysql_query("UPDATE `stats` SET `health`= `health`-5 WHERE `id`='".$id."'") or die(mysql_error());
=======
				$losehp2 = mysql_query("UPDATE `stats` SET `health`= `".$losehpdecim."' WHERE `id`='".$id."'") or die(mysql_error());
>>>>>>> origin/pr/4:newcode/battle.php
			}else{
                echo "You lost the battle!";
				$losehp3 = mysql_query("UPDATE `stats` SET `health`= `".$losehplose."' WHERE `id`='".$id."'") or die(mysql_error());
            }
        }
    }elseif(isset($_POST['food'])){
        $turns = protect($_POST['turns']);
        $id = protect($_POST['id']);
        $user_check = mysql_query("SELECT * FROM `stats` WHERE `id`='".$id."'") or die(mysql_error());
        if(mysql_num_rows($user_check) == 0){
            output("There is no user with that ID!");
        }elseif($turns < 1 || $turns > 10){
            output("You must attack with 1-10 turns!");
        }elseif($turns > $stats['turns']){
            output("You do not have enough turns!");
        }elseif($id == $_SESSION['uid']){
            output("You cannot attack yourself!");
        }else{
            $enemy_stats = mysql_fetch_assoc($user_check);
			$elosehp = ($enemy_stats['health']-2);
			$losehpwin = ($health-1);
			$losehplose =($health-3);
			$losehpdecim =($health-5); 
            $attack_effect = $turns * 0.1 * $stats['attack'];
            $defense_effect = $enemy_stats['defense'];
            
            echo "You send your warriors into battle!<br><br>";
            echo "Your warriors dealt " . number_format($attack_effect) . " damage!<br>";
            echo "The enemy's defenders dealt " . number_format($defense_effect) . " damage!<br><br>";
            if($attack_effect > $defense_effect){
                $ratio = ($attack_effect - $defense_effect)/$attack_effect * $turns;
                $ratio = min($ratio,1);
                $gold_stolen = floor($ratio * $enemy_stats['gold']);
                echo "You won the battle! You stole " . $gold_stolen . " gold!";
                $battle1 = mysql_query("UPDATE `stats` SET `gold`=`gold`-'".$gold_stolen."' WHERE `id`='".$id."'") or die(mysql_error());
                $battle2 = mysql_query("UPDATE `stats` SET `gold`=`gold`+'".$gold_stolen."',`turns`=`turns`-'".$turns."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
                $battle3 = mysql_query("INSERT INTO `logs` (`attacker`,`defender`,`attacker_damage`,`defender_damage`,`gold`,`food`,`time`) 
<<<<<<< HEAD:battle.php
                                        VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defense_effect."','0','".$food_stolen."','".time()."')") or die(mysql_error());
                $losehp1 = mysql_query("UPDATE `stats` SET `health`= `health`-1 WHERE `id`='".$id."'") or die(mysql_error());
				$stats['food'] += $food_stolen;
=======
                                        VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defense_effect."','".$gold_stolen."','0','".time()."')") or die(mysql_error());
				$losehp1 = mysql_query("UPDATE `stats` SET `health`= '".$selflosthp."' WHERE `id`='".$id."'") or die(mysql_error());
				$losehpenemy = mysql_query("UPDATE `stats` SET `health`= '".$elosthp."' WHERE `id`='".$enemy_stats['id']."'") or die(mysql_error());
                $stats['gold'] += $gold_stolen;
>>>>>>> origin/pr/4:newcode/battle.php
                $stats['turns'] -= $turns;
            }elseif( floor($defense_effect /3) > ($defense_effect-$attack_effect) ) {
            	$warriordecimation = floor($_POST['warrior']*0.02);
            	echo "You have been decimated! Some troops desert due to low morale!";
				$battle4 = mysql_query("UPDATE `unit` SET `warrior`=`warrior`-'".$warriordecimation."' WHERE `id`='".$id."'") or die(mysql_error());
<<<<<<< HEAD:battle.php
				$losehp2 = mysql_query("UPDATE `stats` SET `health`= `health`-5 WHERE `id`='".$id."'") or die(mysql_error());
=======
				$losehp2 = mysql_query("UPDATE `stats` SET `health`= `".$losehpdecim."' WHERE `id`='".$id."'") or die(mysql_error());
>>>>>>> origin/pr/4:newcode/battle.php
			}else{
                echo "You lost the battle!";
				$losehp3 = mysql_query("UPDATE `stats` SET `health`= `".$losehplose."' WHERE `id`='".$id."'") or die(mysql_error());
            }
}
	}else{
       output("You have visited this page incorrectly!");
    }
include("footer.php");
?>
