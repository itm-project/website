<?php 
session_start();
include_once("../layout/header.php");
include_once("../../../dbconnect.php");
include_once("./manage.php");

$user = $_SESSION["user"];

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
            <a href="../user/userProfile.php" class="btn btn-success btn-icon-split  ">
                <i class="fa fa-arrow-left btn-sm">
                </i>
            </a>
            <h3 class="m-0 font-weight-bold text-primary w-auto">&nbspข้อมูลส่วนตัว</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="./userMain.php"><span class="text">ผู้ใช้งานทั้งหมด</span></a>
            <?php echo  " / " ?>
            <a href="#"><span class="text">ข้อมูลส่วนตัว</span></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="form-row">
                <div class="d-sm-flex align-items-center justify-content-between mb-2">
                    <h3 class="h3 mb-0 text-gray-800">ประวัติผู้ใช้งาน</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <img src="../../../etc/img/default.jpg" class="rounded-circle border border-dark" width="100%" alt="...">
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col">

                <form class="row g-3 mb-6">
                        <div class="col-md-12 mb-3">
                            <label for="text" class="form-label"><b>ข้อมูลส่วนตัว</b></label>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label">ชื่อผู้ใช้งาน</label>
                            <input type="text" class="form-control disable" id="inputEmail4" value="<?php echo $user[1]["username"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label">รหัสผ่าน</label>
                            <input type="text" class="form-control" id="inputPassword4" value="<?php echo $user[1]["password"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="inputEmail4" value="<?php echo $user[1]["name"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" id="inputPassword4" value="<?php echo $user[1]["lastname"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label">โทรศัพท์</label>
                            <input type="text" class="form-control" id="inputPassword4" value="<?php echo $user[1]["phone"] ?>">
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
                            <input type="text" class="form-control" id="inputAddress" value="<?php echo $user[1]["number"] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputAddress2" class="form-label">หมู่ที่</label>
                            <input type="text" class="form-control" id="inputAddress2" value="<?php echo $user[1]["moo"] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputAddress2" class="form-label">ถนน</label>
                            <input type="text" class="form-control" id="inputAddress2" value="<?php echo $user[1]["road"] ?>">
                        </div>
                        <div class="col-md-4 mb-3">

                        <label for="inputState" class="form-label">จำหวัด</label>
                        <br>
                        <select name="data[province]" id="province" class="form-control input-lg" >
                            <option value="<?php echo $user[1]["ProvinceID"] ;?>"><?php echo $user[1]["ProvinceThai"]; ?></option>
                            <?php
                            $province = selectData(getProvince());
                            if($province[0]["numrow"] > 0)
                                for ($i = 1; $i < sizeof($province); $i++) {
                                    
                                    echo '<option value="'. $province[$i]["ProvinceID"] .'">'. $province[$i]["ProvinceThai"] .'</option>';
                                }
                            else 
                            {
                                echo '<option value="">ไม่มีจังหวัดให้เลือก</option>';
                            }
                            
                            
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputState" class="form-label">อำเภอ / เขต</label>
                        <br>
                        <select name="data[district]" id="district" class="form-control input-lg">
                            <option value="<?php echo $user[1]["DistrictID"] ?>"><?php echo $user[1]["DistrictThai"] ?></option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputCity" class="form-label">ตำบล / แขวง</label>
                        <br>
                        <select name="data[tambon]" id="sub_district" value="" class="form-control input-lg" data-live-search="true" title="Select Sub Category">
                            <option value="<?php echo $user[1]["TambonID"] ?>"><?php echo $user[1]["TambonThai"] ?></option>
                        </select>
                    </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputZip" class="form-label">รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" id="inputZip" value="<?php echo $user[1]["postcode"] ?>">
                        </div>

                    </form>
                    <hr>
                    <div class="d-flex justify-content-end">
                        <div class="row">
                            <div class="col">
                                <a href="./userProfile.php" class="btn btn-secondary ">
                                    <span class="text">ยกเลิก</span>
                                </a>
                            </div>
                            <div class="col">
                                <a href="./userProfile.php" class="btn btn-warning ">
                                    <span class="text">แก้ไข</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
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