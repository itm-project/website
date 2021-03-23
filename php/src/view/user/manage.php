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
    /*
    $sql = "SELECT * FROM `address` WHERE `number`=$user[number] AND `moo`=$user[moo] AND `road`=$user[road] AND `sub-district`=$user[tambon] 
            AND `district`=$user[district] AND `province`=$user[province] AND `postcode`=$user[postcode]";
    $isAddressExist = selectData($sql);
    echo print_r($isAddressExist);
    $sql = "SELECT * FROM WHERE `username`='$user[username]'";
    $isUsernameExist = selectData($sql);
    echo print_r($isUsernameExist);
    
    if ($isAddressExist[0]['numrow'] == 0  && $isUsernameExist[0]['numrow'] == 0) {
        
    } else {
        $lastid = $isAddressExist[1]['address_id'];

        $sql = "INSERT INTO `user`( `name`, `lastname`, `phone`, `role`, `address`, `username`, `password`) 
            VALUES ('$user[name]','$user[lastname]','$user[phone]','$user[role]','$lastid','$user[username]','$user[password]')";
        $lastid = addinsertData($sql);
    }*/
    $sql = "INSERT INTO `address`(`number`, `moo`, `road`, `sub-district`, `district`, `province`, `postcode`) 
            VALUES ('$user[number]','$user[moo]','$user[road]','$user[tambon]','$user[district]','$user[province]','$user[postcode]')";
    $lastid = addinsertData($sql);

    $sql = "INSERT INTO `user`( `name`, `lastname`, `phone`, `role`, `address`, `username`, `password`) 
            VALUES ('$user[name]','$user[lastname]','$user[phone]','$user[role]','$lastid','$user[username]','$user[password]')";
    $lastid = addinsertData($sql);
}

if (isset($_POST["province_id"])) {
    $province_id = $_POST['province_id'];
    $sql = "SELECT * FROM `district` WHERE `ProvinceID` = $province_id ORDER BY `DistrictID` ASC";
    $result = selectData($sql);
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
    if ($result[0]["numrow"] > 0) {
        echo '<option value="">เลือกตำบล/เเขวง</option>';
        for ($i = 1; $i < sizeof($result); $i++) {
            echo '<option value="' . $result[$i]["TambonID"] . '">' . $result[$i]["TambonThai"] . '</option>';
        }
    } else {
        echo '<option value="">ไม่มีตำบล/เเขวง</option>';
    }
}

if(isset($_POST["delete_user"])){
    $userid = $_POST["delete_user"];
    $user = selectData(getUser($userid));

    echo print_r($user);
    $address_id = $user[1]["address"];
    $sql = "DELETE FROM `address` WHERE `address`.`address_id` = $address_id ";
    echo $sql;
    $myConDB = connectDB();
    $stmt = $myConDB->prepare( $sql ); 
    $stmt->execute();

    $sql = "DELETE FROM `user` WHERE `user_id`=$userid";
    echo $sql;
    $myConDB = connectDB();
    $stmt = $myConDB->prepare( $sql ); 
    $stmt->execute();
}

if(isset($_POST['edit']))
{
    $user = $_POST['edit'];

    $sql = "UPDATE `user` SET `name`='$user[name]',`lastname`='$user[lastname]',`phone`='$user[phone]',
            `username`='$user[username]',`password`='$user[password]' WHERE `user_id`='$user[userid]'";
    $result = updateData($sql);

    $sql = "UPDATE `address` SET `number`='$user[number]',`moo`='$user[moo]',`road`='$user[road]',`sub-district`='$user[tambon]',
            `district`='$user[district]',`province`='$user[province]',`postcode`='$user[postcode]' WHERE `address_id`='$user[addressid]'";
    $result = updateData($sql);
}



