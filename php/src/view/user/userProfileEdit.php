<?php include_once("../layout/header.php") ?>

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
                        <div class="col-md-6 mb-3">
                            <label for="inputEmail4" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputPassword4" class="form-label">รหัสผ่าน</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputEmail4" class="form-label">ชื่อ</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputPassword4" class="form-label">นามสกุล</label>
                            <input type="password" class="form-control" id="inputPassword4">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputAddress" class="form-label">เลขที่</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputAddress2" class="form-label">หมู่ที่</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputAddress2" class="form-label">ถนน</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Road">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputCity" class="form-label">ตำบล / แขวง</label>
                            <br>
                            <select name="" id="">
                                <option value="">...</option>
                                <option value="">ตำบล</option>
                                <option value="">แขวง</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputState" class="form-label">อำเภอ / เขต</label>
                            <br>
                            <select name="" id="">
                                <option value="">...</option>
                                <option value="">อำเภต</option>
                                <option value="">เขต</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputState" class="form-label">จำหวัด</label>
                            <br>
                            <select name="" id="">
                                <option value="">...</option>
                                <option value="">จังหวัด</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="inputZip" class="form-label">รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" id="inputZip">
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



<?php include_once("../layout/footer.php") ?>