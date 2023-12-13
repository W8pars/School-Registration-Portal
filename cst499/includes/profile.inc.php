<?php

require '../master.php';

if(isset($_POST['getProfile'])) {
    require_once "empdb_config.php";
	require "classes/dbh.classes.php";

    $db = new Dbmgr();
    $con = $db->connect();
    $sql = 'SELECT * FROM tbluser WHERE id = ' . $_SESSION['userid'];
    $table = $db->executeSelectQuery($con, $sql);

}