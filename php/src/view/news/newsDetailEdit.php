<?php
session_start();
include_once("../layout/header.php");
include_once("../../../dbconnect.php");
include_once("./manage.php");
date_default_timezone_set('Asia/Bangkok');

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

            </div>
        </div>
        <div class="card-body">
            <form class="row g-3 mb-6" id="editForm">
                <div class="col-md-12 mb-3">
                    <label for="text" class="form-label"><b>ข่าวสาร</b></label>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">หัวข้อ</label>
                    <input type="text" class="form-control disable" id="inputEmail4" name="edit[news_name]" value="<?php echo $news[1]["name"] ?>">
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">รายละเอียด</label>
                    <textarea class="form-control" id="detail" name="edit[news_detail]" rows="5" value=""><?php echo $news[1]["detail"] ?></textarea>
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">เวลาสร้างข่าว</label>
                    <input class="form-control" id="date" name="edit[news_datel]" disabled="true" value="<?php echo date("H:i:s d/m/Y", $news[1]["date"]) ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <input type="hidden" name="edit[news_id]" value="<?php echo $news[1]["news_id"] ?>">
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
                    <input type="text" class="form-control disable" id="inputEmail4" name="edit[noti_name]" value="<?php echo $notification[1]["name"] ?>">
                    <?php }else { ?>
                        <input type="text" class="form-control disable" id="inputEmail4" name="edit[noti_name]" value="">
                        <?php }?>
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">รายละเอียด</label>
                    <?php if(isset($notification[1]["detail"])){ ?>
                    <textarea class="form-control" id="detail" name="edit[noti_detail]" rows="5" value=""><?php echo $notification[1]["detail"] ?></textarea>
                    <?php }else { ?>
                    <textarea class="form-control" id="detail" name="edit[noti_detail]" rows="5" value=""></textarea>
                    <?php }?>
                </div>
                <div class="col-md-6 mb-3">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="text" class="form-label">เวลาสร้างแจ้งเตือน</label>
                    <?php if(isset($notification[1]["detail"])){ ?>
                    <input class="form-control" id="detail" name="edit[noti_date]" disabled="true" value="<?php echo date("H:i:s d/m/Y", $notification[1]["date"]) ?>">
                    <?php }else { ?>
                        <input class="form-control" id="detail" name="edit[noti_date]" disabled="true" value="">
                        <?php }?>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="hidden" name="edit[noti_id]" value="<?php echo $notification[1]["noti_id"] ?>">
                </div>
                <div class="col-md-12 mb-3">
                    <hr>
                    <div class="d-flex justify-content-end">
                        <div class="row">
                            <div class="col">
                                <a href="./newsDetail.php" class="btn btn-secondary ">
                                    <span class="text">ยกเลิก</span>
                                </a>
                            </div>
                            <div class="col">
                                <button type="submit" id="btn_edit" class="btn btn-warning ">
                                    <span class="text">แก้ไข</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="./manage.js"></script>
<script>
    $(document).ready(function() {
        $("button#btn_edit").click(function(event) {
            editForm();
            return false;
        });
    });
</script>

<?php include_once("../layout/footer.php") ?>