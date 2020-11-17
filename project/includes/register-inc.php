<?php
session_start();


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
    $rawdate = htmlentities($_POST['birth']);
    $birth = date('Y-m-d', strtotime($rawdate));

    if (empty($email) || empty($password) || empty($confirmPass)) {
        header("Location: ../register.php?empty");
        $_SESSION["rWarning"] = "Blank Fields";
        exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $email)) {
        header("Location: ../register.php");
        $_SESSION["rWarning"] = "Invalid Email";
        exit();
    } elseif($password !== $confirmPass) {
        header("Location: ../register.php".$email);
        $_SESSION["rWarning"] = "Passwords Do Not Match";
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

             mysqli_stmt_close($stmt);
             $sql = "INSERT INTO Users (role_id, first_name, last_name, email, phone, password, date_of_birth) VALUES (?,?,?,?,?,?,?)";
             $stmt = mysqli_stmt_init($link);
             if(!mysqli_stmt_prepare($stmt,$sql)){
               echo "There was a problem inserting the data.";
               echo "<br/>";
               echo "<a href='../register.php'>Go back</a>";
               exit();
            } else {
              $hashedpass =password_hash($password,PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt,"issssss",$role_id, $first_name,$last_name,$phone,$email,$hashedPass,$birth);
              mysqli_stmt_execute($stmt);
              mysqli_stmt_close($stmt);
              $_SESSION["rWarning"] = "";
              header("Location: ../index.php");
              }
        }
    }

    mysqli_close($link);
}
}
?>
