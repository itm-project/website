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
            <h3 class="m-0 font-weight-bold text-primary w-auto">&nbspการแจ้งเตือนทั่วไป</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="./userMain.php"><span class="text">การแจ้งเตือนทั่วไป</span></a>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row g-3">
                <div class="form-group col-md-7 d-flex align-items-center">
                    <h3 class="h3 mb-0 text-gray-800">การแจ้งเตือนทั่วไป</h3>
                </div>
                <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
                    <a href="#" class="btn btn-primary align-left btn-icon-split" data-toggle="modal" data-target="#insertModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">เพิ่มการแจ้งเตือน</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-hover">
                <table class="table table-bordered" id="notiTable" width="100%" cellspacing="0">
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
                        <tr>
                            <?php
                            $notification = selectData(getAllNotification());
                            for ($i =  1; $i < sizeof($notification); $i++) {

                            ?>
                                <td hidden="true">
                                    <?php echo $notification[$i]["noti_id"] ?>
                                </td>
                                <td>
                                    <?php echo $notification[$i]["name"] ?>
                                </td>
                                <td>
                                    <?php echo $notification[$i]["detail"] ?>
                                </td>
                                <td>
                                    <?php
                                    echo date("H:i:s d/m/Y", $notification[$i]["date"]) ?>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <form class="group" method="POST" action='./notificationDetail.php'>
                                                <button type="submit" class="btn btn-info btn-icon-split" id="noti_data" name="noti_data" value="<?php echo $notification[$i]["noti_id"] ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </span>
                                                    <span class="text">รายละเอียด</span>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal" id="<?php echo "btnDelete_" + $notification[$i]["noti_id"]; ?>" data-notiid="<?php echo $notification[$i]["noti_id"] ?>">
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
                <h4 class="modal-title">เพิ่มการแจ้งเตือน</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="insertForm">
                    <div class="mb-3">
                        <label for="inputEmail4" class="form-label">หัวข้อ</label>
                        <input type="text" class="form-control" id="name" name="data[name]">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail4" class="form-label">ลายละเอียด</label>
                        <textarea class="form-control" id="detail" name="data[detail]" rows="5"></textarea>
                    </div>
                    <input type="hidden" id="date" name="data[date]" value="<?php echo time(); ?>">
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" id="submit" name="submit" class="btn btn-primary" data-dismiss="modal">เพิ่มการแจ้งเตือน</button>
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
                <span type="text">ท่านต้องการลบการแจ้งเตือนนี้ใช่หรือไม่</span>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" id="delete" name="delete" class="btn btn-danger" data-dismiss="modal">ยืนยัน</button>
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
            var notiid = $(event.relatedTarget).data('notiid');
            console.log(notiid);
            if (notiid) {
                $('#delete').click(function(event) {
                    $.ajax({
                        type: 'POST',
                        url: 'manage.php',
                        data: 'delete_noti=' + notiid,
                        success: function(response) {
                            console.log(response)
                            $('#deleteModal').modal('hide');
                            //location.reload();
                        }
                    });
                });
            }
        });

        $('#province').on('change', function() {
            var countryID = $(this).val();

            if (countryID) {
                $.ajax({
                    type: 'POST',
                    url: 'manage.php',
                    data: 'province_id=' + countryID,
                    success: function(html) {
                        $('#district').html(html)
                    }
                });
            } else {
                $('#district').html('<option value"">เลือกจังหวัดก่อน</option>');
                $('#sub_district').html('<option value"">เลือกอำเภอ/เขตก่อน</option>');
            }
        });

        $('#district').on('change', function() {
            var districtID = $(this).val();
            if (districtID) {
                $.ajax({
                    type: 'POST',
                    url: 'manage.php',
                    data: 'district_id=' + districtID,
                    success: function(html) {
                        $('#sub_district').html(html)
                    }
                });
            } else {
                $('#sub_district').html('<option value"">เลือกอำเภอ/เขตก่อน</option>')
            }
        });
    });
</script>
<?php include_once("../layout/footer.php") ?>