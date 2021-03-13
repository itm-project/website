<?php include_once("../layout/header.php");
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
            <div class="form-row">
                <div class="form-group col-md-10 d-flex align-items-center">
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
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
                        <tr>
                            <?php
                            $notification = selectData(getAllNotification());
                            for ($i = sizeof($notification) - 1; $i > 0; $i--) {

                            ?>
                                <th>
                                    <?php echo $notification[$i]["name"] ?>
                                </th>
                                <th>
                                    <?php echo $notification[$i]["detail"] ?>
                                </th>
                                <th>
                                    <?php echo $notification[$i]["date"] ?>
                                </th>
                                <th>
                                    <a href="#" class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#editModal">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </span>
                                        <span class="text">แก้ไข</span>

                                    </a>
                                    <a href="#" class="btn btn-danger btn-icon-split" data-toggle="modal" data-target="#deleteModal">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                        <span class="text">ลบ</span>
                                    </a>
                                </th>
                        </tr>
                    <?php } ?>
                    </thead>
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
                <h4 class="modal-title">เพิ่มการแจ้งเตือน</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="inputEmail4" class="form-label">หัวข้อ</label>
                        <input type="text" class="form-control" id="inputEmail4">
                    </div>
                    <div class="mb-3">
                        <label for="inputEmail4" class="form-label">ลายละเอียด</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">เพิ่มการแจ้งเตือน</button>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-dialog-top modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขการแจ้งเตือน .....</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="inputEmail4" class="form-label">หัวข้อ</label>
                            <input type="text" class="form-control" id="inputEmail4">
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail4" class="form-label">ลายละเอียด</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">แก้ไข</button>
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
                <span type="text">ท่านต้องการลบผู้ข่าว .... ใช่หรือไม่</span>
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