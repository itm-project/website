<?php
include_once("../../../dbconnect.php");

function getAllNotification()
{
    $sql = "SELECT * FROM `notification`";

    return $sql;
}

function getNoti($noti_id)
{
    $sql = "SELECT * FROM `notification` WHERE `noti_id` = $noti_id";

    return $sql;
}

function getNews($news_id)
{
    $sql = "SELECT * FROM `news` WHERE `news`.`notification_id` = '$news_id'";

    return $sql;
}

if(isset($_POST['data']))
{
    $notification = $_POST['data'];
    $sql = "INSERT INTO `notification`(`name`, `detail`, `date`) 
            VALUES ('$notification[name]','$notification[detail]','$notification[date]')";

    $result = addinsertData($sql);
    echo $result;
}

if(isset($_POST["delete_noti"])){
    $noti = $_POST["delete_noti"];
   
    $result = selectData(getNews($noti));
    if($result[0]["numrow"] == 1){
        $sql = "UPDATE `news` SET `notification_id` = '0' WHERE `news_id`= ".$result[1]['news_id']."";
        $result = updateData($sql);
    }

    $sql = "DELETE FROM `notification` WHERE `noti_id` = '$noti'";
    $myConDB = connectDB();
    $stmt = $myConDB->prepare( $sql ); 
    $stmt->execute();
}

if(isset($_POST['edit']))
{
    $edit = $_POST['edit'];
    $sql = "UPDATE `notification` SET `name`='$edit[name]',`detail`='$edit[detail]' WHERE `noti_id` = $edit[noti_id]";
    echo $sql;
    $result = updateData($sql);
}
