<?php
session_start();
include_once("../layout/header.php");
include_once("../../../dbconnect.php");
include_once("./manage.php");
date_default_timezone_set('Asia/Bangkok');

if (isset($_POST['news_data'])) {
    $news_id = $_POST['news_data'];
    $news = selectData(getNews($news_id));
    $notification = selectData(getNoti($news[1]['notification_id']));
    $_SESSION['news'] = $news;
    $_SESSION['notification'] = $notification;
}

$news = $_SESSION['news'];
$notification = $_SESSION['notification'];

?>

<div class="container-fluid">
    <div class="form-row">
        <div class="form-group col-md-6 d-flex align-items-center">
            <a href="../notification/notification.php" class="btn btn-success btn-icon-split  ">
                <i class="fa fa-arrow-left btn-sm">
                </i>
            </a>
            <h3 class="m-0 font-weight-bold text-primary w-auto">&nbspข่าวสาร</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="./notification.php"><span class="text">การแจ้งเตือน</span></a>
            <?php echo  " / " ?>
            <a href="#"><span class="text">ข้อมูลข่าวสาร</span></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h3 class="h3 mb-0 text-gray-800">ข้อมูลข่าวสาร</h3>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <form class="group" method="POST" action='./newsDetailEdit.php'>
                            <a href="./newsDetailEdit.php" type="submit" class="btn btn-warning btn-icon-split " id="noti_edit" name="noti_edit" value="<?php echo $notification[1]["noti_id"]; ?>">
                                <span class="icon text-white-50">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </span>
                                <span class="text">แก้ไขรายละเอียด</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3 mb-6">
                <div class="col-md-12 mb-3">
                    <label for="text" class="form-label"><b>ข่าวสาร</b></label>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">หัวข้อ</label>
                    <input type="text" class="form-control disable" id="inputEmail4" disabled="true" value="<?php echo $news[1]["name"] ?>">
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" id="detail" name="data[detail]" disabled="true" rows="3" value=""><?php echo $news[1]["detail"] ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">เวลาสร้างข่าว</label>
                    <input class="form-control" id="detail" name="data[detail]" disabled="true" value="<?php echo date("H:i:s d/m/Y", $news[1]["date"]) ?>">
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-12 mb-3">
                    <hr>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="text" class="form-label"><b>การแจ้งเตือน</b></label>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">หัวข้อ</label>
                    <?php if(isset($notification[1]["name"])){ ?>
                        <input type="text" class="form-control disable" id="inputEmail4" disabled="true" value="<?php echo $notification[1]["name"] ?>">
                    <?php }else { ?>
                        <input type="text" class="form-control disable" id="inputEmail4" disabled="true" value="">
                    <?php }?>
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">รายละเอียด</label>
                    <?php if(isset($notification[1]["detail"])){ ?>
                        <textarea class="form-control" id="detail" name="data[detail]" disabled="true" rows="3" value=""><?php echo $notification[1]["detail"] ?></textarea>
                    <?php }else { ?>
                        <textarea class="form-control" id="detail" name="data[detail]" disabled="true" rows="3" value=""></textarea>
                    <?php }?>
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">เวลาสร้างแจ้งเตือน</label>
                    <?php if(isset($notification[1]["detail"])){ ?>
                    <input class="form-control" id="detail" name="data[detail]" disabled="true" value="<?php echo date("H:i:s d/m/Y", $notification[1]["date"]) ?>">
                    <?php }else { ?>
                        <input class="form-control" id="detail" name="data[detail]" disabled="true" value="">
                        <?php }?>
                </div>
                <div class="col-md-6 mb-3">
                </div>
            </form>
        </div>
    </div>
</div>



<?php include_once("../layout/footer.php") ?>