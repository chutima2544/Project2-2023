<?php
session_start();
include('../database/condb.php');

if (!isset($_SESSION['role_id'])) {
    header('Location:../home.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Edit Employee Information</title>
    <link rel="icon" type="image/x-icon" href="../img brand/anelogo.jpg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include('bar/sidebar.php');
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include('bar/topbar_admin.php');

                $m_id = $_GET['id'];
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <form action="action/edit_employee.php?id=<?= $e_id ?>" method="POST">
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">แก้ไขข้อมูลลูกค้า</h1>
                        </div>
                        <?php

                        $sql = "SELECT * FROM member WHERE del_flg = '0' AND m_id = '$m_id'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_array($result);
                        ?>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-1 col-form-label">ชื่อ</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="e_fname" id="staticEmail" value="<?= $row['m_fname'] ?>" placeholder="กรุณากรอกชื่อ">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">นามสกุล</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="e_lname" id="inputPassword" value="<?= $row['m_lname'] ?>" placeholder="กรุณากรอกนามสกุล">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-1 col-form-label">เบอร์โทรศัพท์</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="e_tel" id="inputPassword" value="<?= $row['m_tel'] ?>" placeholder="กรุณากรอกเบอร์โทร">
                            </div>
                            <label for="inputPassword" class="col-sm-1 col-form-label">email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="inputPassword" value="<?= $row['m_email'] ?>" placeholder="ไม่มีข้อมูล" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="col-form-label">ที่อยู่ :</label>
                            <textarea name="p_description" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $row['m_add'] ?></textarea>
                        </div>
                        <br>
                        <div class="text-center pt-4">
                            <button type="submit" class="btn btn-success" onclick="return confirm('คุฯต้องการแก้ไขข้อมูลพนักงานหรือไม่?\n*โปรดตรวจสอบข้อมูลให้ถูกต้อง')">ยืนยัน</button>
                        </div>

                    </div>
                </form>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>