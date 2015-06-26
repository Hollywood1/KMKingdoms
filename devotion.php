<?php
   session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}else{
	if(isset($_POST['bolsterfaith'])){
	$leveldev= protect($_POST['leveldev']);
	$devlevel= $dev['devlevel'];
	$curdev= $dev['curdev'];
	$devlevelreq= ($divlevel*500)-$curdiv;
	$devgoldneeded= ($divlevel*100)+ceil(log($curdiv));
		if ($leveldiv < 0) {
			output("What are you trying to do? Anger the Gods?");
		}elseif ($stats['gold'] < $divgoldneeded){
			output("You do not have enough gold to bolster your devotion.");
		}elseif ($devlevelreq < $leveldev) {
			output("You have bolstered your faith too strong, lower it to the amount left until you level your devotion!");
		}else{
			if ($devlevelreq = 0) {
				$dev['devlevel'] += 1;
				$update_devlevel = mysql_query("UPDATE `dev` SET 
                                        `devlevel`='".$dev['devlevel']."',
                                        WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error()); }
			$dev['curdev'] += $leveldev;
			$update_dev = mysql_query("UPDATE `dev` SET 
                                        `curdev`='".$dev['curdev']."',
                                        WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
            $stats['gold'] -= $devgoldneeded;
            $update_devgold = mysql_query("UPDATE `stats` SET `gold`='".$stats['gold']."' 
                                        WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
            include("update_stats.php");
            output("You have furthered your faith.");
        }
	
	
	include("footer.php");	
?>
<center><h2>Devotion</h2></center>
    <br />
    Here is where you further your faith which provides a variety of benefits depending on what alignment you chose.
    <br /><br />
 <form action="devotion.php" method="number">
    <table cellpadding="5" cellspacing="5">
        <tr>
            <td><b>Current Devotion Level</b></td>
            <td><b>Required Devotion Level</b></td>
            <td><b>Cost of Raising your Devotion</b></td>
            <td><b>Bolster your Faith</b></td>
        </tr>
        <tr>
            <td><?php echo number_format($dev['curdev']); ?></td>
            <td><?php echo number_format($dev['devlevelreq']); ?></td>
            <td><?php echo number_format($devgoldneeded)?></td>
            <td><input type="number" name="leveldev" /></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><input type="submit" name="Bolster Faith" value="bolsterfaith"/></td>
        </tr>
    </table>