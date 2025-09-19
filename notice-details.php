<?php
error_reporting(0);
include('includes/config.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SVIP RESULT</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css1/styles.css" rel="stylesheet" />
        <style>
            /* Ensures the footer stays at the bottom */
            html, body {
                min-height: 100vh; /* Use min-height for better responsiveness */
                margin: 0;
                display: flex;
                flex-direction: column;
            }

            .wrapper {
                flex: 1; /* Pushes the footer down */
            }

            footer {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <!-- Wrap everything except the footer inside .wrapper -->
        <div class="wrapper">
            <!-- Responsive navbar-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="index.php">SVIP-(Notice Management System)</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link active" href="find-result.php">Students</a></li>
                            <li class="nav-item"><a class="nav-link active" href="admin-login.php">Admin</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Content section -->
            <section class="py-5">
                <div class="container my-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <?php 
                            $noticeid = $_GET['nid'];
                            $sql = "SELECT * FROM tblnotice WHERE id='$noticeid'";
                            $query = $dbh->prepare($sql);
                            $query->execute();
                            $results = $query->fetchAll(PDO::FETCH_OBJ);

                            if ($query->rowCount() > 0) {
                                foreach ($results as $result) {  
                            ?>  
                                <h3><?php echo htmlentities($result->noticeTitle);?></h3>
                                <p><strong>Notice Posting Date:</strong> <?php echo htmlentities($result->postingDate);?></p>
                                <hr color="#000" />
                                <p><?php echo htmlentities($result->noticeDetails);?></p>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
            </section>
        </div> <!-- End of .wrapper -->

        <!-- Footer -->
        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; SVIP <?php echo date('Y'); ?></p>
            </div>
        </footer>

        <!-- Bootstrap core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS -->
        <script src="js/scripts.js"></script>
    </body>
</html>
