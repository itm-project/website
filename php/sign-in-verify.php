<?php
include_once("./dbconnect.php");
session_start();

$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM `user` WHERE `username` = '" . $username . "'";
$DATA = selectData($sql);

if ($DATA[0]['numrow'] == 1) {

    $sql = "SELECT * FROM `user` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";

    $DATA = selectData($sql);
    

    if (sizeof($DATA) == 2) {

        $_SESSION[md5('userid')] = $DATA["user_id"];
        $_SESSION[md5('user')] = $DATA;

        header("location:./src/view/index/index.php");
    } else {

        header("location:index.php?error=2");
    }
} else {

    header("location:index.php?error=3");
}
