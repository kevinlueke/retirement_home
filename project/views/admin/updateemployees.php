<?php
session_start();


if (isset($_POST['submit'])) {
    //Add database connection
    require '../../database/db.php';

    $id = $_POST['id'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];


    //check blank
    if (empty($id) || empty($first) || empty($last) || empty($email)) {
        header("Location: employees.php?" );
        $_SESSION["rWarning"] = "Blank Fields";
        exit();
        //check email
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $email)) {
        header("Location: employees.php");
        $_SESSION["rWarning"] = "Invalid Email";
        exit();
    }
    else {



     //insert data into database
     $stmt = mysqli_prepare($conn, "UPDATE Users SET first_name = '$first', last_name = '$last', email = '$email' WHERE id = '$id'");
     $stmt = mysqli_prepare($conn, "UPDATE Employees SET salary = '$salary' WHERE employee_id = '$id'");

     mysqli_stmt_execute($stmt);


     if(mysqli_stmt_error($stmt)){

      header("Location: employees.php");
      exit;
    }else{
      $_SESSION["rWarning"] = "";
      header("Location: employees.php");
    }
    mysqli_close($conn);
    }
}
?>
