<?php
session_start();


if (isset($_POST['submit'])) {

    require '../database/db.php';
    $email = $_POST['id'];
    $password = $_POST['code'];
    if (empty($email) || empty($password)) {
        header("Location: ../login.php?blank=true");
        $_SESSION["warning"] = "Blank Fields";
        exit();
    }else {
      //gets user data
        $sql = "SELECT * FROM Users
        INNER JOIN Patients
        ON Users.ID=Patients.patient_id
        WHERE Users.id = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../login.php");
            $_SESSION["warning"] = "Inernal Error";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                if ($password != $row['family_code']) {
                    header("Location: ../family_login.php");
                    $_SESSION["warning"] = "Invalid  Code";
                    exit();
                } elseif ($password == $row['family_code']) {
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionfName'] = $row['first_name'];
                    $_SESSION['sessionlName'] = $row['emergency_contact'];
                    $_SESSION['accessLevel']==$row['id'];

                    header("Location: ../views/family/patienthome.php");

                    $role = $row['role_id'];

                    //run a query that pulls the user role from their role_id
                    $sql = "SELECT * FROM Roles WHERE id = ?";
                    $stmt = mysqli_stmt_init($conn);

                    $_SESSION["warning"] = "" ;
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
