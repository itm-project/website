<?php
/*session_start();

// if (!isset($_SESSION[md5("username")])) {
//     header("location:../../index.php");
// } else {
//     echo '<h3>Login Success, Welcome - ' . $_SESSION[md5("username")] . '</h3>';
//     echo '<br /><br /><a href="../../logout.php">Logout</a>';
// }

include_once("./../../query/query.php");

$USER = $_SESSION[md5('user')];

// print_r($USER);

$uid = $USER[1]['uid'];

// print("<br>" . $uid);

$GET_USER = getUser($uid);
$DID = $GET_USER[1]['DID'];
$UserDepartment = getUserDepartment($DID);
$fid = $UserDepartment[1]['fid'];
$UserFaculty = getUserFaculty($fid);
$FACULTY = getFaculty();
$DEPARTMENT = getDepartment($fid);
$AD3 = $GET_USER[1]['AD3ID'];
print($AD3);
$UserSubDistrinct = getUserSubDistrinct($AD3);
$AD2 = $UserSubDistrinct[1]['AD2ID'];
print($AD2);
$UserDistrinct = getUserDistrinct($AD2);
$AD1 = $UserDistrinct[1]['AD1ID'];
$UserProvince = getUserProvince($AD1);


// print_r($GET_USER);
// print_r($DEPARTMENTUSER[1]['department']);
// echo "<br>fid = " . $fid . "<br>";
// print_r($FACULTYUSER[1]['fname']);

$icon = $USER[1]['picture'];
// echo "<br>filename : " . $icon;
if ($icon == "default.png") {
    echo "yes";
    $userId = 0;
    $icon = "default.png";
} else {
    $userId = $USER[1]['uid'];
    $icon = $USER[1]['picture'];
}*/
include_once("./src/view/layout/header.php");


?>
<!DOCTYPE html>
<html lang="en">

<style>
    #img-profile {
        width: 250px;
        height: 250px;
        margin: auto;
    }
</style>

