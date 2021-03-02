<?php include_once("../layout/header.php") ?>


<div class="container-fluid">
<div class="form-row">
        <div class="form-group col-md-6 d-flex align-items-center">
            <h3 class="m-0 font-weight-bold text-primary w-auto">ข่าวสาร</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="./userMain.php"><span class="text">ข่าวสาร</span></a>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header py-3">
            <div class="form-row">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">ข่าวสาร</h1>
                </div>
                <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
                    <a href="#" class="btn btn-primary align-left" data-toggle="modal" data-target="#myModal">
                        <span class="text">เพิ่มข่าวสาร</span>
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
                                หัวข้อ
                            </th>
                            <th>
                                ลายละเอียด
                            </th>
                            <th>
                                อื่นๆ
                            </th>
                        </tr>
                        <tr>
                            <th>
                                ...
                            </th>
                            <th>
                                ...
                            </th>
                            <th>
                                <a href="#" class="btn btn-warning btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">แก้ไข</span>
                                </a>
                                <a href="#" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">ลบ</span>
                                </a>
                            </th>
                        </tr>

                    </thead>
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