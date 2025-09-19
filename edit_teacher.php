<?php
include("includes/config.php");

if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $query = "SELECT * FROM teachers WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $query);
    $teacher = mysqli_fetch_assoc($result);
}

if(isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone']; // Added phone field

    $updateQuery = "UPDATE teachers SET fname='$fname', lname='$lname', email='$email', phone='$phone' WHERE user_id='$user_id'";
    
    if(mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Updated successfully!'); window.location.href='show_teacher.php';</script>"; // Redirect to show_teacher.php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teacher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center text-primary">Edit Teacher</h2>
    <form method="post">
        <input type="hidden" name="user_id" value="<?= $teacher['user_id'] ?>">

        <div class="form-group">
            <label>First Name:</label>
            <input type="text" name="fname" class="form-control" value="<?= $teacher['fname'] ?>" required>
        </div>

        <div class="form-group">
            <label>Last Name:</label>
            <input type="text" name="lname" class="form-control" value="<?= $teacher['lname'] ?>" required>
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="<?= $teacher['email'] ?>" required>
        </div>

        <div class="form-group">
            <label>Phone Number:</label>  <!-- Added Phone Field -->
            <input type="text" name="phone" class="form-control" value="<?= $teacher['phone'] ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-primary btn-custom">Update</button>
        <a href="show_teacher.php" class="btn btn-secondary btn-custom mt-2">Cancel</a>
    </form>
</div>

</body>
</html>
