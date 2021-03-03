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

            <a href="./userProfile.php" class="btn btn-success btn-icon-split  ">
                <i class="fa fa-arrow-left btn-sm">
                </i>
            </a>

            <h3 class="m-0 font-weight-bold text-primary w-auto">&nbspประวัติการเดินทาง</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="./userProfile.php"><span class="text">ประวัติผู้ใช้งาน</span></a>
            <?php echo  " / " ?>
            <a href="#"><span class="text">ประวัติการเดินทาง</span></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="form-row">
                <div class="form-group col-md-10 d-flex align-items-center">
                    <h3 class="h3 mb-0 text-gray-800">ประวัติการเดินทาง</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>
                                สถานที่
                            </th>
                            <th>
                                วันที่ / เวลา
                            </th>
                            <th>
                                ลายละเอียดอื่นๆ
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
                                <a href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#myModal">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </span>
                                    <span class="text">ดูแผนที่</span>
                                </a>
                            </th>
                        </tr>

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
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-top modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">แผนที่</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div id="map-container-google-2" class="z-depth-1-half map-container ">
                    <iframe src="https://maps.google.com/maps?q=bangkok&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>



            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


<?php include_once("../layout/footer.php") ?>