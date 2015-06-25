<?php
session_start();
include("header.php");
if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}
	if(isset($_POST['editaccount'])){
	$house = $_POST['house'];
	$currentlord = $_POST['currentlord'];
	$location = $_POST['location'];
	$align = $_POST['align'];
	$upd1 = mysql_query("UPDATE `user` SET `house`='$house', `lord`='$currentlord', `location`='$location', `align`='$align' WHERE `id`='$uid'") or die(mysql_error()); echo "You have updated your information"; }
	else{
	?>
<b>Upload a flag</b><br />
<br />
<b>House Information</b><br /><br />
<b>Since this is a dev feature, you must enter ALL information for it to update. Otherwise it will update with empty values.</b>
<form action="editaccount.php" method="POST">
House: <input type="text" name="house"/><br /><br />
Lord: <input type="text" name="currentlord"/><br /><br />
Location: <input type="text" name="location"/><br /><br />
<input type="submit" name="editaccount" value="Submit Changes"/>
</form>
<?php
}

include("footer.php");
?>