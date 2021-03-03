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
                <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
                    <a href="#" class="btn btn-primary align-left btn-icon-split" data-toggle="modal" data-target="#myModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">เพิ่มผู้ใช้งาน</span>
                    </a>
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
                        <tr>
                            <th>
                                ...
                            </th>
                            <th>
                                ...
                            </th>
                            <th>
                                ...
                            </th>
                            <th>

                                <a href="./userProfile.php" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-address-book" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">ข้อมูล</span>
                                </a>
                                <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">ลบ</span>
                                </a>

                            </th>
                        </tr>
                        <?php /*
                        <tr>
                            <th>
                                ...
                            </th>
                            <th>
                                ...
                            </th>
                            <th>
                                ...
                            </th>
                            <th>
                                <a href="./travelHistory.php" class="btn btn-success " data-toggle="tooltip" data-placement="top">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-car" aria-hidden="true"></i>
                                    </span>
                                </a>
                                <a href="./userProfile.php" class="btn btn-warning ">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-address-book" aria-hidden="true"></i>
                                    </span>
                                </a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </a>

                            </th>
                        </tr>
                        */ ?>
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
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-top modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มผู้ใช้งาน</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
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
                        <select name="" id="" class="form-control">
                            <option value="">...</option>
                            <option value="">ตำบล</option>
                            <option value="">แขวง</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputState" class="form-label">อำเภอ / เขต</label>
                        <br>
                        <select name="" id="" class="form-control">
                            <option value="">...</option>
                            <option value="">อำเภต</option>
                            <option value="">เขต</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="inputState" class="form-label">จำหวัด</label>
                        <br>
                        <select name="" id="" class="form-control">
                            <option value="">...</option>
                            <option value="">จังหวัด</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="inputZip" class="form-label">รหัสไปรษณีย์</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                    <div class="input-group mb-3 col-12">
                        <div class="input-group-prepend">
                            <span class="input-group-text">รูปภาพ</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input-multiple" id="inputGroupFile01">
                            <label class="custom-file-label " for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">เพิ่มผู้ใช้งาน</button>
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
                <span type="text">ท่านต้องการลบผู้ใช้งาน .... ใช่หรือไม่</span>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยืนยัน</button>
            </div>

        </div>
    </div>
</div>


<?php include_once("../layout/footer.php") ?>