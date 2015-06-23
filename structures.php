<?php
session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}else{
    if(isset($_POST['build'])){
        $tower = protect($_POST['tower']);
        $seige = protect($_POST['seige equipment']);
        $wizguild = protect($_POST['taxhouse guild']);
        $granary = protect($_POST['granary']);
		$taxhouse = protect($_POST['tax house']);
        $gold_needed = (1000 * $tower) + (1000 * $seige) + (1500 * $wizguild) + (750 * $granary) + (750 * $taxhouse);
        if($tower < 0 || $seige < 0 || $wizguild < 0 || $granary < 0 || $taxhouse < 0){
            output("You must build a positive number of Structures!");
        }elseif($stats['gold'] < $gold_needed){
            output("You do not have enough gold!");
        }else{
            $building['tower'] += $tower;
            $building['seige'] += $seige;
            $building['wizguild'] += $wizguild;
            $building['granary'] += $granary;
			$building['taxhouse'] += $taxhouse;
            
            $update_building = mysql_query("UPDATE `building` SET 
                                        `tower`='".$building['tower']."',
                                        `seige`='".$building['seige']."',
                                        `wizguild`='".$building['wizguild']."',
                                        `granary`='".$building['granary']."',
                                        `taxhouse`='".$building['taxhouse']."'
                                        WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
            $stats['gold'] -= $gold_needed;
            $update_gold = mysql_query("UPDATE `stats` SET `gold`='".$stats['gold']."' 
                                        WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
            include("update_stats.php");
            output("You Structures have been built!");
        }
    }elseif(isset($_POST['destroy'])){
        $tower = protect($_POST['tower']);
        $seige = protect($_POST['seige']);
        $wizguild = protect($_POST['wizguild']);
        $granary = protect($_POST['granary']);
        $taxhouse = protect($_POST['taxhouse']);
        $gold_gained = (500 * $tower) + (500 * $seige) + (750 * $wizguild) + (400 * $granary) + (400 * $taxhouse);
        if($tower < 0 || $seige < 0 || $wizguild < 0 || $granary < 0 || $taxhouse < 0 ){
            output("You must untrain a positive number of buildings!");
        }elseif($tower > $building['tower'] || $seige > $building['seige'] || 
                $wizguild > $building['wizguild'] || $granary > $building['granary'] || $taxhouse > $building['taxhouse']){
            output("You do not have that many buildings to deconstruct!");
        }else{
            $building['tower'] -= $tower;
            $building['seige'] -= $seige;
            $building['wizguild'] -= $wizguild;
            $building['granary'] -= $granary;
            $building['taxhouse'] -= $taxhouse;
            $update_building = mysql_query("UPDATE `building` SET 
                                        `tower`='".$building['tower']."',
                                        `seige`='".$building['seige']."',
                                        `wizguild`='".$building['wizguild']."',
                                        `granary`='".$building['granary']."',
                                        `taxhouse`='".$building['taxhouse']."' 
                                        WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
            $stats['gold'] += $gold_gained;
            $update_gold = mysql_query("UPDATE `stats` SET `gold`='".$stats['gold']."' 
                                        WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
            include("update_stats.php");
            output("You have deconstructed your buildings!!");
        }
    }
    ?>
    <center><h2>Your buildings</h2></center>
    <br />
    You can Build and Deconstruct your buildings here.
    <br /><br />
    <form action="buildings.php" method="post">
    <table cellpadding="5" cellspacing="5">
        <tr>
            <td><b>Building Type</b></td>
            <td><b>Number of Buildings</b></td>
            <td><b>Building Cost</b></td>
            <td><b>Build More</b></td>
        </tr>
        <tr>
            <td>Tower</td>
            <td><?php echo number_format($building['tower']); ?></td>
            <td>1000 gold</td>
            <td><input type="text" name="tower" /></td>
        </tr>
        <tr>
            <td>Seige Equipment</td>
            <td><?php echo number_format($building['seige']); ?></td>
            <td>1000 gold</td>
            <td><input type="text" name="seige" /></td>
        </tr>
        <tr>
            <td>Wizard's Guilds</td>
            <td><?php echo number_format($building['wizguild']); ?></td>
            <td>1500 gold</td>
            <td><input type="text" name="wizguild" /></td>
        </tr>
        <tr>
            <td>Granaries</td>
            <td><?php echo number_format($building['granary']); ?></td>
            <td>750 gold</td>
            <td><input type="text" name="granary" /></td>
        </tr>
        <tr>
        	<td>Tax Houses</td>
        	<td><?php echo number_format($building['taxhouse']); ?></td>
        	<td>750 gold</td>
        	<td><input type="text" name="taxhouse" /></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="submit" name="build" value="Build"/></td>
        </tr>
    </table>
    </form>
    <hr />
        <form action="buildings.php" method="post">
    <table cellpadding="5" cellspacing="5">
        <tr>
            <td><b>Building Type</b></td>
            <td><b>Number of Buildings</b></td>
            <td><b>Salvaging Profit</b></td>
            <td><b>Deconstruct Buildings</b></td>
        </tr>
        <tr>
            <td>Tower</td>
            <td><?php echo number_format($building['tower']); ?></td>
            <td>500 gold</td>
            <td><input type="text" name="tower" /></td>
        </tr>
        <tr>
            <td>Seige Equipment</td>
            <td><?php echo number_format($building['seige']); ?></td>
            <td>500 gold</td>
            <td><input type="text" name="seige" /></td>
        </tr>
        <tr>
            <td>Wizard Guilds</td>
            <td><?php echo number_format($building['wizguild']); ?></td>
            <td>750 gold</td>
            <td><input type="text" name="wizguild" /></td>
        </tr>
        <tr>
            <td>Granaries</td>
            <td><?php echo number_format($building['granary']); ?></td>
            <td>400 gold</td>
            <td><input type="text" name="granary" /></td>
        </tr>
              <tr>
        	<td>Tax Houses</td>
        	<td><?php echo number_format($building['taxhouse']); ?></td>
        	<td>400 gold</td>
        	<td><input type="text" name="taxhouse" /></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="submit" name="destroy" value="Destroy"/></td>
        </tr>
    </table>
    </form>
    <?php
}
include("footer.php");
?>