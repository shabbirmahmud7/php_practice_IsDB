<?php include_once("dbconfig.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>

<body>

    <h3>Student List</h3>
    <a href="studentNew.php">New Entry</a>
    <?php
    $rawData =  $conn->query("SELECT * FROM students"); ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Home</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php

        while ($row = $rawData->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td>Edit |
                    <a onclick="return confirm('Are you sure to delete')" href="studentDelete.php?id=<?php echo $row['id'] ?>">Delete</a>

                </td>

            </tr>
        <?php
        }
        ?>
    </table>

</body>

</html>