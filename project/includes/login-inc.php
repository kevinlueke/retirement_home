<?php
session_start();



if (isset($_POST['submit'])) {

    require 'database.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $email;
    echo $password;
    if (empty($email) || empty($password)) {
        header("Location: ../login.php?blank=true");
        $_SESSION["warning"] = "Blank Fields";
        exit();
    }else {
        $sql = "SELECT * FROM Users WHERE email = ?";
        $stmt = mysqli_stmt_init($link);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php");
            $_SESSION["warning"] = "Internal Error";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['password']);
                if ($passCheck == false) {
                    header("Location: ../login.php");
                    $_SESSION["warning"] = "Invalid Email or Password";
                    exit();
                } elseif ($passCheck == true) {
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionUser'] = $row['first_name'];
                    header("Location: ../index.php");
                    $_SESSION["warning"] = "";
                    exit();
                } else {
                    header("Location: ../login.php");
                    $_SESSION["warning"] = "Invalid Email or Password";
                    exit();
                }
            } else {
                header("Location: ../login.php");
                $_SESSION["warning"] = "Invalid Email or Password";
                exit();
            }
        }
      }
    }
    else {
                header("Location: ../login.php?");
                $_SESSION["warning"] = "Access Denied";
                exit();
            }


?>
