<?php
session_start();
include_once("../layout/header.php");
include_once("../../../dbconnect.php");
include_once("./manage.php");

$user = $_SESSION["user"];

$travelHistory = selectData(getTravelHistory($user[1]["user_id"]));

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
                <table class="table table-bordered" id="travelTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th hidden="true">
                                id
                            </th>
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
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 1; $i < sizeof($travelHistory); $i++) {
                        ?>
                            <tr>
                                <td hidden="true">
                                    <?php echo $travelHistory[$i]["travel_id"] ?>
                                </td>
                                <td>
                                    <?php 
                                        if($travelHistory[$i]["name"] == null){
                                            echo "ไม่รู้จัก";
                                        }
                                        else{
                                            echo $travelHistory[$i]["name"];
                                        }
                                    ?>
                                   
                                </td>
                                <td>
                                    <?php echo $travelHistory[$i]["time"] ?>
                                </td>
                                <td>
                                    <form class="group" method="POST" action='./travelHistoryDetail.php'>
                                        <button class="btn btn-success btn-icon-split" type="submit" id="map_detail" name="map_detail" value="<?php echo $travelHistory[$i]["travel_id"] ?>">
                                            <span class="icon text-white-50">
                                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            </span>
                                            <span class="text">ดูแผนที่</span>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        <?php } ?>

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
<div class="modal fade" id="openMap">
    <div class="modal-dialog modal-dialog-top modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">แผนที่</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="z-depth-1-half map-container ">
                    <iframe id="map" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="./manage.js"></script>
<script>
    $(document).ready(function() {
        $("#openMap").on('show.bs.modal', function(event) {
            var data = $(event.relatedTarget).data('genMap');
            console.log(data)
            $("button#genMap").click(function(event) {
                initMap(data);
                return false;
            });
        });

        $('#travelTable').DataTable({
            "order": [
                [0, "desc"]
            ]
        });
    });
</script>


<?php include_once("../layout/footer.php") ?>