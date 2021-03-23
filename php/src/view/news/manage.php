<?php
include_once("../../../dbconnect.php");

function getAllNews()
{
    $sql = "SELECT * FROM `news`";

    return $sql;
}

function getNews($newsid)
{
    $sql = "SELECT * FROM `news` WHERE `news`.`news_id` = '$newsid'";

    return $sql;
}

function getNoti($noti_id)
{
    $sql = "SELECT * FROM `notification` WHERE `notification`.`noti_id` = $noti_id";
    return $sql;
}

if (isset($_POST['data'])) {
    $news = $_POST['data'];
    print_r($news);
    if ($news['noti_name'] != null && $news['noti_detail'] != null) {
        $sql = "INSERT INTO `notification`(`name`, `detail`, `date`) 
            VALUES ('$news[noti_name]','$news[noti_detail]','$news[date]')";
        $lastnotiID = addinsertData($sql);
    } else {
        $lastnotiID = null;
    }

    $sql = "INSERT INTO `news`(`name`, `detail`, `date`, `notification_id`) 
            VALUES ('$news[news_name]','$news[news_detail]','$news[date]','$lastnotiID')";
    $result = addinsertData($sql);
    
    
    $target_dir = "./etc/img/news/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if (isset($_POST["delete_news"])) {
    $newsid = $_POST["delete_news"];
    $noti = selectData(getNews($newsid));
    $notiID = $noti[1]['notification_id'];

    $sql = "DELETE FROM `news` WHERE `news_id`= '$newsid'";
    $myConDB = connectDB();
    $stmt = $myConDB->prepare($sql);
    $stmt->execute();

    $sql = "DELETE FROM `notification` WHERE `noti_id` = '$notiID'";
    $myConDB = connectDB();
    $stmt = $myConDB->prepare($sql);
    $stmt->execute();
}

if (isset($_POST["edit"])) {
    $edit = $_POST["edit"];
    print_r($edit);
    $time = time();

    $sql = "UPDATE `news` SET `name`='$edit[news_name]',`detail`='$edit[news_detail]' WHERE `news_id`=$edit[news_id] ";
    $result = updateData($sql);

    $noti = getNews($edit['news_id']);
    if($noti[1]["notification_id"] != 0){
        $sql = "UPDATE `notification` SET `name`='$edit[noti_name]',`detail`='$edit[noti_detail]' WHERE `noti_id`=$edit[noti_id]";
        $result = updateData($sql);
    }
    else 
    {
        $sql = "INSERT INTO `notification`(`name`, `detail`, `date`) 
                VALUES ('$edit[noti_name]','$edit[noti_detail]',$time)";
        $result = addinsertData($sql);
        $sql = "UPDATE `news` SET `notification_id` = $result WHERE `news_id`=$edit[news_id] ";
        $result = updateData($sql);
    }
    
}

if (isset($_POST['openclose_newsid'])) {
    $news = $_POST['openclose_newsid'];
    $sql = "SELECT * FROM `news` WHERE `news_id` = $news";

    $result = selectData($sql);


    if ($result[1]["status"] == 0) {
        $sql = "UPDATE `news` SET `status`= '1'  WHERE `news_id` = $news";
    } else {
        $sql = "UPDATE `news` SET `status`= '0'  WHERE `news_id` = $news";
    }

    $result = updateData($sql);
}
