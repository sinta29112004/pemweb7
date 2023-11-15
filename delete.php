<?php
   require './config/db.php';

   if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
       $productId = $_GET['id'];

       // Perform deletion
       $deleteQuery = mysqli_query($db_connect, "DELETE FROM products WHERE id = $productId");

       if ($deleteQuery) {
           echo "Product deleted successfully!";
           header('location: show.php'); 
       } else {
           echo "Error deleting product: " . mysqli_error($db_connect);
       }
   } else {
       echo "Invalid request!";
   }
?>

    
