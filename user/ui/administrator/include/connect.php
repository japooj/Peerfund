<?php
$dhost = "localhost"; 
$dusername = "africayo_ayi"; 
$dpassword = "afri@321cayo"; 
$ddatabase = "africayo_ayi";
date_default_timezone_set("Africa/Johannesburg");
error_reporting(0);


$con = mysql_connect($dhost, $dusername, $dpassword) or die("Cannot Connect"); 
// make $ddatabase the current db
$db_selected = mysql_select_db($ddatabase, $con);
if (!$db_selected) {
    die ('Can\'t use the database : ' . mysql_error());
}

if($_COOKIE["usNick"] and $_COOKIE["usPass"])
{
$q = mysql_query("SELECT * FROM tb_users WHERE username='{$_COOKIE['usNick']}' AND password='{$_COOKIE['usPass']}'") or die(mysql_error());
if(mysql_num_rows($q) == 0)
{
$_COOKIE['usNick'] = false;
$_COOKIE['usPass'] = false;
} else {
$loggedin = 1;
$r = mysql_fetch_array($q);
}
}
?>