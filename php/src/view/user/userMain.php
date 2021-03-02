<?php include_once("../layout/header.php") ?>

<div class="container-fluid">


    <div class="form-row">
        <div class="form-group col-md-10 d-flex align-items-center">
            <h3 class="m-0 font-weight-bold text-primary w-auto">ผู้ใช้งานทั้งหมด</h3>
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
                    <a href="#" class="btn btn-primary align-left" data-toggle="modal" data-target="#myModal">
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
                                <a href="./travelHistory.php" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-car" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">ประวัติการเดินทาง</span>
                                </a>
                                <a href="./userProfile.php" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-address-book" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">ข้อมูล</span>
                                </a>
                                <a href="#" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">ลบ</span>
                                </a>

                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>

<!-------Modal-------->
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Modal body..
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<?php include_once("../layout/footer.php") ?>