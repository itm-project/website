<?php
session_start();
include_once("../layout/header.php");
include_once("../../../dbconnect.php");
include_once("./manage.php");

if(isset($_POST["user_id"]))
{
    $user_id = $_POST["user_id"];
    $user = selectData(getUser($user_id));
    $_SESSION["user"] = $user;
}

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
            <a href="../user/userMain.php" class="btn btn-success btn-icon-split  ">
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
                                <img src="../../../etc/img/default.jpg" class="rounded-circle border border-dark" width="100%" alt="..." >
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <form class="group" method="POST" action='./travelHistory.php' id="user_id" name="user_id" value="<?php echo $user[1]["user_id"] ;?>" >
                                        <a href="./travelHistory.php" class="btn btn-success btn-icon-split">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-car" aria-hidden="true"></i>
                                            </span>
                                            <span class="text">ประวัติการเดินทาง</span>
                                        </a>
                                    </form>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <form class="group" method="POST" action='./userProfileEdit.php'>
                                        <a href="./userProfileEdit.php" class="btn btn-warning btn-icon-split " id="user_id" name="user_id" value="<?php echo $user[1]["user_id"] ;?>">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </span>
                                            <span class="text">แก้ไขประวัติ</span>
                                        </a>
                                    </form>
                                </div>
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
                            <input type="text" class="form-control disable" id="inputEmail4" disabled="true" value="<?php echo $user[1]["username"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label">รหัสผ่าน</label>
                            <input type="text" class="form-control" id="inputPassword4" disabled="true" value="<?php echo $user[1]["password"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="inputEmail4" disabled="true" value="<?php echo $user[1]["name"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" id="inputPassword4" disabled="true" value="<?php echo $user[1]["lastname"] ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="text" class="form-label">โทรศัพท์</label>
                            <input type="text" class="form-control" id="inputPassword4" disabled="true" value="<?php echo $user[1]["phone"] ?>">
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
                            <input type="text" class="form-control" id="inputAddress" disabled="true" value="<?php echo $user[1]["number"] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputAddress2" class="form-label">หมู่ที่</label>
                            <input type="text" class="form-control" id="inputAddress2" disabled="true" value="<?php echo $user[1]["moo"] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputAddress2" class="form-label">ถนน</label>
                            <input type="text" class="form-control" id="inputAddress2" disabled="true" value="<?php echo $user[1]["road"] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputCity" class="form-label">ตำบล / แขวง</label>
                            <br>
                            <input type="text" class="form-control" id="inputAddress2" disabled="true" value="<?php echo $user[1]["TambonThai"] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputState" class="form-label">อำเภอ / เขต</label>
                            <br>
                            <input type="text" class="form-control" id="inputAddress2" disabled="true" value="<?php echo $user[1]["DistrictThai"] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputState" class="form-label">จำหวัด</label>
                            <br>
                            <input type="text" class="form-control" id="inputAddress2" disabled="true" value="<?php echo $user[1]["ProvinceThai"] ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputZip" class="form-label">รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" id="inputZip" disabled="true" value="<?php echo $user[1]["postcode"] ?>">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include_once("../layout/footer.php") ?>