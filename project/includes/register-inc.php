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
             if ($role_id == 6) {
               $stmt = mysqli_prepare($conn, "SELECT * FROM Users WHERE email = ?");
               mysqli_stmt_bind_param($stmt,"s",$email);
               mysqli_stmt_execute($stmt);

               $result = mysqli_stmt_get_result($stmt);

               if ($row = mysqli_fetch_assoc($result)) {

                 $id = $row['id'];

               }
               $stmt = mysqli_prepare($conn, "INSERT INTO Patients (patient_id,family_code,emergency_contact,relation_emergency_contact) VALUES (?,' ',' ',' '  )");
               mysqli_stmt_bind_param($stmt,"s",$id);
               mysqli_stmt_execute($stmt);

             }
              header("Location:../login.php");
              $_SESSION["rWarning"] = "";

        }
    }

    mysqli_close($conn);
}
}
?>
