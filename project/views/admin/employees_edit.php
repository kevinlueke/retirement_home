<?php
require_once '../../includes/viewheader.php';
require_once '../auth/admincheck.php';


?>
<div class="warning">
  <?php
    if(isset($_SESSION["rWarning"])){
      $error = $_SESSION["warning"];
      echo "<span>$error</span>";
    }
  ?>
</div>
<?php
    echo "Welcome, " . $_SESSION['sessionfName'];
    echo "<br>";
    echo "<h1>Patients</h1>";
    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "retirement";
    if (isset($_POST['id'])){
      $_SESSION['patientId'] = $_POST['id'];
    }

    // Create Connection
    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
    $sql = "SELECT * FROM Users
    LEFT JOIN Employees ON employee_id = Users.ID
    WHERE employee_id = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $_SESSION['patientId']);
    mysqli_stmt_execute($stmt);
    if ($result = mysqli_stmt_get_result($stmt)) {
        if (mysqli_num_rows($result) > 0) {
           echo "<form action=\"updateemployees.php\" method=\"post\">";
            echo "<table border='1px black solid'>";
            echo "<tr>";
            echo "<th>First_Name</th>";
            echo "<th>Last_Name</th>";
            echo "<th>Email</th>";
            echo "<th> Salary </th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td hidden><input name=\"id\" value=\"". $row['employee_id'] ."\"/></br></td>";
                echo "<td><input name=\"first\" value=\"". $row['first_name'] ."\"/></br></td>";
                echo "<td><input name=\"last\" value=\"". $row['last_name'] ."\"/></br></td>";
                echo "<td><input name=\"email\" value=\"". $row['email'] ."\"/></br></td>";
                echo "<td><input name=\"salary\" value=\"". $row['salary'] ."\"/></br></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<button type=\"submit\" name=\"submit\">UPDATE</button>";
            echo "</form>";
            // Free result set
            mysqli_free_result($result);
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "warning: Could not able to execute $sql. ";
    }
?>
<?php
require_once '../../includes/footer.php'
?>
