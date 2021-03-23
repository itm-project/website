<?php
include_once("../layout/header.php");
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
            <h3 class="m-0 font-weight-bold text-danger w-auto">&nbspการแจ้งเตือนสำคัญ</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="./userMain.php"><span class="text">การแจ้งเตือนสำคัญ</span></a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row g-3">
                <div class="form-group col-md-7 d-flex align-items-center">
                    <h3 class="h3 mb-0 text-danger">การแจ้งเตือนสำคัญ</h3>
                </div>

                <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
                    <div id="insertNotification">
                        <a href="#" class="btn btn-primary align-left btn-icon-split" data-toggle="modal" data-target="#insertModal">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">เพิ่มการแจ้งเตือน</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-hover">
                <table class="table table-bordered" id="notiImportantTable" width="100%" cellspacing="0" data-sort-name="หัวข้อ" data-sort-order="asc">
                    <thead>
                        <tr>
                            <th hidden="true">
                                ID
                            </th>
                            <th>
                                หัวข้อ
                            </th>
                            <th>
                                ลายละเอียด
                            </th>
                            <th>
                                เวลาเริ่ม
                            </th>
                            <th>
                                เวลาสิ้นสุด
                            </th>
                            <th>
                                อื่นๆ
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $notification = selectData(getAllNotificationImportant());
                        for ($i = 1; $i < sizeof($notification); $i++) {

                        ?>
                            <tr>
                                <td hidden="true">
                                    <?php echo $notification[$i]["notification_id"] ?>
                                </td>
                                <td>
                                    <?php echo $notification[$i]["name"] ?>
                                </td>
                                <td>
                                    <?php echo $notification[$i]["detail"] ?>
                                </td>

                                <td>
                                    <?php echo date("H:i:s d/m/Y", $notification[$i]["date_start"]) ?>
                                </td>
                                <td> <?php
                                        if ($notification[$i]["date_end"] == 0) {
                                            echo NULL;
                                        } else {
                                            echo date("H:i:s d/m/Y", $notification[$i]["date_end"]);
                                        }
                                        ?>
                                </td>
                                <td>
                                
                                    <div class="row">
                                        <?php
                                        if ($notification[$i]["status"] == 1) {
                                        ?>
                                            <div class="col">
                                                <a href="#" class="btn btn-success btn-icon-split " data-toggle="modal" data-target="#opencloseModal" id="btn_switch" data-notiid="<?php echo $notification[$i]["notification_id"] ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-bell-o" aria-hidden="true"></i>
                                                    </span>
                                                    <span class="text">เปิด</span>
                                                </a>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="col">
                                                <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#opencloseModal" id="btn_switch" data-notiid="<?php echo $notification[$i]["notification_id"] ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-bell-slash-o" aria-hidden="true"></i>
                                                    </span>
                                                    <span class="text">ปิด</span>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <div class="col">
                                            <form class="group" method="POST" action='./notificationImportantDetail.php'>
                                                <button type="submit" class="btn btn-info btn-icon-split " id="noti_data" name="noti_data" value="<?php echo $notification[$i]["notification_id"] ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </span>
                                                    <span class="text">รายละเอียด</span>
                                                </button>
                                            </form>
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
                <h4 class="modal-title">เพิ่มการแจ้งเตือน</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="insertForm">
                    <div class="mb-3">
                        <label for="inputEmail4" class="form-label">หัวข้อ</label>
                        <input type="text" id="name" name="data[name]" class="form-control" id="inputEmail4">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail4" class="form-label">ลายละเอียด</label>
                        <textarea class="form-control" id="detail" name="data[detail]" rows="5"></textarea>
                    </div>
                    <input type="hidden" id="status" name="data[status]" value="1">
                    <input type="hidden" id="date" name="data[date]" value="<?php echo time() ?>">
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary" id="submit" name="data" value="data" data-dismiss="modal">เพิ่มการแจ้งเตือน</button>
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

        /*$("#editModal").on('show.bs.modal', function(event) {
            noti_id = $(event.relatedTarget).data('edit_notiid');
            $("button#edit").click(function(event) {
                editForm();
                return false;
            });
        });*/

        $("#btn_edit").click(function() {
            var noti_id = $(event.relatedTarget).data('edit_notiid');
            console.log(noti_id)
            $.ajax({
                url: 'manage.php',
                type: 'POST',
                data: {
                    noti_id: noti_id
                },
                success: function(response) {
                    // Add response in Modal body
                    $('.modal-body#editModalBody').html(response);
                    // Display Modal
                    $('#editModal').modal('show');
                }
            });
        });



        $("#opencloseModal").on('show.bs.modal', function(event) {
            notiid = $(event.relatedTarget).data('notiid');
            if (notiid) {
                $('#openclose').click(function(event) {
                    $.ajax({
                        type: 'POST',
                        url: 'manage.php',
                        data: 'openclose_notiid=' + notiid,
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