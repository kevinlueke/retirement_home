<?php
session_start();



if (isset($_POST['submit'])) {

    require '../database/db.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    echo $email;
    echo $password;
    if (empty($email) || empty($password)) {
        header("Location: ../login.php?blank=true");
        $_SESSION["warning"] = "Blank Fields";
        exit();
    }else {
      //gets user data
        $sql = "SELECT * FROM Users WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
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
                    $_SESSION["warning"] = "Invalid  Password";
                    exit();
                } elseif ($passCheck == true) {
                    $_SESSION['sessionId'] = $row['id'];
                    $_SESSION['sessionfName'] = $row['first_name'];
                    $_SESSION['sessionlName'] = $row['last_name'];

                    $role = $row['role_id'];

                    //run a query that pulls the user role from their role_id
                    $sql = "SELECT * FROM Roles WHERE id = ?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../login.php");
                        $_SESSION["warning"] = "Internal Error";
                        exit();
                    } else {
                        mysqli_stmt_bind_param($stmt, "i", $role);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        if ($row = mysqli_fetch_assoc($result)) {
                          $_SESSION['accessLevel'] = $row['rank'];

                          if ($_SESSION['accessLevel']==5) {
                            header("Location: ../views/patienthome.php");
                          }elseif ($_SESSION['accessLevel']==3) {
                            header("Location: ../views/carehome.php");
                          }elseif ($_SESSION['accessLevel']==2) {
                            header("Location: ../views/doctorhome.php");
                          }elseif ($_SESSION['accessLevel']==1) {
                            header("Location: ../views/superhome.php");
                          }elseif ($_SESSION['accessLevel']==0) {
                            header("Location: ../views/adminhome.php");
                          }
                      }

                    }

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
