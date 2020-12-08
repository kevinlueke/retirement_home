<?php
session_start();


if (isset($_POST['submit'])) {
    //Add database connection
    require '../../database/db.php';

    $id = $_POST['id'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $relation = $_POST['relation'];
    $code = $_POST['code'];

    //check blank
    if (empty($id) || empty($first) || empty($last) || empty($email)) {
        header("Location: patientedit.php?" );
        $_SESSION["rWarning"] = "Blank Fields";
        exit();
        //check email
    } elseif (!preg_match("/^[a-zA-Z0-9]*/", $email)) {
        header("Location: patientedit.php");
        $_SESSION["rWarning"] = "Invalid Email";
        exit();
    }
    else {

     mysqli_stmt_close($stmt);

     //insert data into database
     $stmt = mysqli_prepare($conn, "UPDATE Users SET first_name = '$first', last_name = '$last', email = '$email' WHERE id = '$id'");
     mysqli_stmt_execute($stmt);
     $stmt = mysqli_prepare($conn, "UPDATE Patients SET family_code = '$code', emergency_contact = '$contact', relation_emergency_contact = '$relation' WHERE patient_id = '$id'");
     mysqli_stmt_execute($stmt);


     if(mysqli_stmt_error($stmt)){
      //if error return back to register page and show error message
      $_SESSION["rWarning"] = "Your information is too long";
      header("Location:../register.php");
      exit;
    }else{
      $_SESSION["rWarning"] = "";
      header("Location:patients.php");
    }
    mysqli_close($conn);
    }
}
?>
