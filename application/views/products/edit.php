<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Product</h1>

        <?php if (isset($product) && !empty($product)): ?>
            <form action="<?php echo site_url('products/update/'.$product['id']); ?>" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo set_value('name', $product['name']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" class="form-control"><?php echo set_value('description', $product['description']); ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" value="<?php echo set_value('price', $product['price']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" value="<?php echo set_value('quantity', $product['quantity']); ?>" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Update Product</button>
            </form>
        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                No product data available.
            </div>
        <?php endif; ?>

        <a href="<?php echo site_url('products'); ?>" class="btn btn-secondary btn-block mt-3">Back to Products</a>
    </div>
</body>
</html>
