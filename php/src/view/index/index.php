<?php 
session_start();

include_once("../layout/header.php");

include_once("../../../dbconnect.php");


?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
       
    </div>

    <!-- Content Row -->
    <?php /*<div class="row">
       
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    */?>

    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="form-row">
                        <div class="form-group col-md-8 d-flex align-items-center">
                            <h3 class="m-0 font-weight-bold text-primary w-auto">ข้อมูลเคส</h3>
                        </div>
                        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
                            <a href="../user/userMain.php" class="btn btn-primary align-left">
                                <span class="text">....</span> 
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
                                        วันที่
                                    </th>
                                    <th>
                                        
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
                                        ...
                                    </th>
                                </tr>

                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="form-row">
                        <div class="form-group col-md-10 d-flex align-items-center">
                            <h3 class="m-0 font-weight-bold text-primary w-auto">สถานที่ผู้คนไปมากที่สุด</h3>
                        </div>
                        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
                            <a href="#" class="btn btn-primary align-left" data-toggle="modal" data-target="#myModal">
                                <span class="text">....</span>
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
                                        ลายละเอียด
                                    </th>   
                                </tr>
                                <tr>
                                    <th>
                                        ...
                                    </th>
                                    <th>
                                        ...
                                    </th>
                                    
                                </tr>

                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include_once("../layout/footer.php") ?>