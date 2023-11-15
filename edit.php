<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>

<?php
require './config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id=$id");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $price = $row['price'];
        // Assuming your image path is stored in the 'image' column
        $image = $row['image'];
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    mysqli_query($db_connect, "UPDATE products SET name='$name', price='$price' WHERE id=$id");

    header("Location: show.php");
}
?>

<h2>Edit Product</h2>

<form action="edit.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="name">Nama Produk:</label>
    <input type="text" name="name" value="<?php echo $name; ?>"><br>

    <label for="price">Harga:</label>
    <input type="text" name="price" value="<?php echo $price; ?>"><br>

    <!-- You can add similar fields for other properties -->

    <input type="submit" name="update" value="Update">
</form>

</body>
</html>
