<?php 
include_once("../../../dbconnect.php");

function getAllNotificationImportant(){
    $sql = "SELECT * FROM `important_notification`";
    return $sql;
}

if(isset($_POST['data']))
{
    $notification = $_POST['data'];
    $sql = "INSERT INTO `important_notification`( `name`, `detail`, `status`) 
            VALUES ('$notification[name]','$notification[detail]','$notification[status]')";

    $result = addinsertData($sql);
    echo $result;
}

?>