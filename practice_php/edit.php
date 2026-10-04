<?php 
include_once("dbconfig.php");

// Check ID in URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

// Fetch existing data
$result = $conn->query("SELECT * FROM products WHERE id = $id");
if ($result->num_rows == 0) {
    header("Location: index.php");
    exit();
}

$product = $result->fetch_assoc();

// UPDATE PRODUCT LOGIC
if (isset($_POST['update_product'])) {
    extract($_POST);

    $product_name = $conn->real_escape_string($product_name);
    $category     = $conn->real_escape_string($category);
    $price        = floatval($price);
    $quantity     = intval($quantity);
    $description  = $conn->real_escape_string($description);
    $status       = $conn->real_escape_string($status);

    $sql = "UPDATE products SET 
            product_name = '$product_name',
            category     = '$category',
            price        = '$price',
            quantity     = '$quantity',
            description  = '$description',
            status       = '$status'
            WHERE id     = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Update failed: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h3 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .input-group {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .input-group label {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #555;
        }

        .input-group input, 
        .input-group select, 
        .input-group textarea {
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-submit {
            flex: 1;
            padding: 11px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-cancel {
            flex: 1;
            padding: 11px;
            background-color: #6c757d;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card">
    <h3>Edit Product</h3>

    <form action="" method="post">
        <div class="input-group">
            <label>Product Name</label>
            <input type="text" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
        </div>

        <div class="input-group">
            <label>Category</label>
            <input type="text" name="category" value="<?php echo htmlspecialchars($product['category']); ?>" required>
        </div>

        <div class="input-group">
            <label>Price</label>
            <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
        </div>

        <div class="input-group">
            <label>Quantity</label>
            <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required>
        </div>

        <div class="input-group">
            <label>Status</label>
            <select name="status">
                <option value="Active" <?php if ($product['status'] == 'Active') echo 'selected'; ?>>Active</option>
                <option value="Inactive" <?php if ($product['status'] == 'Inactive') echo 'selected'; ?>>Inactive</option>
            </select>
        </div>

        <div class="input-group">
            <label>Description</label>
            <textarea name="description" rows="3"><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>

        <div class="btn-group">
            <input type="submit" name="update_product" value="Update Product" class="btn-submit">
            <a href="index.php" class="btn-cancel">Cancel</a>
        </div>
    </form>
</div>

</body>
</html>