<?php
session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}else{
    ?>
    <center><h2>House <?php echo $user['house']; ?></h2></center>
    <br />
    <center><h3><?php if ($user['align']= "order") {
    	if ($dev['devlevel'] = 1) { echo "Captain of The Watch";	} 
		elseif ($dev['devlevel'] = 2) { echo "Acolyte of Order";}
		elseif ($dev['devlevel'] = 3) { echo "Saint of Order";}
		elseif ($dev['devlevel'] = 4) { echo "The Pious";}
		elseif ($dev['devlevel'] = 5) { echo "Transcendent";}
}elseif ($user['align']= "nature") {
		if($dev['devlevel'] = 1) { echo "The Sapling";	} 
		elseif ($dev['devlevel'] = 2) { echo "Acolyte of Nature";}
		elseif ($dev['devlevel'] = 3) { echo "Finds Solace in Nature";}
		elseif ($dev['devlevel'] = 4) { echo "One with Nature";}
		elseif ($dev['devlevel'] = 5) { echo "Bends Nature to Their Whim";}
}elseif ($user['align']= "blood") {
	if($dev['devlevel'] = 1) { echo "Blood Donator";	} 
		elseif ($dev['devlevel'] = 2) { echo "Blood-Thirsty";}
		elseif ($dev['devlevel'] = 3) { echo "Saint of The Sanguine";}
		elseif ($dev['devlevel'] = 4) { echo "Insatiable Blood-Thirst";}
		elseif ($dev['devlevel'] = 5) { echo "Destroyer of Kingdoms";} 
}elseif ($user['align']= "gold") {
	if($dev['devlevel'] = 1) { echo "Merchant";	} 
		elseif ($dev['devlevel'] = 2) { echo "Member of The Guild";}
		elseif ($dev['devlevel'] = 3) { echo "Journeyman of The Guild";}
		elseif ($dev['devlevel'] = 4) { echo "Monopolizer";}
		elseif ($dev['devlevel'] = 5) { echo "Bathes in Gold";} 
}elseif ($user['align']= "magic") {
	if($dev['devlevel'] = 1) { echo "Parlour Trickster";	} 
		elseif ($dev['devlevel'] = 2) { echo "Student of The Arcane";}
		elseif ($dev['devlevel'] = 3) { echo "Adept in The Arcane";}
		elseif ($dev['devlevel'] = 4) { echo "Arcane Master";}
		elseif ($dev['devlevel'] = 5) { echo "He Who Knows All";} 
}else{ echo "";} ?></h3></center>
    <br />
	<center>
    <table cellpadding="3" cellspacing="5" id="personalstats">
		<tr>
		<th colspan="2"><div id="stattitle">General</div></th>
		</tr>
        <tr>
            <td>Current Lord:</td>
            <td><i><?php echo $user['lord']; ?> <?php echo $user['house']; ?></i></td>
        </tr>
        <tr>
            <td>Location:</td>
            <td><i><?php echo $user['location'] ?></i></td>
        </tr>
        <tr>
            <td>Health:</td>
            <td><i><?php echo $stats['health']; ?></i></td>
        </tr>
        <tr>
        <tr>
            <td>Attack Power:</td>
            <td><i><?php echo $stats['attack']; ?></i></td>
        </tr>
        <tr>
            <td>Defense Power:</td>
            <td><i><?php echo $stats['defense']; ?></i></td>
        </tr>
        <tr>
            <td>Mana:</td>
            <td><i><?php echo $stats['defense']; ?></i></td>
        </tr>
        <tr>
            <td>Gold:</td>
            <td><i><?php echo $stats['gold']; ?><br/><sub>+<?php echo $stats['income']; ?> per turn</i></td>
        </tr>
        <tr>
            <td>Food:</td>
            <td><i><?php echo $stats['food']; ?><br/><sub>+<?php echo $stats['farming']; ?> per turn</i></td>
        </tr>
        <tr>
            <td>Turns:</td>
            <td><i><?php echo $stats['turns']; ?></i></td>
        </tr>
		</table>
		<table cellpadding="3" cellspacing="5" id="populationstats">
		<tr>
		<th colspan="2"><div id="stattitle">Population Stats</div></th>
		</tr>
		<tr>
            <td>Total Population:</td>
            <td><i><?php echo (($unit['merchant']) + ($unit['farmer']) + ($unit['defender']) + ($unit['wizard'])); ?></i></td>
        </tr>
        <tr>
            <td>Merchants:</td>
            <td><i><?php echo $unit['merchant']; ?></i></td>
        </tr>
        <tr>
            <td>Farmers:</td>
            <td><i><?php echo $unit['farmer']; ?></i></td>
        </tr>
        <tr>
            <td>Warriors:</td>
            <td><i><?php echo $unit['warrior']; ?></i></td>
        </tr>
        <tr>
            <td>Defenders:</td>
            <td><i><?php echo $unit['defender']; ?></i></td>
        </tr>
        <tr>
            <td>Wizards:</td>
            <td><i><?php echo $unit['wizard']; ?></i></td>
        </tr>
		</table>
		<table cellpadding="3" cellspacing="5" id="buildingstats">
		<tr>
		<th colspan="2"><div id="stattitle">Buildings</div></th>
		</tr>
        <tr>
            <td>Towers:</td>
            <td><i><?php echo $building['tower']; ?></i></td>
        </tr>
        <tr>
            <td>Siege Equipment:</td>
            <td><i><?php echo $building['siege']; ?></i></td>
        </tr>
        <tr>
            <td>Wizard Guilds:</td>
            <td><i><?php echo $building['wizguild']; ?></i></td>
        </tr>
        <tr>
            <td>Granaries:</td>
            <td><i><?php echo $building['granary']; ?></i></td>
        </tr>
        <tr>
            <td>Tax Houses:</td>
            <td><i><?php echo $building['taxhouse']; ?></i></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </table>
    <?php
}
include("footer.php");
?>
