<?php
	session_start();
    require_once "classes/db.php";
    require_once "classes/store.php";
    $conn = Database::getInstance();
    date_default_timezone_set("Etc/GMT-8");
    
    if($_POST['action'] == "addSubject"){ echo Store::saveSubject();}