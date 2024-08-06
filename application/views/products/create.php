<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .container {
            max-width: 600px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group textarea {
            resize: vertical;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Add Product</h1>

        <form id="addProductForm">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="price" class="form-control" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add Product</button>
        </form>
        <a href="<?php echo site_url('products'); ?>" class="btn btn-secondary btn-block mt-3">Back to Products</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addProductForm').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: "<?php echo site_url('products/store'); ?>",
                    type: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        window.location.href = "<?php echo site_url('products'); ?>";
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
