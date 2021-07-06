<?php
session_start();
$_SESSION["ja_en"] = $_REQUEST["ja_en"]; 
$_SESSION["ja_en_sec"] = $_REQUEST["ja_en_sec"]; 
$_SESSION["ja_en_no"] = $_REQUEST["ja_en_no"]; 
$_SESSION["en_ja"] = $_REQUEST["en_ja"]; 
$_SESSION["en_ja_sec"] = $_REQUEST["en_ja_sec"]; 
$_SESSION["en_ja_no"] = $_REQUEST["en_ja_no"]; 
$_SESSION["kan_ja"] = $_REQUEST["kan_ja"]; 
$_SESSION["kan_ja_sec"] = $_REQUEST["kan_ja_sec"]; 
$_SESSION["kan_ja_no"] = $_REQUEST["kan_ja_no"]; 
$_SESSION["kan_en"] = $_REQUEST["kan_en"]; 
$_SESSION["kan_en_sec"] = $_REQUEST["kan_en_sec"]; 
$_SESSION["kan_en_no"] = $_REQUEST["kan_en_no"]; 
$_SESSION["lesson"] = $_REQUEST["lesson"]; 
$_SESSION["lesson"] = $_REQUEST["lesson"]; 
$_SESSION["section"] = $_REQUEST["section"]; 
$_SESSION["te_st"] = $_REQUEST["te_st"]; 
$_SESSION["te_end"] = $_REQUEST["te_end"]; 
echo 'Success';
?>