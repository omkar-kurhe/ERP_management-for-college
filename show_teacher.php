<?php 
include("includes/config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Teacher Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="myscript.js"></script>
</head>
<body>
<center>
    <br>    
    <a type="button" class='btn btn-success' href="dashboard.php" style='color:white'>
        <span class='glyphicon glyphicon-arrow-left' style='padding-right:5px'></span> Go To Dashboard
    </a>    
    <a type="button" class='btn btn-info' href="index.php" style='color:white'>Log Out</a>                 
</center>

<div class="container">
    <h2 class="text-center">Teacher Details</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = "SELECT * FROM teachers";
            $res = mysqli_query($conn, $query);
            if(mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_assoc($res)) { ?>
                    <tr>
                        <td><?= $row['user_id'] ?></td>
                        <td><?= $row['fname'] ?></td>
                        <td><?= $row['lname'] ?></td>
                        <td><?= $row['uname'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td>
                            <button class="btn btn-sm btn-warning edit_teacher" data-id="<?= $row['user_id'] ?>">Edit</button>
                            <button class="btn btn-sm btn-danger delete_teacher" data-id="<?= $row['user_id'] ?>">Delete</button>
                        </td>
                    </tr>
            <?php }
            } else { ?>
                <tr>
                    <td colspan="7" class="text-center">No data found.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
