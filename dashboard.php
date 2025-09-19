<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('php-attendance/db-connect');
if(strlen($_SESSION['alogin'])=="")
{   header("Location: index.php"); }else{
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <title>Student Result Management System | Dashboard</title> -->
        <link rel="stylesheet" href="css1/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css1/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" href="css1/animate-css/animate.min.css" media="screen" >
        <link rel="stylesheet" href="css1/lobipanel/lobipanel.min.css" media="screen" >
        <link rel="stylesheet" href="css1/toastr/toastr.min.css" media="screen" >
        <link rel="stylesheet" href="css1/icheck/skins/line/blue.css" >
        <link rel="stylesheet" href="css1/icheck/skins/line/red.css" >
        <link rel="stylesheet" href="css1/icheck/skins/line/green.css" >
        <link rel="stylesheet" href="css1/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">
              <?php include('includes/topbar.php');?>
            <div class="content-wrapper">
                <div class="content-container">

                    <?php include('includes/leftbar.php');?>  

                    <div class="main-page">
                        <div class="container-fluid">
                            <div class="row page-title-div">
                                <div class="col-sm-6">
                                    <h2 class="title">Dashboard</h2>
                                  
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                      
                        </div>
                        <!-- /.container-fluid -->

                        <section class="section">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                        <a class="dashboard-stat bg-primary" href="manage-students.php">

                                        
<?php 
$sql1 ="SELECT StudentId from tblstudents ";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalstudents=$query1->rowCount();
?>

                                        
                                            <span class="name">Regd Users</span>
                                            <span >....</span>
                                            <span class="bg-icon"><i class="fa fa-users"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                                        <a class="dashboard-stat bg-danger" href="manage-subjects.php">                                           
                                            <span class="name">Subjects Listed</span>
                                            <span >....</span>
                                            <span class="bg-icon"><i class="fa fa-ticket"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:1%;">
                                        <a class="dashboard-stat bg-warning" href="manage-classes.php">  
                                            <span class="name">Total classes listed</span>
                                            <span >....</span>
                                            <span class="bg-icon"><i class="fa fa-bank"></i></span>
                                        </a>
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="margin-top:1%">
                                        <a class="dashboard-stat bg-success" href="manage-results.php">
                                            <span class="name">Results Declared</span>
                                            <span >....</span>
                                            <span class="bg-icon"><i class="fa fa-file-text"></i></span>
                                        </a>
                                        
                                        
                                        <!-- /.dashboard-stat -->
                                    </div>
                                    <!-- /.col-lg-3 col-md-3 col-sm-6 col-xs-12 -->
                                    
                                    <!-- attendance -->
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 1%;">
                                        <a class="dashboard-stat bg-primary" href="php-attendance/index.php" >
                                        <?php 
$sql4="SELECT  distinct id from  students_tbl ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$attendance=$query4->rowCount();
?>
                                        
                                        <span class="name">Attendance</span>
                                        <span >....</span>
                                        <span class="bg-icon"><i class="fa fa-users"></i></span>

                                        </a>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 1%;">
                                        <a class="dashboard-stat bg-warning" href="add_teacher.php" >                                        
                                        <span class="name">Add_Teachers</span>
                                        <span >....</span>
                                        <span class="bg-icon"><i class="fa fa-users"></i></span>

                                        </a>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 1%;">
                                        <a class="dashboard-stat bg-danger" href="show_teacher.php" >                                        
                                        <span class="name">Show_Teacher</span>
                                        <span >....</span>
                                        <span class="bg-icon"><i class="fa fa-users"></i></span>

                                        </a>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 1%;">
                                        <a class="dashboard-stat bg-success" href="bonafide/bonafide.html" >                                        
                                        <span class="name">Student Bonafide</span>
                                        <span >....</span>
                                        <span class="bg-icon"><i class="fa fa-file-text"></i></span>

                                        </a>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top: 1%;">
                                        <a class="dashboard-stat bg-success" href="students_fees.php" >                                        
                                        <span class="name">Student Fees Status</span>
                                        <span >....</span>
                                        <span class="bg-icon"><i class="fa fa-file-text"></i></span>

                                        </a>
                                    </div>

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    
                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js1/jquery/jquery-2.2.4.min.js"></script>
        <script src="js1/jquery-ui/jquery-ui.min.js"></script>
        <script src="js1/bootstrap/bootstrap.min.js"></script>
        <script src="js1/pace/pace.min.js"></script>
        <script src="js1/lobipanel/lobipanel.min.js"></script>
        <script src="js1/iscroll/iscroll.js"></script>

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js1/prism/prism.js"></script>
        <script src="js1/waypoint/waypoints.min.js"></script>
        <script src="js1/counterUp/jquery.counterup.min.js"></script>
        <script src="js1/amcharts/amcharts.js"></script>
        <script src="js1/amcharts/serial.js"></script>
        <script src="js1/amcharts/plugins/export/export.min.js"></script>
        <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
        <script src="js1/amcharts/themes/light.js"></script>
        <script src="js1/toastr/toastr.min.js"></script>
        <script src="js1/icheck/icheck.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js1/main.js"></script>
        <script src="js1/production-chart.js"></script>
        <script src="js1/traffic-chart.js"></script>
        <script src="js1/task-list.js"></script>
        <script>
            $(function(){

                // Counter for dashboard stats
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                // Welcome notification
                toastr.options = {
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": false,
                  "progressBar": false,
                  "positionClass": "toast-top-right",
                  "preventDuplicates": false,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "timeOut": "5000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut"
                }
                toastr["success"]( "Welcome to ERP System!");

            });
        </script>
        
    </body>
</html>
<?php } ?>
