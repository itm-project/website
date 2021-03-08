<?php
include_once("../../../dbconnect.php");

function request()
{
    $request = $_POST["request"];
    switch ($request) {
        case 'selectAllUser':
            $sql = "SELECT * FROM `user`";

            //echo json_encode($result);
            return $sql;
            break;
        case 'selectUser':
            $user_id = $_POST["user_id"];
            $sql = "SELECT * FROM `user` WHERE `user`.`user_id` = $user_id";

            return $sql;
            break;
    }
}

function getAllUser()
{
    $sql = "SELECT * FROM `user`";

    return $sql;
}

function getUser($id)
{
    //$id = $_POST["user_id"];
    $sql = "SELECT * FROM `user` JOIN `address` JOIN `tambon` JOIN `district` JOIN `province` 
            ON `user`.`address` = `address`.`address_id` AND `tambon`.`TambonID` = `address`.`sub-district` 
            AND `district`.`DistrictID` = `address`.`district` AND `province`.`ProvinceID` = `address`.`province`
            WHERE `user`.`user_id` = $id";

    return $sql;
}

function getTravelHistory($id)
{
    $sql = "SELECT * FROM `travel_history` WHERE `user_id` = $id";

    return $sql;
}

function getProvince()
{
    $sql = "SELECT * FROM `province` ORDER BY ProvinceThai ASC";

    return $sql;
}


if (isset($_POST['data'])) {
    $user = $_POST['data'];
    $sql = "SELECT * FROM `address` WHERE `number`=$user[number] AND `moo`=$user[moo] AND `road`=$user[road] AND `sub-district`=$user[tambon] 
            AND `district`=$user[district] AND `province`=$user[province] AND `postcode`=$user[postcode]";
    $isExist = selectData($sql);

    if ($isExist[0]['numrow'] == 0) {
        $sql = "INSERT INTO `address`(`number`, `moo`, `road`, `sub-district`, `district`, `province`, `postcode`) 
            VALUES ('$user[number]','$user[moo]','$user[road]','$user[tambon]','$user[district]','$user[province]','$user[postcode]')";
        $lastid = addinsertData($sql);
    } else {
        $lastid = $isExist[1]['address_id'];
    }

    $sql = "SELECT * FROM WHERE `username`=$user[username]";
    echo $sql;
    $isExist = selectData($sql);

    if ($isExist[0]['numrow'] == 0) {
        $sql = "INSERT INTO `user`( `name`, `lastname`, `phone`, `role`, `address`, `username`, `password`) 
            VALUES ('$user[name]','$user[lastname]','$user[phone]','$user[role]','$lastid','$user[username]','$user[password]')";
        $lastid = addinsertData($sql);
    }
}

if (isset($_POST["province_id"])) {
    $province_id = $_POST['province_id'];
    $sql = "SELECT * FROM `district` WHERE `ProvinceID` = $province_id ORDER BY `DistrictID` ASC";
    $result = selectData($sql);
    echo '<script>console.log('.'province='.$province_id.')</script>';
    if ($result[0]["numrow"] > 0) {
        echo '<option value="">เลือกอำเภอ/เขต</option>';
        for ($i = 1; $i < sizeof($result); $i++) {
            echo '<option value="' . $result[$i]["DistrictID"] . '">' . $result[$i]["DistrictThai"] . '</option>';
        }
    } else {
        echo '<option value="">ไม่มีอำเภอ/เขต</option>';
    }
} else if (isset($_POST["district_id"])) {
    $district_id = $_POST['district_id'];
    $sql = "SELECT * FROM `tambon` WHERE `DistrictID` = $district_id ORDER BY `TambonID` ASC";
    $result = selectData($sql);
    echo '<script>console.log('.'district='.$district_id.')</script>';
    if ($result[0]["numrow"] > 0) {
        echo '<option value="">เลือกตำบล/เเขวง</option>';
        for ($i = 1; $i < sizeof($result); $i++) {
            echo '<option value="' . $result[$i]["TambonID"] . '">' . $result[$i]["TambonThai"] . '</option>';
        }
    } else {
        echo '<option value="">ไม่มีตำบล/เเขวง</option>';
    }
}

if(isset($_POST['delete_user'])){
    $userid = $_POST['delete_user'];
    $sql = "DELETE FROM `user` WHERE `user_id`=$userid";
    echo '<script>console.log('.$sql.')</script>';
    $result = $conn->exec($sql);
}



