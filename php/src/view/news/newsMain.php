<?php include_once("../layout/header.php");
include_once("../../../dbconnect.php");
include_once("./manage.php");
date_default_timezone_set('Asia/Bangkok');
?>

<style>
    #outer {
        width: 100%;
        text-align: center;
    }

    #inner {
        display: inline-block;
    }
</style>

<div class="container-fluid">
    <div class="form-row">
        <div class="form-group col-md-6 d-flex align-items-center">
            <a href="../index/index.php" class="btn btn-success btn-icon-split  ">
                <i class="fa fa-arrow-left btn-sm">
                </i>
            </a>
            <h3 class="m-0 font-weight-bold text-primary w-auto">&nbspข่าวสาร</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="./userMain.php"><span class="text">ข่าวสาร</span></a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row g-3">
                <div class="form-group col-md-7 d-flex align-items-center">
                    <h1 class="h3 mb-0 text-gray-800">ข่าวสาร</h1>
                </div>

                <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
                    <a href="#" class="btn btn-primary align-left btn-icon-split" data-toggle="modal" data-target="#insertModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">เพิ่มข่าวสาร</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-hover">
                <table class="table table-bordered" id="newsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th hidden="true">
                                ID
                            </th>
                            <th>
                                หัวข้อ
                            </th>
                            <th>
                                รายละเอียด
                            </th>
                            <th>
                                วันที่
                            </th>
                            <th>
                                อื่นๆ
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $news = selectData(getAllNews());
                        for ($i = 1; $i < sizeof($news); $i++) {
                        ?>
                            <tr>
                                <td hidden="true">
                                    <?php echo $news[$i]["news_id"] ?>
                                </td>
                                <td>
                                    <?php echo $news[$i]["name"] ?>
                                </td>
                                <td>
                                    <?php echo $news[$i]["detail"] ?>
                                </td>
                                <td>
                                    <?php echo date("H:i:s d/m/Y", $news[$i]["date"]) ?>
                                </td>
                                <td>
                                    <div class="row">
                                    <!--
                                        <?php/*
                                        if ($news[$i]["status"] == 1) {*/
                                        ?>
                                            <div class="col">
                                                <a href="#" class="btn btn-success btn-icon-split " data-toggle="modal" data-target="#opencloseModal" id="btn_switch" data-newsid="<?php echo $news[$i]["news_id"] ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                    </span>
                                                    <span class="text">เปิด</span>
                                                </a>
                                            </div>
                                        <?php/*
                                        } else {*/
                                        ?>
                                            <div class="col">
                                                <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#opencloseModal" id="btn_switch" data-newsid="<?php echo $news[$i]["news_id"] ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-bell-slash-o" aria-hidden="true"></i>
                                                    </span>
                                                    <span class="text">ปิด</span>
                                                </a>
                                            </div>
                                        <?php/* } */?> -->

                                        <div class="col">
                                            <form class="group" method="POST" action='./newsDetail.php'>
                                                <button type="submit" class="btn btn-info btn-icon-split" id="news_data" name="news_data" value="<?php echo $news[$i]["news_id"] ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </span>
                                                    <span class="text">รายละเอียด</span>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal" id="<?php echo "btnDelete_" + $news[$i]["news_id"]; ?>" data-newsid="<?php echo $news[$i]["news_id"] ?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">ลบ</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-------Modal-------->
<div class="modal fade" id="insertModal">
    <div class="modal-dialog modal-dialog-top modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มข่าวสาร</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="insertForm" enctype="multipart/form-data">
                    <div class="col-md-12 mb-3">
                        <label for="text" class="form-label"><b>ข้อมูล</b></label>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="inputEmail4" class="form-label">หัวข้อ</label>
                        <input type="text" class="form-control" id="news_name" name="data[news_name]">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="inputEmail4" class="form-label">รายละเอียด</label>
                        <textarea class="form-control" id="news_detail" name="data[news_detail]" rows="5"></textarea>
                    </div>
                   <?php /* <div class="col-md-12 input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">รูปภาพ</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileToUpload" name="data[fileToUpload]">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div> */?>
                   
                    <div class="col-md-12 mb-3">
                        <hr>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="text" class="form-label"><b>การแจ้งเตือน</b></label>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="inputEmail4" class="form-label">หัวข้อ</label>
                        <input type="text" class="form-control" id="noti_name" name="data[noti_name]">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="inputEmail4" class="form-label">ลายละเอียด</label>
                        <textarea class="form-control" id="noti_detail" name="data[noti_detail]" rows="5"></textarea>
                    </div>
                    <input type="hidden" id="date" name="data[date]" value="<?php echo time() ?>">

                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" id="submit" name="submit" class="btn btn-success" data-dismiss="modal">เพิ่มการแจ้งเตือน</button>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-dialog-top modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">ยืนยันการลบ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <span type="text">ท่านต้องการลบข่าวนี้ใช่หรือไม่</span>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" id="delete" name="delete" class="btn btn-danger" data-dismiss="modal">ยืนยัน</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="opencloseModal">
    <div class="modal-dialog modal-dialog-top modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เปิดปิดการแจ้งเตือน</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body" id="opencloseModalBody">
                <form class="group" id="opencloseModal">
                    <input type="text" hidden="true" name="status" value="success" id="delete_user_span">
                    <span type="text">ท่านต้องการ .... การแจ้งเตือนนี้ใช่หรือไม่</span>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" id="openclose" class="btn btn-danger" data-dismiss="modal">แก้ไข</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="./manage.js"></script>
<script>
    $(document).ready(function() {
        $("button#submit").click(function(event) {
            submitForm();
            return false;
        });

        $("#deleteModal").on('show.bs.modal', function(event) {
            var newsid = $(event.relatedTarget).data('newsid');
            if (newsid) {
                $('#delete').click(function(event) {
                    $.ajax({
                        type: 'POST',
                        url: 'manage.php',
                        data: 'delete_news=' + newsid,
                        success: function(response) {
                            $('#deleteModal').modal('hide');
                            location.reload();
                        }
                    });
                });
            }
        });

        $("#opencloseModal").on('show.bs.modal', function(event) {
            newsid = $(event.relatedTarget).data('newsid');
            if (newsid) {
                $('#openclose').click(function(event) {
                    $.ajax({
                        type: 'POST',
                        url: 'manage.php',
                        data: 'openclose_newsid=' + newsid,
                        success: function(response) {
                            console.log(response);
                            $('#opencloseModal').modal('hide');
                            location.reload();
                        }
                    });
                });
            }
        });

    });
</script>
<?php include_once("../layout/footer.php") ?>