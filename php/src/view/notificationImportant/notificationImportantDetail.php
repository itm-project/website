<?php
session_start();
include_once("../layout/header.php");
include_once("../../../dbconnect.php");
include_once("./manage.php");
date_default_timezone_set('Asia/Bangkok');

if (isset($_POST["noti_data"])) {
    $noti_id = $_POST["noti_data"];
    $noti_important = selectData(getNoti($noti_id));
    $_SESSION["noti_important"] = $noti_important;
}

$noti_important = $_SESSION["noti_important"];

?>


<div class="container-fluid">
    <div class="form-row">
        <div class="form-group col-md-6 d-flex align-items-center">
            <a href="../notificationImportant/notificationImportant.php" class="btn btn-success btn-icon-split  ">
                <i class="fa fa-arrow-left btn-sm">
                </i>
            </a>
            <h3 class="m-0 font-weight-bold text-primary w-auto">&nbspการแจ้งเตือนสำคัญ</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="./notificationImportant.php"><span class="text">การแจ้งเตือนสำคัญ</span></a>
            <?php echo  " / " ?>
            <a href="#"><span class="text">ข้อมูลการแจ้งเตือนสำคัญ</span></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <div class="d-sm-flex align-items-center justify-content-between mb-2">
                        <h3 class="h3 mb-0 text-gray-800">ข้อมูลการแจ้งเตือนสำคัญ</h3>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <form class="group" method="POST" action='./notificationImportantDetailEdit.php'>
                            <a href="./notificationImportantDetailEdit.php" type="submit" class="btn btn-warning btn-icon-split " id="noti_edit" name="noti_edit" value="<?php echo $noti_important[1]["notification_id"]; ?>">
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

                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">หัวข้อ</label>
                    <input type="text" class="form-control disable" id="inputEmail4" disabled="true" value="<?php echo $noti_important[1]["name"] ?>">
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" id="detail" name="data[detail]" disabled="true" rows="3" value=""><?php echo $noti_important[1]["detail"] ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">เวลาสร้างแจ้งเตือน</label>
                    <input class="form-control" id="detail" name="data[detail]" disabled="true" value="<?php echo date("H:i:s d/m/Y",$noti_important[1]["date_post"]) ?>">
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">เวลาเริ่ม</label></label>
                    <input type="text" class="form-control" id="inputPassword4" disabled="true" value="<?php echo date("H:i:s d/m/Y", $noti_important[1]["date_start"]) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">เวลาสิ้นสุด</label>
                    <input type="text" class="form-control" id="inputPassword4" disabled="true" value="
                                        <?php if ($noti_important[1]["date_end"] == 0) {
                                            echo NULL;
                                        } else {
                                            echo date("H:i:s d/m/Y", $noti_important[1]["date_end"]);
                                        } ?>">
                </div>
                <div class="col-md-12 mb-3">
            </form>
        </div>
    </div>
</div>

<?php include_once("../layout/footer.php") ?>