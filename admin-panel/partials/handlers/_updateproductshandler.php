<!-- Database -->
<?php include('../_config.php') ?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // echo "<pre>";
   // print_r($_POST);
   // echo "<br>";   
   // echo "</pre>";

   $alertdanger = false;   
   $alertsuccess = false;

   if (isset($_POST["deleteId"])) {
      $delId = $_POST["deleteId"];
      $sql2 = "DELETE FROM `products` WHERE `id`='$delId'";
      $res2 = mysqli_query($conn, $sql2);

      if ($res2) {
         $alertsuccess = " Product Deleted Successfully";
         echo "<script>location.href='../../products/?als=$alertsuccess'</script>";
      } else {
         $alertdanger = " Some problem Occured in our Shop,please try again or wait";
         echo "<script>location.href='../../products/?ald=$alertdanger'</script>";
      }
   } else {

      if(isset($_POST['updateImage']))
      {
         $productName = $_POST["productName"];
         $productDisc = $_POST["product_desc"];
         $productId = $_POST["proId"];
         $productImage=$_FILES["product_image"]; 
   
         // Logic for Unique image name
         $uniqueIdentifier = uniqid();
         $extension = pathinfo($productImage["name"], PATHINFO_EXTENSION);
         $image_name = pathinfo($productImage["name"], PATHINFO_FILENAME) . '_' . $uniqueIdentifier . '.' . $extension;
         $productImage["name"]=$image_name;
   
         $sql = "UPDATE `products` SET `product_name`='$productName', `product_description`= '$productDisc', `product_image`='$image_name' where `id`='$productId'";
   
         $res = mysqli_query($conn, $sql);
         if ($res) {
   
            if ($productImage["error"] != 0) 
            {
               // echo "Could not Upload Category image,try to add another image";
               $alertdanger = " Could not upload product Image,please try again or try another Image.";
               echo "<script>location.href='../../products/?ald=$alertdanger'</script>";
            } 
            else 
            {
               // print_r($categoryImage);
               if (move_uploaded_file($productImage["tmp_name"], "../../../uploads/products/images/" . $productImage["name"])) 
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
   
            $alertsuccess = " Product Updated Successfully";
            echo "<script>location.href='../../products/?als=$alertsuccess'</script>";
         } else {
            $alertdanger = " Some problem Occured in our Shop,please try again or wait";
            echo "<script>location.href='../../products/?ald=$alertdanger'</script>";
         }
      }
      else
      {

      }

      $productName = $_POST["productName"];
      $productDisc = $_POST["product_desc"];
      $productId = $_POST["proId"];
      // $productImage=$_FILES["product_image"]; 

      // Logic for Unique image name
      // $uniqueIdentifier = uniqid();
      // $extension = pathinfo($first_image_name, PATHINFO_EXTENSION);
      // $image_name = pathinfo($first_image_name, PATHINFO_FILENAME) . '_' . $uniqueIdentifier . '.' . $extension;
      // $productImage["name"]=$image_name;

      $sql = "UPDATE `products` SET `product_name`='$productName', `product_description`= '$productDisc' where `id`='$productId'";

      $res = mysqli_query($conn, $sql);
      if ($res) {
         $alertsuccess = " Product Updated Successfully";
         echo "<script>location.href='../../products/?als=$alertsuccess'</script>";
      } else {
         $alertdanger = " Some problem Occured in our Shop,please try again or wait";
         echo "<script>location.href='../../products/?ald=$alertdanger'</script>";
      }
   }
}

?>