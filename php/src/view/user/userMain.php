<?php
include_once("../layout/header.php");
include_once("../../../dbconnect.php");
include_once("./manage.php");
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
        <div class="form-group col-md-10 d-flex align-items-center">
            <a href="../index/index.php" class="btn btn-success btn-icon-split  ">
                <i class="fa fa-arrow-left btn-sm">
                </i>
            </a>
            <h3 class="m-0 font-weight-bold text-primary w-auto">&nbspผู้ใช้งานทั้งหมด</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="#"><span class="text">ผู้ใช้งานทั้งหมด</span></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="form-row">
                <div class="form-group col-md-10 d-flex align-items-center">
                    <h3 class="h3 mb-0 text-gray-800">ผู้ใช้งานทั้งหมด</h3>
                </div>
                <div class="form-group col-md d-flex align-items-center d-flex justify-content-end" id="insertUser">
                    <button href="#" class="btn btn-primary align-left btn-icon-split" data-toggle="modal" data-target="#insertModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">เพิ่มผู้ใช้งาน</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                ชื่อ
                            </th>
                            <th>
                                นามสกุล
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                อื่นๆ
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $allUser = selectData(getAllUser());

                        for ($i = 1; $i < sizeof($allUser); $i++) { ?>
                            <tr>
                                <th>
                                    <?php echo $allUser[$i]["name"] ?>
                                </th>
                                <th>
                                    <?php echo $allUser[$i]["lastname"] ?>
                                </th>
                                <th>
                                    <?php echo $allUser[$i]["username"] ?>
                                </th>
                                <th>
                                    <div class="d-flex justify-content-start">
                                        <div class="row">
                                            <div class="col">
                                                <form class="group" method="POST" action='./userProfile.php'>
                                                    <button class="btn btn-success btn-icon-split" type="submit" id="use_id" name="user_id" value="<?php echo $allUser[$i]["user_id"] ?>">
                                                        <span class="icon text-white-50">
                                                            <i class="fa fa-address-book" aria-hidden="true"></i>
                                                        </span>
                                                        <span class="text">ข้อมูล</span>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="col">
                                                <a href="#deleteModal" class="btn btn-danger btn-icon-split" id="<?php echo "btnDelete_" + $allUser[$i]["user_id"]; ?>" data-toggle="modal" data-userid="<?php echo $allUser[$i]["user_id"] ?>">
                                                    <input type="hidden" name="user_id" value="">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">ลบ</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="outer">
        <div id="inner">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>


</div>

<!-------Modal-------->
<div class="modal fade" id="insertModal">
    <div class="modal-dialog modal-dialog-top modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มผู้ใช้งาน</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <form class="row g-3 mb-6" id="insertForm">
                    <input type="text" hidden="true" name="status" value="success">
                    <div class="col-md-12 mb-3">
                        <label for="text" class="form-label"><b>ข้อมูลส่วนตัว</b></label>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="text" class="form-label">ชื่อผู้ใช้งาน</label>
                        <input type="text" class="form-control disable" id="username" name="data[username]" value="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="text" class="form-label">รหัสผ่าน</label>
                        <input type="password" class="form-control" id="password" name="data[password]" value="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="text" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="name" name="data[name]" value="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="text" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="lastname" name="data[lastname]" value="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="text" class="form-label">โทรศัพท์</label>
                        <input type="text" class="form-control" id="phone" name="data[phone]" value="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="text" class="form-label">ตำแหน่ง</label>
                        <input type="text" class="form-control" id="role" name="data[role]" value="">
                    </div>
                    <div class="col-md-6 mb-3">
                    </div>
                    <div class="col-md-12 mb-3">
                        <hr>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="text" class="form-label"><b>ที่อยู่</b></label>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputAddress" class="form-label">เลขที่</label>
                        <input type="text" class="form-control" id="number" name="data[number]" value="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputAddress2" class="form-label">หมู่ที่</label>
                        <input type="text" class="form-control" id="moo" name="data[moo]" value="">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputAddress2" class="form-label">ถนน</label>
                        <input type="text" class="form-control" id="road" name="data[road]" value="">
                    </div>
                    <div class="col-md-4 mb-3">

                        <label for="inputState" class="form-label">จำหวัด</label>
                        <br>
                        <select name="data[province]" id="province" class="form-control input-lg">
                            <option value="">เลือกจังหวัด</option>
                            <?php
                            $province = selectData(getProvince());
                            if ($province[0]["numrow"] > 0)
                                for ($i = 1; $i < sizeof($province); $i++) {

                                    echo '<option value="' . $province[$i]["ProvinceID"] . '">' . $province[$i]["ProvinceThai"] . '</option>';
                                }
                            else {
                                echo '<option value="">ไม่มีจังหวัดให้เลือก</option>';
                            }


                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputState" class="form-label">อำเภอ / เขต</label>
                        <br>
                        <select name="data[district]" id="district" class="form-control input-lg">
                            <option value="">เลือกจังหวัดก่อน</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputCity" class="form-label">ตำบล / แขวง</label>
                        <br>
                        <select name="data[tambon]" id="sub_district" value="" class="form-control input-lg" data-live-search="true" title="Select Sub Category">
                            <option value="">เลือกอำเภอ/เขตก่อน</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputZip" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="postcode" name="data[postcode]" value="">
                    </div>
                    <div class="col-md-12 mb-3">
                        <hr>
                    </div>
                    <div class="col-md-6 mb-3">
                    </div>
                    <div class="col-md-6 mb-3 ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" id="submit" name="data" value="data" class="btn btn-primary insertSubmit" data-dismiss="modal">เพิ่มผู้ใช้งาน</button>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->

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
                <form class="group" id="deleteForm">
                    <input type="text" hidden="true" name="status" value="success" id="delete_user_span">
                    <span type="text">ท่านต้องการลบผู้ใช้งานใช่หรือไม่</span>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" id="delete" name="delete" value="" class="btn btn-danger" data-dismiss="modal">ยืนยัน</button>
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
            var userID = $(event.relatedTarget).data('userid');
            if (userID) {
                $('#delete').click(function(event) {
                    $.ajax({
                        type: 'POST',
                        url: 'manage.php',
                        data: 'delete_user=' + userID,
                        success: function(response) {
                            $('#deleteModal').modal('hide');
                            location.reload();
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