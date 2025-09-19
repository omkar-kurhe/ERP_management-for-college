<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('includes/config.php');

if(strlen($_SESSION['alogin']) == "") {   
    header("Location: index.php"); 
    exit();
}

if(isset($_POST['submit']))
{
    $studentname = $_POST['fullname']; // Ensure correct field name
    $roolid = $_POST['rollid']; 
    $studentemail = $_POST['emailid']; 
    $gender = $_POST['gender']; 
    $classid = $_POST['class']; 
    $dob = $_POST['dob']; 
    $status = 1;

    try {
        $sql = "INSERT INTO tblstudents (StudentName, RollId, StudentEmail, Gender, ClassId, DOB, Status) 
                VALUES (:studentname, :roolid, :studentemail, :gender, :classid, :dob, :status)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':studentname', $studentname, PDO::PARAM_STR);
        $query->bindParam(':roolid', $roolid, PDO::PARAM_STR);
        $query->bindParam(':studentemail', $studentemail, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':classid', $classid, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':status', $status, PDO::PARAM_INT);

        if($query->execute()) {
            $_SESSION['msg'] = "Payment successful! Student added to the database.";
            header("Location: success.php"); // Redirect to a success page
            exit();
        } else {
            $_SESSION['error'] = "Database insertion failed.";
        }
    } catch (PDOException $e) {
        die("Database Error: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMS Admin | Student Payment</title>
    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/font-awesome.min.css">
    <link rel="stylesheet" href="css1/main.css">
</head>
<body>
    <div class="main-wrapper">
        <?php include('includes/topbar.php'); ?>
        <div class="content-wrapper">
            <div class="content-container">
                <?php include('includes/leftbar.php'); ?>
                <div class="main-page">
                    <div class="container-fluid">
                        <div class="row page-title-div">
                            <div class="col-md-6">
                                <h2 class="title">Student Payment</h2>
                            </div>
                        </div>
                        <div class="row breadcrumb-div">
                            <div class="col-md-6">
                                <ul class="breadcrumb">
                                    <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="active">Payment</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-title">
                                            <h5>Complete Student Payment</h5>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <?php if(isset($_SESSION['msg'])) { ?>
                                            <div class="alert alert-success"><?php echo htmlentities($_SESSION['msg']); ?></div>
                                            <?php unset($_SESSION['msg']); } ?>
                                        <?php if(isset($_SESSION['error'])) { ?>
                                            <div class="alert alert-danger"><?php echo htmlentities($_SESSION['error']); ?></div>
                                            <?php unset($_SESSION['error']); } ?>

                                        <form class="form-horizontal" method="post">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="fullname" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Roll ID</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="rollid" class="form-control" required maxlength="5">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Email ID</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="emailid" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Gender</label>
                                                <div class="col-sm-10">
                                                    <input type="radio" name="gender" value="Male" required checked> Male
                                                    <input type="radio" name="gender" value="Female" required> Female
                                                    <input type="radio" name="gender" value="Other" required> Other
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Class</label>
                                                <div class="col-sm-10">
                                                    <select name="class" class="form-control" required>
                                                        <option value="">Select Class</option>
                                                        <?php
                                                        $sql = "SELECT * FROM tblclasses";
                                                        $query = $dbh->prepare($sql);
                                                        $query->execute();
                                                        $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                        if ($query->rowCount() > 0) {
                                                            foreach ($results as $result) {
                                                        ?>
                                                        <option value="<?php echo htmlentities($result->id); ?>">
                                                            <?php echo htmlentities($result->ClassName); ?> Section-<?php echo htmlentities($result->Section); ?>
                                                        </option>
                                                        <?php }} ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">DOB</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="submit" class="btn btn-primary">Submit Payment</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
    </div>

    <script src="js1/jquery/jquery-2.2.4.min.js"></script>
    <script src="js1/bootstrap/bootstrap.min.js"></script>
    <script src="js1/main.js"></script>
</body>
</html>
