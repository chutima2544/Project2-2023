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

    <title>View Details - User Information</title>
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
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    $sql_nofi = "SELECT * FROM get_repair 
                    LEFT JOIN repair ON get_repair.r_id = repair.r_id 
                    WHERE del_flg = '0'
                    ORDER BY get_r_id DESC ";
                    $result_nofi = mysqli_query($conn, $sql_nofi);
                    $num_rows = mysqli_fetch_array($result_nofi_count);
                    while ($row = mysqli_fetch_array($result_nofi)) {
                        $dateString = date('d-m-Y', strtotime($row['get_r_date_in']));
                        $date = DateTime::createFromFormat('d-m-Y', $dateString);
                        $formattedDate = $date->format('F / d / Y');
                    ?>

                        <div class="pt-4">
                            <div class="card">
                                <a class="dropdown-item align-items-center" href="detail_repair.php?id=<?= $row[0] ?>">
                                    <div class="card-body">
                                        <span class="small text-gray-500"><?= $formattedDate ?></span>
                                        <h6 class="font-weight-bold">หมายเลขแจ้งซ่อม : <button class="btn btn-primary" style="font-size: 15px;"><?= $row[0] ?></button></h6>
                                        <h6 class="font-weight-bold"><?= $row['get_r_detail'] ?></h6>
                                    </div>
                                </a>
                            </div>
                        </div>

                    <?php
                    }
                    ?>
                    <!-- Page Heading -->
                    <div class="pt-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="small text-gray-500"><?= $formattedDate ?></span>
                                <h6 class="font-weight-bold">หมายเลขแจ้งซ่อม : <button class="btn btn-primary" style="font-size: 15px;"><?= $row_nofi['get_r_id'] ?></button></h6>
                                <h6 class="font-weight-bold"><?= $row_nofi['get_r_detail'] ?></h6>
                            </div>
                        </div>
                    </div>


                    <div class="pt-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="small text-gray-500">December 7, 2019</span>
                                <h6 class="font-weight-bold">Garrett Winters</h6>
                                <h6 class="font-weight-bold">ปฏิเสธการส่งซ่อม</h6>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="small text-gray-500">December 7, 2019</span>
                                <h6 class="font-weight-bold">Garrett Winters</h6>
                                <h6 class="font-weight-bold">ปฏิเสธการส่งซ่อม</h6>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>