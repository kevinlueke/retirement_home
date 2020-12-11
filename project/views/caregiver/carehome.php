<?php
require_once '../../includes/viewheader.php';
require_once '../auth/carecheck.php';
?>
<?php
    if (isset($_SESSION['sessionId'])) {
        echo "Welcome, Nurse " . $_SESSION['sessionlName'];
    } else {
        echo "Home";
    }
?>

<?php
    echo "<br>";
    echo "<h1>Today's Patients</h1>";

?>
<form method="GET" action="carehome.php">
  <select  name="column">
    <option value="first_name">First Name</option>
    <option value="last_name">Last Name</option>
  </select>
  <input type='input' name='search' placeholder="Search">
  <button type="submit" > SEARCH </button>
</form>


<?php

    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "retirement";

    // Create Connection
    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

    // if(isset($_GET['search'])){
    //   $key=$_GET["search"];  //key=pattern to be searched;
    //   $row = $_GET["column"];
    //   $sql = "SELECT * FROM Users
    //   INNER JOIN Patients
    //   ON Users.ID=Patients.patient_id
    //   WHERE $row LIKE '%$key%'";
    // }else{
    //   $sql = "SELECT * FROM Users
    //   INNER JOIN Patients
    //   ON Users.ID=Patients.patient_id";
    // }
    $id = $_SESSION['sessionId'];

    $sql = "SELECT * FROM Roster
    WHERE caregiver_1 = '$id' ";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
      $sql = "SELECT * FROM Roster
      WHERE caregiver_2 = '$id' ";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) == 0){
        $sql = "SELECT * FROM Roster
        WHERE caregiver_3 = '$id' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0){
          $sql = "SELECT * FROM Roster
          WHERE caregiver_4 = '$id' ";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) == 0){
              echo "You have no patients today";
          }else {
            $sql = "SELECT * FROM Users
            INNER JOIN Patients
            ON Users.ID=Patients.patient_id
            WHERE group_id = 4";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
            echo "<table border='1px black solid'>";
            echo "<tr>";
            echo "<th>First_Name</th>";
            echo "<th>Last_Name</th>";
            echo "<th>Morning Medicine</th>";
            echo "<th>Afternnon Medicine</th>";
            echo "<th>Night Medicine </th>";
            echo "<th> Breakfast </th>";
            echo "<th>  Lunch </th>";
            echo "<th> Dinner </th>";
            echo "<th> Update </th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<form action=\"carehome.php\" method=\"post\">";
                echo "<td> <input type=\"checkbox\" name=\"Morn\"></td>";
                echo "<td> <input type=\"checkbox\" name=\"After\"></td>";
                echo "<td> <input type=\"checkbox\" name=\"Night\"></td>";
                echo "<td> <input type=\"checkbox\" name=\"Break\"></td>";
                echo "<td> <input type=\"checkbox\" name=\"Lunch\"></td>";
                echo "<td> <input type=\"checkbox\" name=\"Dinner\"></td>";

                echo "<td hidden><input name=\"id\" value=\"". $row['id'] ."\" hidden/></br></td>";
                echo "<td> <button type=\"submit\">Submit</button> </td>";
                echo "</form>";


                echo "</tr>";
          }
        }
      }
        }else {
          $sql = "SELECT * FROM Users
          INNER JOIN Patients
          ON Users.ID=Patients.patient_id
          WHERE group_id = 3";
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
          echo "<table border='1px black solid'>";
          echo "<tr>";
          echo "<th>First_Name</th>";
          echo "<th>Last_Name</th>";
          echo "<th>Morning Medicine</th>";
          echo "<th>Afternnon Medicine</th>";
          echo "<th>Night Medicine </th>";
          echo "<th> Breakfast </th>";
          echo "<th>  Lunch </th>";
          echo "<th> Dinner </th>";
          echo "<th> Update </th>";
          echo "</tr>";
          while ($row = mysqli_fetch_array($result)) {
              echo "<tr>";
              echo "<td>" . $row['first_name'] . "</td>";
              echo "<td>" . $row['last_name'] . "</td>";
              echo "<form action=\"carehome.php\" method=\"post\">";
              echo "<td> <input type=\"checkbox\" name=\"Morn\"></td>";
              echo "<td> <input type=\"checkbox\" name=\"After\"></td>";
              echo "<td> <input type=\"checkbox\" name=\"Night\"></td>";
              echo "<td> <input type=\"checkbox\" name=\"Break\"></td>";
              echo "<td> <input type=\"checkbox\" name=\"Lunch\"></td>";
              echo "<td> <input type=\"checkbox\" name=\"Dinner\"></td>";

              echo "<td hidden><input name=\"id\" value=\"". $row['id'] ."\" hidden/></br></td>";
              echo "<td> <button type=\"submit\">Submit</button> </td>";
              echo "</form>";


              echo "</tr>";
        }
      }
    }
      }else {
        $sql = "SELECT * FROM Users
        INNER JOIN Patients
        ON Users.ID=Patients.patient_id
        WHERE group_id = 2";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        echo "<table border='1px black solid'>";
        echo "<tr>";
        echo "<th>First_Name</th>";
        echo "<th>Last_Name</th>";
        echo "<th>Morning Medicine</th>";
        echo "<th>Afternnon Medicine</th>";
        echo "<th>Night Medicine </th>";
        echo "<th> Breakfast </th>";
        echo "<th>  Lunch </th>";
        echo "<th> Dinner </th>";
        echo "<th> Update </th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<form action=\"carehome.php\" method=\"post\">";
            echo "<td> <input type=\"checkbox\" name=\"Morn\"></td>";
            echo "<td> <input type=\"checkbox\" name=\"After\"></td>";
            echo "<td> <input type=\"checkbox\" name=\"Night\"></td>";
            echo "<td> <input type=\"checkbox\" name=\"Break\"></td>";
            echo "<td> <input type=\"checkbox\" name=\"Lunch\"></td>";
            echo "<td> <input type=\"checkbox\" name=\"Dinner\"></td>";

            echo "<td hidden><input name=\"id\" value=\"". $row['id'] ."\" hidden/></br></td>";
            echo "<td> <button type=\"submit\">Submit</button> </td>";
            echo "</form>";


            echo "</tr>";
      }
    }
  }
    }else {
      $sql = "SELECT * FROM Users
      INNER JOIN Patients
      ON Users.ID=Patients.patient_id
      WHERE group_id = 1";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
      echo "<table border='1px black solid'>";
      echo "<tr>";
      echo "<th>First_Name</th>";
      echo "<th>Last_Name</th>";
      echo "<th>Morning Medicine</th>";
      echo "<th>Afternnon Medicine</th>";
      echo "<th>Night Medicine </th>";
      echo "<th> Breakfast </th>";
      echo "<th>  Lunch </th>";
      echo "<th> Dinner </th>";
      echo "<th> Update </th>";
      echo "</tr>";
      while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['first_name'] . "</td>";
          echo "<td>" . $row['last_name'] . "</td>";
          echo "<form action=\"carehome.php\" method=\"post\">";
          echo "<td> <input type=\"checkbox\" name=\"Morn\"></td>";
          echo "<td> <input type=\"checkbox\" name=\"After\"></td>";
          echo "<td> <input type=\"checkbox\" name=\"Night\"></td>";
          echo "<td> <input type=\"checkbox\" name=\"Break\"></td>";
          echo "<td> <input type=\"checkbox\" name=\"Lunch\"></td>";
          echo "<td> <input type=\"checkbox\" name=\"Dinner\"></td>";

          echo "<td hidden><input name=\"id\" value=\"". $row['id'] ."\" hidden/></br></td>";
          echo "<td> <button type=\"submit\">Submit</button> </td>";
          echo "</form>";


          echo "</tr>";
    }
  }
}

?>
<?php
require_once '../../includes/footer.php'
?>
