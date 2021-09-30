<?php
    include 'db.php';

    if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = date('Y-m-d', strtotime($_POST['birthday']));


    $sql = "INSERT INTO `users`(`name`, `surname`, `birthday`)
            VALUES ('$name','$surname','$birthday')";
    if ($conn->query($sql) === true){
        header("Location: index.php");
        exit();
    }else{
        echo "Failed to add new user.";
    }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>


<body style="padding: 200px;">


    <form style="width: 50%; margin-left: 25%;" method="post" action="#">
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter a name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Surname</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter a surname" name="surname" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Birthday</label>
            <input type="date" class="form-control" id="formGroupExampleInput2" name="birthday" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">ADD</button>
    </form>



</body>
</html>
