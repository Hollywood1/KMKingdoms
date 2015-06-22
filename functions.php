<?php

function connect() {
    mysql_connect("localhost","nillbye","xJZ9MnhTW8");
    mysql_select_db("game");
}

function protect($string) {
    return mysql_real_escape_string(strip_tags(addslashes($string)));
}

function output($string) {
    echo "<div id=\"output\">" . $string . "</div>";
}

?>