<?php
    include 'db.php';
    $sql = "SELECT * FROM `users`";
    $results = $conn->query($sql);
    $count = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 1 (Week 2)</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>


<!--Add button-->
<button type="submit" class="btn btn-primary"><a href="add.php" style="text-decoration: none; color: white;">ADD</a></button>


<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Birthday</th>
        <th scope="col">Delete</th>
        <th scope="col">Update/Edit</th>
    </tr>
    </thead>
    <tbody>

    <?php while ($row = $results->fetch_assoc()) :?>
    <tr>
        <th scope="row"><?php echo ++$count;?></th>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['surname'] ?></td>
        <td><?php echo $row['birthday'] ?></td>
        <td>
            <form method="post" action="delete.php">
                <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
        <td>
            <form method="post" action="edit.php">
                <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
                <button type="submit" class="btn btn-secondary">Edit</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>

    </tbody>
</table>

</body>
</html>
