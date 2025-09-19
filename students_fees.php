<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("includes/config.php"); // Database connection

// Fetch students from tblstudents
$query = "SELECT StudentId, StudentName, RollId, fees_status FROM tblstudents";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Fees Status</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .paid {
            background-color: #d4edda;
            color: #155724;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .unpaid {
            background-color: #f8d7da;
            color: #721c24;
            padding: 5px 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Dashboard Button -->
    <div class="text-right mb-3">
        <a href="dashboard.php" class="btn btn-primary">
            <span class="glyphicon glyphicon-dashboard"></span> Go to Dashboard
        </a>
    </div>

    <h2 class="text-center text-primary">Student Fees Status</h2>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Roll No</th>
                <th>Fees Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['StudentId'] ?></td>
                    <td><?= $row['StudentName'] ?></td>
                    <td><?= $row['RollId'] ?></td>
                    <td>
                        <span class="<?= ($row['fees_status'] == 'Paid') ? 'paid' : 'unpaid' ?>">
                            <?= $row['fees_status'] ?>
                        </span>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
