<?php
session_start();
include_once("../layout/header.php");
include_once("../../../dbconnect.php");
include_once("./manage.php");

?>

<div class="container-fluid">
    <div class="form-row">
        <div class="form-group col-md-6 d-flex align-items-center">
            <a href="../user/travelHistory.php" class="btn btn-success btn-icon-split  ">
                <i class="fa fa-arrow-left btn-sm">
                </i>
            </a>
            <h3 class="m-0 font-weight-bold text-primary w-auto">&nbspประวัติการเดินทาง</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="../userProfile.php"><span class="text">ประวัติส่วนตัว</span></a>
            <?php echo  " / " ?>
            <a href="./travelHistory.php"><span class="text">ประวัติการเดินทาง</span></a>
            <?php echo  " / " ?>
            <a href="#"><span class="text">ประวัติการเดินทาง</span></a>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="form-row">
                <div class="d-sm-flex align-items-center justify-content-between mb-2">
                    <h3 class="h3 mb-0 text-gray-800">ประวัติการเดินทาง (แผนที่)</h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div id="map" style="width:100%;height:600px;"></div>
        </div>
    </div>
</div>

<script>
    function myMap() {
        const bangkok = {
            lat: 13.767538303741594,
            lng: 100.53834723654158
        };

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            center: bangkok,
        });

        const marker = new google.maps.Marker({
            position: bangkok,
            map: map,
        });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgHeklRPuTrkGTmpr33aB1vcyNfBB3FRE&callback=myMap&?query=,"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="./manage.js"></script>



<?php include_once("../layout/footer.php") ?>