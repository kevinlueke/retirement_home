<?php
session_start();
$_SESSION["error"] = "";

if (isset($_POST['submit'])) {
    //Add database connection
    require 'database.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];
    $role_id = $_POST['role'];
    $first_name = $_POST['fName'];
    $last_name = $_POST['lName'];
    $phone = $_POST['phone'];
    $birth = $_POST['birth'];

    if (empty($email) || empty($password) || empty($confirmPass)) {
        header("Location: ../register.php?empty");
        $_SESSION["error"] = "Blank Fields";
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $email)) {
        header("Location: ../register.php");
        $_SESSION["error"] = "Invalid Email";
        exit();
    } elseif($password !== $confirmPass) {
        header("Location: ../register.php".$email);
        $_SESSION["error"] = "Passwords Do Not Match";
        exit();
    }

    else {
        $sql = "SELECT email FROM Users WHERE email = ?";
        $stmt = mysqli_stmt_init($link);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

            if ($rowCount > 0) {
                header("Location: ../register.php?error=usernametaken");
                exit();
            } else {
                $sql = "INSERT INTO Users (role_id,	first_name,	last_name,	email,	phone,	password,	date_of_birth) VALUES (?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($link);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    
                    header("Location: ../register.php?error=sqleror");
                    exit();
                } else {
                    $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "isssssss", $role_id, $first_name,$last_name,$phone,$email,$hashedPass,$birth);
                    mysqli_stmt_execute($stmt);
                        header("Location: ../index.php?succes=registered");
                        exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
}
?>
