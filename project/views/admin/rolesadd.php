<?php
session_start();
require '../../database/db.php';

$name = $_POST['Name'];
$level = $_POST['Level'];

$_SESSION["confirm"]='b';

$sql = "INSERT INTO Roles (name, rank)
VALUES (?,?); ";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {

} else {
    mysqli_stmt_bind_param($stmt, "si", $name,$level);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $_SESSION["confirm"]='b';
    header("Location: roles.php");


}

header("Location: roles.php");

 ?>
