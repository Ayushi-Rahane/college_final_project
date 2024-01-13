<?php include_once('../partials/_config.php') ?>

<?php session_start(); ?>

<?php

if(isset($_SESSION['adminLogin']) && isset($_SESSION['admin']))
{
   echo '';
}
else
{
   echo '<script>location.href="../signIn/"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Concept N Control-Admin panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../img/cnc-logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
 
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <!-- <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->

        <!-- Navbar and Sidebar -->
        <?php include_once('../partials/_navbar.php'); ?>

        <!-- Alerts -->
        <?php
        $alertdanger = false;
        $alertsuccess = false;
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (isset($_GET['ald'])) {
               $alertdanger = $_GET['ald'];
            }
            if (isset($_GET['als'])) {
               $alertsuccess = $_GET['als'];
            }
         }
        // echo $alertsuccess;
        if ($alertdanger) {
            echo '<div class="alert alert-danger alert-dismissible fade show alertsl" role="alert">
                     <strong><i class="bi-exclamation-octagon-fill"></i></strong> ' . $alertdanger . '
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
        if ($alertsuccess) {
            echo '<div class="alert alert-success alert-dismissible fade show alertsl" role="alert">
                     <strong><i class="bi-exclamation-octagon-fill"></i></strong> ' . $alertsuccess . '
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
        ?>


        <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">

                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h4 class="mb-4">Total Contacts</h4>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../img/allproduct.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Contacts</h5>
                                        <p class="card-text">
                                            <?php

                                            $sql3="SELECT * FROM `contacts`";
                                            $res3=mysqli_query($conn,$sql3);
                                            $num3=mysqli_num_rows($res3);
                                            if($num3)
                                            {
                                                echo '<h1 class="mx-2">'. $num3 .'</h1>';
                                            }
                                            else
                                            {
                                                echo "<p>some problem occured in our shop</p>";
                                            }

                                            ?>
                                        </p>
                                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                                ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 overflow-scroll">
                    <h5 class="mb-4 my-4 text-center">All Contacts</h5>
                    <table class="table bg-light" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile No</th>
                                <th scope="col">Address</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Message</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                            $sql = "SELECT * FROM `contacts`";
                            $res = mysqli_query($conn, $sql);
                            if ($res) {
                                while ($r = mysqli_fetch_assoc($res)) {
                                    echo "
                                    
                                    <tr>
                                        <th scope='row'>" . $r["id"] . "</th>
                                        <td>" . $r["first_name"] . " ". $r["last_name"] . "</td>
                                        <td>" . $r["email"] . "</td>
                                        <td>" . $r["phone_no"] . "</td>
                                        <td>" . $r["address"] . "</td>
                                        <td>" . $r["company_name"] . "</td>
                                        <td>" . $r["message"] . "</td>
                                        <td>" . $r["date"] . "</td>
                                    </tr>

                                    ";
                                }
                            } else {
                                echo "SOme problem Occured here";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>



            </div>
        </div>
        <!-- Table End -->


        <!-- Footer Start-->
        <?php include_once('../partials/_footer.php'); ?>
        <!-- Footer End -->

    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/chart/chart.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>

    <!--dataTables Start-->

    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>