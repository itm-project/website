<?php 
include_once("../../../dbconnect.php");

function getAllNews()
{
    $sql = "SELECT * FROM `news`";

    return $sql;
}