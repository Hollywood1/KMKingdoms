<?php
session_start();
include("header.php");
if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}else{
	?>
<b>Upload a flag</b><br /> *this doesn't work yet so*

<form method="POST">
House: <input type="text" name="house"/><br /><br />
Lord: <input type="text" name="currentlord"/><br /><br />
<input type="submit" name="editaccount" value="Submit Changes"/>
</form>
<?php
}
include("footer.php");
?>