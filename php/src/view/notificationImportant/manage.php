<?php 
include_once("../../../dbconnect.php");

function getAllNotificationImportant(){
    $sql = "SELECT * FROM `important_notification`";
    return $sql;
}

function getNoti($noti_data)
{
    $sql = "SELECT * FROM `important_notification` WHERE `important_notification`.`notification_id` = $noti_data";
    return $sql;
}

if(isset($_POST['data']))
{
    $notification = $_POST['data'];
    $sql = "INSERT INTO `important_notification`( `name`, `detail`, `status` , `date_post` , `date_start`) 
            VALUES ('$notification[name]','$notification[detail]','$notification[status]','$notification[date]','$notification[date]')";

    $result = addinsertData($sql);
    echo $result;
}

if(isset($_POST['openclose_notiid']))
{
    $notification = $_POST['openclose_notiid'];
    $sql = "SELECT * FROM `important_notification` WHERE `notification_id` = $notification";
    
    $result = selectData($sql);
    
    $thisTime = time();

    if($result[1]["status"] == 0)
    {
        $sql = "UPDATE `important_notification` SET `status`= '1' , `date_start` = '$thisTime' WHERE `notification_id` = $notification";
    }
    else 
    {
        $sql = "UPDATE `important_notification` SET `status`= '0' , `date_end` = '$thisTime' WHERE `notification_id` = $notification";
    }
    
    $result = updateData($sql);
}

if(isset($_POST['noti_id']))
{
    $noti_id = $_POST['noti_id'];
    $sql = "SELECT * FROM `important_notification` WHERE `notification_id` = $notification";
    $result = selectData($sql);
    echo print_r($result);
    $response += '<form id="editForm">
    <input type="hidden" id="noti_id" name="edit[noti_id]" value='.$result[1]['notification_id'].'>
    <div class="mb-3">
        <label for="inputEmail4" class="form-label">หัวข้อ</label>
        <input type="text" id="name_edit" name="edit[name_edit]" class="form-control" id="inputEmail4" value='.$result[1]['name'].'>
    </div>
    <div class="mb-3">
        <label for="inputEmail4" class="form-label">ลายละเอียด</label>
        <textarea class="form-control" name="edit[detail_edit]" id="exampleFormControlTextarea1" rows="5" value='.$result[1]['detail'].'></textarea>
    </div>
</form>';

    echo $response;
}

if(isset($_POST['edit']))
{
    $edit = $_POST['edit'];
    $sql = "UPDATE `important_notification` SET `name`='$edit[name]',`detail`='$edit[detail]' WHERE `notification_id`= $edit[notification_id]";
    echo '<script>console.log('.$sql.')</script>';
    $result = updateData($sql);

    $_SESSION["noti_important"] = selectData(getNoti($edit['notification_id']));
}
