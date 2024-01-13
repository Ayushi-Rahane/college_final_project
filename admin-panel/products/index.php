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


        <!-- Navbar and Sidebar -->
        <?php include_once('../partials/_navbar.php'); ?>
        <?php include_once('../partials/modals/_updateproducts.php'); ?> 

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
                        <h4 class="mb-4">Total Products</h4>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../img/allproduct.png" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Products</h5>
                                        <p class="card-text">
                                            <?php

                                            $sql3 = "SELECT * FROM `products`";
                                            $res3 = mysqli_query($conn, $sql3);
                                            if ($res3) {
                                                $num3 = mysqli_num_rows($res3);
                                                echo '<h1 class="mx-2">' . $num3 . '</h1>';
                                            } else {
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
                    <h4 class="mb-4 my-4 text-center">All Products</h4>
                    <table class="table bg-light" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">product Id</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Description</th>
                                <th scope="col">Product Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $sql = "SELECT * FROM `products`";
                            $res = mysqli_query($conn, $sql);
                            if ($res) { 
                                while ($r = mysqli_fetch_assoc($res)) {
                                    $product_description = $r['product_description'] . substr(1, 50);
                                    echo "
        
                                        <tr>
                                            <th scope='row'>" . $r["id"] . "</th>
                                            <td>" . $r["product_name"] . "</td>
                                            <td>" . $product_description . "</td>
                                            <td><img src='../../uploads/products/images/" . $r['product_image'] . "' style='width:30px !important'></td>
                                            <td><a href='#' class='btn btn-danger mx-2 btn-edit' id=" . $r['id'] . " data-bs-toggle='modal' data-bs-target='#updateproducts'>Edit</a></td>
                                        </tr>

                                        ";
                                }
                            } else {
                                echo "Some problem Occured here";
                            }

                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    <form action="../partials/handlers/_productshandler.php" method="post"
                        enctype="multipart/form-data">
                        <div class="bg-light rounded h-100 p-4"> 
                            <h4 class="mb-4 text-center" id="category-add">Add a Product</h4>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">Product Name</span>
                                <input type="text" class="form-control" name="productName" placeholder="Product Name"
                                    aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group my-3">
                                <span class="input-group-text">product Description</span>
                                <textarea class="form-control" placeholder="Product Description"
                                    name="product-Description" aria-label="With textarea" required></textarea>
                            </div>

                          
                            <div class="input-group mb-3">
                                <input type="file" name="productImage1" class="form-control" id="inputGroupFile02"
                                    accept="image/*" required />
                                <label class="input-group-text" for="inputGroupFile02">Product image</label>
                            </div>
                            <button type="submit" class="btn btn-info">Add a Product</button>
                        </div>
                    </form>
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
    <!-- <script src="../js/updateOrder.js"></script> -->
    <script src="../js/_updateproducts3.js"></script>

    <!--dataTables Start-->

    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        let table2 = new DataTable('#myTable2');
    </script>
</body>

</html>