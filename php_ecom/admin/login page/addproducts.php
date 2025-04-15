<?php 
include('dashboard/header.php');
include('functions.php'); 
session_start();
?>
<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        h4
        {
            color: #ffffff;
        }
        input[type="text"], input[type="number"], input[type="checkbox"], input[type="file"] 
        { 
            width: 93%; 
            padding: 10px; 
            margin: 10px 0; 
            border: 1px solid #000000;}
        textarea.form
        {
             width: 93%; 
             padding: 10px; 
             margin: 10px 0; 
             border: 1px solid #000000;}
        label { 
            font-size: 15px; 
            color: grey; 
            }
    </style>
</head>
<div class="container mt-3 mb-3">
    <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-info">
            <?= $_SESSION['message']; unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>

    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="m-0">Add Product</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Category Dropdown -->
                            <div class="col-md-6 mb-3">
                                <label for="">Select Category</label>
                                <select name="category_id" class="form-select" required 
                                        style="width: 93%; padding: 10px; margin: 10px 0; border: 1px solid #000000;">
                                    <option selected disabled>Select Category</option>
                                    <?php 
                                    $categories = mysqli_query($conn, "SELECT * FROM categories");
                                    if (mysqli_num_rows($categories) > 0) {
                                        foreach ($categories as $cat) {
                                            echo '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
                                        }
                                    }
                                    ?>
                                </select>

                            </div>

                            <!-- Product Name -->
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" name="name" required placeholder="Enter Product Name" class="form-control">
                            </div>

                            <!-- Slug -->
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" name="slug" required placeholder="Enter Slug" class="form-control">
                            </div>

                           

                            <!-- Original Price -->
                            <div class="col-md-6 mb-3">
                                <label for="">Original Price</label>
                                <input type="number" name="original_price" required placeholder="Original Price" class="form-control">
                            </div>

                            <!-- Selling Price -->
                            <div class="col-md-6 mb-3">
                                <label for="">Selling Price</label>
                                <input type="number" name="selling_price" required placeholder="Selling Price" class="form-control">
                            </div>

                            <!-- Quantity -->
                            <div class="col-md-6 mb-3">
                                <label for="">Quantity</label>
                                <input type="number" name="qty" required placeholder="Enter Quantity" class="form-control">
                            </div>

                            

                            <!-- Image Upload -->
                            <div class="col-md-6 mb-3">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" class="form-control custom-file" required>
                            </div>

                            <!-- Meta Title -->
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" required placeholder="Meta Title" class="form-control">
                            </div>
                             <!-- Description -->
                             <div class="col-md-6 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" rows="3" required class="form-control form" placeholder="Enter Description"></textarea>
                            </div>

                            <!-- Meta Description -->
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" rows="3" required class="form-control form" placeholder="Enter Meta Description"></textarea>
                            </div>

                            <!-- Meta Keywords -->
                            <div class="col-md-6 mb-3">
                                <label for="">Meta Keywords</label>
                                <textarea name="meta_keywords" rows="3" required class="form-control form" placeholder="Enter Meta Keywords"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_product" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form> 

                </div>
            </div>
        </div>
    </div>
</div>

