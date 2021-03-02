<?php include_once("../layout/header.php") ?>

<div class="container-fluid">
    <div class="form-row">  
        <div class="form-group col-md-6 d-flex align-items-center">
            <h3 class="m-0 font-weight-bold text-primary w-auto">ข้อมูลส่วนตัว</h3>
        </div>
        <div class="form-group col-md d-flex align-items-center d-flex justify-content-end">
            <a href="../index/index.php"><span class="text">หน้าแรก</span></a>
            <?php echo  " / " ?>
            <a href="./userMain.php"><span class="text">ผู้ใช้งานทั้งหมด</span></a>
            <?php echo  " / " ?>
            <a href="#"><span class="text">ข้อมูลส่วนตัว</span></a>
        </div>
    </div>
</div>

<?php include_once("../layout/footer.php") ?>