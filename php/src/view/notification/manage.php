<?php
include_once("../../../dbconnect.php");

function getAllNotification()
{
    $sql = "SELECT * FROM `notification`";

    return $sql;

}