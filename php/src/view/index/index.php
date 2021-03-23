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
     <div class="row">
       
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Number of people infected
                                <?php 
                                    $covid_total_url = "https://covid19.th-stat.com/api/open/today";
                                    $covid_total_url2json = file_get_contents($covid_total_url);
                                    $DATA_JSON_COVID19_TOTAL = json_decode($covid_total_url2json, true);
                                ?>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $DATA_JSON_COVID19_TOTAL["Confirmed"];
                            ?></div>
                            <div class="text-xs font-weight-bold text-primary text-lowvercase mb-1"> today + <?php echo $DATA_JSON_COVID19_TOTAL["NewConfirmed"];?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-virus fa-2x text-gray-300"></i>
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
                                Number of people Recovered
                                <?php 
                                    $covid_total_url = "https://covid19.th-stat.com/api/open/today";
                                    $covid_total_url2json = file_get_contents($covid_total_url);
                                    $DATA_JSON_COVID19_TOTAL = json_decode($covid_total_url2json, true);
                                ?>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $DATA_JSON_COVID19_TOTAL["Recovered"];?></div>
                            <div class="text-xs font-weight-bold text-primary text-lowvercase mb-1"> today + <?php echo $DATA_JSON_COVID19_TOTAL["NewRecovered"];?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-heartbeat fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">In the hospital
                            <?php 
                                    $covid_total_url = "https://covid19.th-stat.com/api/open/today";
                                    $covid_total_url2json = file_get_contents($covid_total_url);
                                    $DATA_JSON_COVID19_TOTAL = json_decode($covid_total_url2json, true);
                                ?>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $DATA_JSON_COVID19_TOTAL["Hospitalized"];?></div>
                                    <div class="text-xs font-weight-bold text-primary text-lowvercase mb-1"> today + <?php echo $DATA_JSON_COVID19_TOTAL["NewHospitalized"];?></div>
                                </div>
                                <div class="col">
                                    <!-- <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hospital-alt fa-2x text-gray-300"></i>
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
                            Deaths</div>
                            <?php 
                                    $covid_total_url = "https://covid19.th-stat.com/api/open/today";
                                    $covid_total_url2json = file_get_contents($covid_total_url);
                                    $DATA_JSON_COVID19_TOTAL = json_decode($covid_total_url2json, true);
                                ?>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $DATA_JSON_COVID19_TOTAL["Deaths"];?></div>
                            <div class="text-xs font-weight-bold text-primary text-lowvercase mb-1"> today + <?php echo $DATA_JSON_COVID19_TOTAL["NewDeaths"];?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-skull-crossbones fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


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
                                        วันที่
                                    </th>
                                    <th>
                                        จำนวนผู้ติดเชื้อ
                                    </th>
                                    <th>
                                        จำนวนผู้ที่หายป่วย
                                    </th>
                                    <th>
                                        จำนวนผู้ที่กำลังรักษา
                                    </th>
                                    <th>
                                        จำนวนผู้เสียชีวิต
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                    <?php 
                                    $covid_total_url = "https://covid19.th-stat.com/api/open/timeline";
                                    $covid_total_url2json = file_get_contents($covid_total_url);
                                    $DATA_JSON_COVID19_TOTAL = json_decode($covid_total_url2json, true);
                                    ?>
                                    <?php
                                    foreach($DATA_JSON_COVID19_TOTAL["Data"] as $value){
                                        $date = new DateTime($value["Date"]);
                                        echo $date->format("d/m/Y")."</br>";
                                    }
                                    ?>
                                    </th>
                                    <th>
                                    <?php 
                                    $covid_total_url = "https://covid19.th-stat.com/api/open/timeline";
                                    $covid_total_url2json = file_get_contents($covid_total_url);
                                    $DATA_JSON_COVID19_TOTAL = json_decode($covid_total_url2json, true);
                                    ?>
                                    <?php
                                    foreach($DATA_JSON_COVID19_TOTAL["Data"] as $value){
                                        echo $value["NewConfirmed"]."</br>";
                                    }
                                    ?>
                                    </th>
                                    <th>
                                    <?php 
                                    $covid_total_url = "https://covid19.th-stat.com/api/open/timeline";
                                    $covid_total_url2json = file_get_contents($covid_total_url);
                                    $DATA_JSON_COVID19_TOTAL = json_decode($covid_total_url2json, true);
                                    ?>
                                    <?php
                                    foreach($DATA_JSON_COVID19_TOTAL["Data"] as $value){
                                        echo $value["NewRecovered"]."</br>";
                                    }
                                    ?>
                                    </th>
                                    <th>
                                    <?php 
                                    $covid_total_url = "https://covid19.th-stat.com/api/open/timeline";
                                    $covid_total_url2json = file_get_contents($covid_total_url);
                                    $DATA_JSON_COVID19_TOTAL = json_decode($covid_total_url2json, true);
                                    ?>
                                    <?php
                                    foreach($DATA_JSON_COVID19_TOTAL["Data"] as $value){
                                        echo $value["NewHospitalized"]."</br>";
                                    }
                                    ?>
                                    </th>
                                    <th>
                                    <?php 
                                    $covid_total_url = "https://covid19.th-stat.com/api/open/timeline";
                                    $covid_total_url2json = file_get_contents($covid_total_url);
                                    $DATA_JSON_COVID19_TOTAL = json_decode($covid_total_url2json, true);
                                    ?>
                                    <?php
                                    foreach($DATA_JSON_COVID19_TOTAL["Data"] as $value){
                                        echo $value["NewDeaths"]."</br>";
                                    }
                                    ?>
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
                            <h3 class="m-0 font-weight-bold text-primary w-auto">ข้อมูลผู้ติดเชื้อ ณ วันที่ 14/01/2021</h3>
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
                                        จังหวัด
                                    </th>
                                    <th>
                                        จำนวนผู้ติดเชื้อ
                                    </th>   
                                </tr>
                                <tr>
                                    <th>
                                    <?php 
                                    $covid_province_url = "https://covid19.th-stat.com/api/open/cases/sum";
                                    $covid_province_url2json = file_get_contents($covid_province_url);
                                    $DATA_JSON_COVID19_PROVINCE = json_decode($covid_province_url2json, true);
                                    $DATA_PROVINCE = array_keys($DATA_JSON_COVID19_PROVINCE["Province"]);
                                    $DATA_VALUES_PROVINCE = array_values($DATA_JSON_COVID19_PROVINCE["Province"]);
                                    foreach($DATA_PROVINCE as $a){
                                        echo $a."</br>";
                                    }
                                    ?>
                                    
                                    </th>
                                    <th>
                                    <?php
                                    foreach($DATA_VALUES_PROVINCE as $value){
                                        echo $value."</br>";
                                    }
                                    ?>
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