<?php
include 'db.php';
if (isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];
    $sql = "DELETE FROM `users` WHERE `id` = $user_id";
    if ($conn->query($sql) === true){
        header("Location: index.php");
        exit();
    }
}