<body>
    <div class="wrapper">

        <?php
        if ($USER[1]['typeid'] == 1) {
            include_once("../layout/SidebarAdmin.php");
        } else {
            include_once("../layout/Sidebar.php");
        }
        ?>
        <div class="main">
            <?php include_once("../layout/Topbar.php"); ?>
            <div class="container">

                <div class="row">
                    <div class="col-xl-12 col-12 mb-4">
                        <div class="card">
                            <div class="card-header card-bg">
                                <div class="row">
                                    <div class="col-12">
                                        <span class="link-active font-weight-bold" style="color:<?= $color ?>;">บัญชีผู้ใช้</span>
                                        <span style="float:right;">
                                            <i class="fas fa-bookmark"></i>
                                            <a class="link-path" href="#">หน้าแรก</a>
                                            <span> > </span>
                                            <a class="link-path link-active" href="#" style="color:<?= $color ?>;">บัญชีผู้ใช้</a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-12 mb-4">
                        <div class="row">
                            <div class="col-xl-12 col-12">
                                <div class="card">
                                    <div class="card-header card-bg font-weight-bold" style="color:<?= $color ?>;">
                                        รูปโปรไฟล์
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <img class="card-img img-radius img-profile rounded-circle center" id="img-profile" <?php
                                                                                                                                if ($icon == "../../img/user/0/default.png") {
                                                                                                                                    if ($GET_USER[1]['TID'] == "1")
                                                                                                                                        echo 'src="../../img/user/0/defaultM.png" />';
                                                                                                                                    else
                                                                                                                                        echo 'src="../../img/user/0/defaultW.png" />';
                                                                                                                                } else {
                                                                                                                                    echo 'src="../../img/user/' . $userId . '/' . $icon . ".png" . '" />';
                                                                                                                                }
                                                                                                                                ?> </div>
                                            <div class="row mt-3">
                                                <div class="col-xl-12 col-12">
                                                    <center>
                                                        <button type="button" id="edit_photo" class="btn btn-primary btn-md mb-1 tt" title='เปลี่ยนรูปโปรไฟล์' uid="<?php echo $USER[1]['uid']; ?>">
                                                            <i class="align-middle fab my-1 fas fa-image squared"></i>
                                                        </button>
                                                        <button type="button" id="edit_info" name="edit_info" class="btn btn-warning mb-1 btn-md-squared tt" title='เปลี่ยนข้อมูลบัญชี' data-toggle="modal" data-target="#editModal">
                                                            <i class="align-middle fab my-1 fas fa-edit squared"></i>
                                                        </button>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-8 col-12 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="form-row">
                                        <div class="form-group col-md-10 align-middle">
                                            <h5 class="card-title ">รายละเอียดบัญชี</h5>
                                        </div>
                                        <div class="form-group col-md-2 d-flex align-items-center d-flex justify-content-end">
                                            <button type="button" id="btn_add" data-toggle="modal" data-target="#addModal" class="btn btn-success btn-md-squared mb-1  pass_edit tt" title='เพิ่มข้อมูลการเดินทาง'>
                                                <i class="align-middle" data-feather="plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>คำนำหน้า</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="title" value="<?php echo $GET_USER[1]['title']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class=" row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>ชื่อ</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="firstname" value="<?php echo $GET_USER[1]['firstname']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>นามสกุล</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="lastname" value="<?php echo $GET_USER[1]['lastname'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>อีเมล์</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="mail" value="<?php echo $GET_USER[1]['email']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>โทรศัพท์</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="tel" value="<?php echo $GET_USER[1]['tel'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>วันเกิด</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="birthday" value="<?php echo $GET_USER[1]['birthday'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>ชื่อบัญชี</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="username" value="<?php echo $GET_USER[1]['username'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>คณะ</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="ufaculty" value="<?php echo $UserFaculty[1]['fname'] ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>สาขา</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="udepartment" value="<?php echo $UserDepartment[1]['department']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>ที่อยู่</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="address" value="<?php echo $GET_USER[1]['address']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>จังหวัด</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="address" value="<?php echo $UserProvince[1]['Province']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>อำเภอ</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="address" value="<?php echo $UserDistrinct[1]['Distrinct']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-xl-3 col-12 text-right">
                                            <span>ตำบล</span>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <input type="text" class="form-control" id="address" value="<?php echo $UserSubDistrinct[1]['subDistrinct']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                                            <span>สิทธิการเข้าใช้งาน</span>
                                        </div>
                                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" disabled <?php if ($USER[1]['IsAdmin'] == 1) echo "checked"; ?>>
                                                <label class="form-check-label" for="inlineCheckbox1">ผู้ดูแลระบบ</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" disabled <?php if ($USER[1]['IsStudent'] == 1) echo "checked"; ?>>
                                                <label class="form-check-label" for="inlineCheckbox1">นิสิต</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="research" name="research" value="option2" disabled <?php if ($USER[1]['IsPersonnel'] == 1) echo "checked"; ?>>
                                                <label class="form-check-label" for="inlineCheckbox2">บุคลลากร</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" id="operator" name="operator" value="option3" disabled <?php if ($USER[1]['IsUser'] == 1) echo "checked"; ?>>
                                                <label class="form-check-label" for="inlineCheckbox3">บุคคลภายนอก</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include("../layout/Footer.php");
        ?>
        
</body>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลส่วนตัว</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>คำนำหน้า<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="e_fname" name="e_fname" placeholder="กรุณากรอกคำนำหน้า" required="" value="<?php echo $GET_USER[1]['title']; ?>" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>ชื่อ<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="e_fname" name="e_fname" placeholder="กรุณากรอกชื่อ" required="" value="<?php echo $GET_USER[1]['firstname']; ?>" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>นามสกุล<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="e_fname" name="e_fname" placeholder="กรุณากรอกนามสกุล" required="" value="<?php echo $GET_USER[1]['lastname']; ?>" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>เบอร์โทรศัพท์<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="e_fname" name="e_fname" placeholder="กรุณากรอกเบอร์โทรศัพท์" required="" value="<?php echo $GET_USER[1]['tel']; ?>" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>วันเกิด<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="date" class="form-control" id="e_fname" name="e_fname" placeholder="กรุณากรอกวันเกิด" required="" value="<?php echo $GET_USER[1]['birthday']; ?>" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>บัญชีผู้ใช้<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="e_fname" name="e_fname" placeholder="กรุณากรอกบัญชีผู้ใช้" required="" value="<?php echo $GET_USER[1]['username']; ?>" disabled>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>คณะ<span class="text-danger"> *</span></span>
                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <select name="faculty_id" id="faculty" class="form-control">
                        <option value="">เลือกคณะ</option>
                            <?php foreach($FACULTY as $faculty) { 
                                echo "<option value=".$faculty['fid'].">".$faculty['fname']."</option>";
                            }?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>สาขา<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <select name="department_id" id="department" class="form-control">
                            <option value="">เลือกสาขา</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>จังหวัด<span class="text-danger"> *</span></span>
                    </div>

                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <select name="AD1ID" id="province" class="form-control">
                        <option value="">เลือกจังหวัด</option>
                            <?php $Provinces = getProvince();
                            foreach($Provinces as $Province) { 
                                echo "<option value=".$Province['AD1ID'].">".$Province['Province']."</option>";
                            }?>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>เลือกอำเภอ<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <select name="AD2ID" id="distrinct" class="form-control">
                            <option value="">เลือกอำเภอ</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>เลือกตำบล<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <select name="AD3ID" id="subdistrinct" class="form-control">
                            <option value="">เลือกตำบล</option>
                        </select>
                    </div>
                </div>

                

                <div class="row mb-4">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-right">
                        <span>ที่อยู่<span class="text-danger"> *</span></span>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="e_fname" name="e_fname" placeholder="กรุณากรอกที่อยู่" required="" value="<?php echo $GET_USER[1]['address']; ?>" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" <?php if ($USER[1]['IsAdmin'] == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="inlineCheckbox1">ผู้ดูแลระบบ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="admin" name="admin" value="option1" <?php if ($USER[1]['IsStudent'] == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="inlineCheckbox1">นิสิต</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="research" name="research" value="option2" <?php if ($USER[1]['IsPersonnel'] == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="inlineCheckbox2">บุคลลากร</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="operator" name="operator" value="option3" <?php if ($USER[1]['IsUser'] == 1) echo "checked"; ?>>
                        <label class="form-check-label" for="inlineCheckbox3">บุคคลภายนอก</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" id="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="editSave" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/jquery.min.js"></script>
<script src="../../assets/scriptFacDe.js"></script>
<script src="../../assets/scriptAddress.js"></script>