<?php
session_start();


if (isset($_POST['submit'])) {
    //Add database connection
    require '../database/db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];
    $role_id = $_POST['role'];
    $first_name = $_POST['fName'];
    $last_name = $_POST['lName'];
    $phone = $_POST['phone'];
    $rawdate = htmlentities($_POST['birth']);
    $birth = date('Y-m-d', strtotime($rawdate));
    $aprove = 0;

    //check blank
    if (empty($email) || empty($password) || empty($confirmPass)) {
        header("Location: ../register.php?empty");
        $_SESSION["rWarning"] = "Blank Fields";
        exit();
        //check email
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $email)) {
        header("Location: ../register.php");
        $_SESSION["rWarning"] = "Invalid Email";
        exit();
        //check password if it matches the confirm field
    } elseif($password !== $confirmPass) {
        header("Location: ../register.php".$email);
        $_SESSION["rWarning"] = "Passwords Do Not Match";
        exit();
    }

    else {
      //check if email was already used
        $sql = "SELECT email FROM Users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
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
                $_SESSION["rWarning"] = "Username taken";
                exit();
            } else {

             mysqli_stmt_close($stmt);

             //insert data into database
             $stmt = mysqli_prepare($conn, "INSERT INTO Users (role_id, first_name, last_name, email, phone, password, date_of_birth,approved) VALUES (?,?,?,?,?,?,?,?)");
             $hashedPass =password_hash($password,PASSWORD_DEFAULT);
             mysqli_stmt_bind_param($stmt,"issssssi",$role_id, $first_name,$last_name,$email,$phone,$hashedPass,$birth,$aprove);
             mysqli_stmt_execute($stmt);

             if(mysqli_stmt_error($stmt)){
              //if error return back to register page and show error message
              $_SESSION["rWarning"] = "Your information is too long";
              header("Location:../register.php");
              exit;
            }else{
              header("Location:../login.php");
            }

        }
    }

    mysqli_close($conn);
}
}
?>
