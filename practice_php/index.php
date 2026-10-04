<?php 
include_once("dbconfig.php");

$msg = "";
$error = "";

// ------------------- CREATE (INSERT PRODUCT) -------------------
if (isset($_POST['add_product'])) {
    extract($_POST);

    // Form inputs validation & escaping
    $product_name = $conn->real_escape_string($product_name);
    $category     = $conn->real_escape_string($category);
    $price        = floatval($price);
    $quantity     = intval($quantity);
    $description  = $conn->real_escape_string($description);
    $status       = $conn->real_escape_string($status);

    $sql = "INSERT INTO products (product_name, category, price, quantity, description, status) 
            VALUES ('$product_name', '$category', '$price', '$quantity', '$description', '$status')";

    if ($conn->query($sql) === TRUE) {
        $msg = "Product added successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }
}

// ------------------- DELETE PRODUCT -------------------
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $conn->query("DELETE FROM products WHERE id = $delete_id");
    header("Location: index.php");
    exit();
}

// ------------------- READ (FETCH ALL PRODUCTS) -------------------
$products = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management CRUD</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .card {
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }

        h3 {
            margin-bottom: 20px;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 8px;
            display: inline-block;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 15px;
        }

        .input-group {
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
            padding: 10px 12px;
            border: 1px solid #cccccc;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        .input-group input:focus, 
        .input-group select:focus, 
        .input-group textarea:focus {
            border-color: #007bff;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .btn-submit {
            padding: 11px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        /* Alert styling */
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
            font-size: 14px;
        }

        th {
            background-color: #f8f9fa;
            color: #333;
        }

        .badge-active {
            background: #28a745;
            color: #fff;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
        }

        .badge-inactive {
            background: #dc3545;
            color: #fff;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
        }

        .btn-action {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            color: #fff;
            font-weight: bold;
        }

        .btn-edit { background-color: #ffc107; color: #000; }
        .btn-delete { background-color: #dc3545; }
    </style>
</head>
<body>

<div class="container">

    <!-- ADD PRODUCT FORM -->
    <div class="card">
        <h3>Add New Product</h3>

        <?php if ($msg != "") echo "<div class='alert-success'>$msg</div>"; ?>
        <?php if ($error != "") echo "<div class='alert-error'>$error</div>"; ?>

        <form action="" method="post">
            <div class="form-grid">
                <div class="input-group">
                    <label>Product Name</label>
                    <input type="text" name="product_name" placeholder="e.g. Wireless Mouse" required>
                </div>

                <div class="input-group">
                    <label>Category</label>
                    <input type="text" name="category" placeholder="e.g. Electronics" required>
                </div>

                <div class="input-group">
                    <label>Price ($)</label>
                    <input type="number" step="0.01" name="price" placeholder="0.00" required>
                </div>

                <div class="input-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" placeholder="0" required>
                </div>

                <div class="input-group">
                    <label>Status</label>
                    <select name="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>

                <div class="input-group full-width">
                    <label>Description</label>
                    <textarea name="description" rows="3" placeholder="Product details..."></textarea>
                </div>
            </div>

            <input type="submit" name="add_product" value="Save Product" class="btn-submit">
        </form>
    </div>

    <!-- PRODUCT LIST TABLE -->
    <div class="card">
        <h3>Product List</h3>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($products && $products->num_rows > 0): ?>
                    <?php while ($row = $products->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><strong><?php echo htmlspecialchars($row['product_name']); ?></strong></td>
                            <td><?php echo htmlspecialchars($row['category']); ?></td>
                            <td>$<?php echo number_format($row['price'], 2); ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td>
                                <span class="<?php echo ($row['status'] == 'Active') ? 'badge-active' : 'badge-inactive'; ?>">
                                    <?php echo $row['status']; ?>
                                </span>
                            </td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn-action btn-edit">Edit</a>
                                <a href="index.php?delete_id=<?php echo $row['id']; ?>" class="btn-action btn-delete" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" style="text-align: center;">No products found!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>