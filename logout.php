<?php
session_start();
include_once("include/setting.php");
session_destroy();
$api->go("/index.php");
?>