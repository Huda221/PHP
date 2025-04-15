<?php
include('db.php'); // make sure this connects to your database

if (isset($_POST['add_product'])) {
    // Get values from form
    $category_id = $_POST['category_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $slug = mysqli_real_escape_string($conn, $_POST['slug']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];

    $meta_title = mysqli_real_escape_string($conn, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($conn, $_POST['meta_description']);
    $meta_keywords = mysqli_real_escape_string($conn, $_POST['meta_keywords']);


    // Handle image upload
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext; // unique filename
    $upload_path = 'uploads/products/' . $filename;

    // Create upload directory if it doesn't exist
    if (!is_dir('uploads/products')) {
        mkdir('uploads/products', 0777, true);
    }

    move_uploaded_file($image_tmp, $upload_path);

    // Insert into database
    $query = "INSERT INTO products (category_id, name, slug, description, original_price, selling_price, qty, 
        image, meta_title, meta_description, meta_keywords) 
        VALUES ('$category_id', '$name', '$slug', '$description', '$original_price', '$selling_price', '$qty',
        '$filename', '$meta_title', '$meta_description', '$meta_keywords')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Product added successfully'); window.location.href = 'addproducts.php';</script>";
    } else {
        echo "<script>alert('Error adding product'); window.location.href = 'addproducts.php';</script>";
    }
}
?>
