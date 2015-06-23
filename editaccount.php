<?php
session_start();
include("header.php");
if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}
	if(isset($_POST['editaccount'])){
	$house = $_POST['house'];
	$upd1 = mysql_query("UPDATE `user` SET `house`='$house' WHERE `id`='$uid'") or die(mysql_error()); echo "You have updated your information"; }
	else{
	?>
<b>Upload a flag</b><br />
<br />
<b>House Information</b><br /><br />
<form action="editaccount.php" method="POST">
House: <input type="text" name="house"/><br /><br />
Lord: <input type="text" name="currentlord"/><br /><br />
<input type="submit" name="editaccount" value="Submit Changes"/>
</form>
<?php
}

include("footer.php");
?>