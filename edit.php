<?php
include 'db.php';
if (!isset($_POST['user_id'])){
    die("No user ID.");
}

$user_id = $_POST['user_id'];

$sql_select = "SELECT * FROM `users` WHERE `id` = $user_id";
$results = $conn->query($sql_select);
$row = $results->fetch_assoc();

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthday = date('Y-m-d', strtotime($_POST['birthday']));

    $sql_update = "UPDATE `users` SET `name`='$name', `surname`='$surname', `birthday`='$birthday' WHERE `id`='$user_id'";
    if ($conn->query($sql_update) === true){
        header("Location: index.php");
        exit();
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
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="<?php echo $row['name'] ?>" name="name">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Surname</label>
        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="<?php echo $row['surname'] ?>" name="surname">
    </div>
    <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Birthday | Indicated date: <?php echo $row['birthday'] ?></label>
        <input type="date" class="form-control" id="formGroupExampleInput2" name="birthday">
    </div>
    <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
    <button type="submit" class="btn btn-primary" name="submit">EDIT</button>
</form>



</body>
</html>

