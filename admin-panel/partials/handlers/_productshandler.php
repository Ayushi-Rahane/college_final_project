<!-- Database -->
<?php include('../_config.php') ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // echo "<pre>";
   // print_r($_POST);
   // echo "<br>";
   // print_r($_FILES);
   // echo "</pre>"; 
   $productName = $_POST["productName"];
   $productDescription = $_POST["product-Description"];

   // Sanitizing String
   $productName = htmlspecialchars($productName);
   $productDescription = htmlspecialchars($productDescription);


   // Image1
   $first_image = $_FILES["productImage1"];
   $first_image_name = $first_image["name"];
   $first_image_error = $first_image["error"];
   $first_image_temp_name = $first_image["tmp_name"];



   // Logic for Unique image name
   $uniqueIdentifier = uniqid();
   $extension = pathinfo($first_image_name, PATHINFO_EXTENSION);
   $first_image_name = pathinfo($first_image_name, PATHINFO_FILENAME) . '_' . $uniqueIdentifier . '.' . $extension;



   $first_image["name"]=$first_image_name;
 
   
   $sql = "INSERT INTO `products` (`product_name`, `product_description`, `product_image`, `date`) VALUES ('$productName', '$productDescription', '$first_image_name', current_timestamp());";

   $alertdanger = false;
   $alertsuccess = false; 
   $res = mysqli_query($conn, $sql);
   $img = $first_image;
   // print_r($arr[1]["error"]);
   if ($res) 
   {
         if ($img["error"] != 0) 
         { 
            // echo "Could not Upload Category image,try to add another image";
            $alertdanger = " Could not upload product Image,please try again or try another Image.";
            echo "<script>location.href='../../products/?ald=$alertdanger'</script>";
         } 
         else 
         {
            // print_r($categoryImage);
            // if (move_uploaded_file($img["tmp_name"], "../../../../uploads/products/images/" . $img["name"])) 
            if (move_uploaded_file($img["tmp_name"], "../../../uploads/products/images/" . $img["name"])) 
            // if (move_uploaded_file($img["tmp_name"], "../../../gaintree-main/img/products/" . $img["name"])) 
            {
               $alertsuccess = " Product added Successfully";
               echo "<script>location.href='../../products/?als=$alertsuccess'</script>";
            }
            else
            {
               $alertdanger = " Product is not Added";
               echo "<script>location.href='../../products/?ald=$alertdanger'</script>";
            }
         }
      }

      // $alertsuccess = " Product added Successfully";
      // echo "<script>location.href='http://localhost/saimart/emart/products.php?alertdanger=$alertsuccess'</script>";
   } else {
      $alertdanger = " Product is not Added";
      
      echo "<script>location.href='../../products/?ald=$alertdanger'</script>";
   }

?>