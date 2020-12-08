<?php
session_start();


  //Add database connection
  require '../../database/db.php';
  $dbServerName = "localhost";
  $dbUsername = "root";
  $dbPassword = "";
  $dbName = "retirement";

  // Create Connection
  $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
  //working

  $_SESSION["confirm"]='b';
  $date = $_POST['date'];
  $super = $_POST['super'];
  $doctor = $_POST['doctor'];
  $cgone = $_POST['cgone'];
  $cgtwo = $_POST['cgtwo'];
  $cgthree = $_POST['cgthree'];
  $cgfour = $_POST['cgfour'];
  $_SESSION["rWarning"] = "fdjh";

  //check blank
  if (empty($date) || empty($super) || empty($doctor) || empty($cgone) || empty($cgtwo) || empty($cgthree) || empty($cgfour)) {
      header("Location: roster.php" );
      $_SESSION["rWarning"] = "Blank Fields";
      exit();
      //check email
  }
  else {
    $sql = "SELECT * FROM Roster WHERE roster_date = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);

    $rowCount = mysqli_stmt_num_rows($stmt);

    if ($rowCount > 0) {
        header("Location: roster.php");
        $_SESSION["rWarning"] = "Date already made";
        exit();
    } else {
   //insert data into database
   echo('here');
   $stmt->close();
   if ($stmt = $conn->prepare('INSERT INTO Roster (roster_date, supervisor_id, doctor_id, caregiver_1, caregiver_2, caregiver_3, caregiver_4) VALUES (?, ?, ?, ?, ?, ?, ?)')) {

      $stmt->bind_param('siiiiii', $date, $super, $doctor, $cgone, $cgtwo,
                        $cgthree, $cgfour);
      $stmt->execute();
      header("Location: roster.php");
  }
}
  mysqli_close($conn);
}



?>
