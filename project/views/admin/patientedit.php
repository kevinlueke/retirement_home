<?php
require_once '../../includes/viewheader.php';
require_once '../auth/admincheck.php';


?>
<div class="warning">
  <?php
    if(isset($_SESSION["rWarning"])){
        $error = $_SESSION["rWarning"];
        echo "<span> Error:  $error</span>";
    }
  ?>
</div>
<?php
    echo "Welcome, " . $_SESSION['sessionfName'];
    echo "<br>";
    echo "<h1>Patients</h1>";
    $id = $_POST['id'];
    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "retirement";

    // Create Connection
    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
    $sql = "SELECT *
    FROM Patients
    INNER JOIN Users ON Users.id = Patients.patient_id
    WHERE Patients.id= ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    if ($result = mysqli_stmt_get_result($stmt)) {
        if (mysqli_num_rows($result) > 0) {
           echo "<form action=\"updatepatient.php\" method=\"post\">";
            echo "<table border='1px black solid'>";
            echo "<tr>";
            echo "<th>First_Name</th>";
            echo "<th>Last_Name</th>";
            echo "<th>Email</th>";
            echo "<th>  Contact Name </th>";
            echo "<th> Relation </th>";
            echo "<th> Family Code </th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                //echo " <td><input> value = ".$row['id']."</input> </td>";
                echo "<td><input name=\"first\" value=\"". $row['first_name'] ."\"/></br></td>";
                echo "<td><input name=\"last\" value=\"". $row['last_name'] ."\"/></br></td>";
                echo "<td><input name=\"email\" value=\"". $row['email'] ."\"/></br></td>";
                echo "<td><input name=\"contact\" value=\"". $row['emergency_contact'] ."\"/></br></td>";
                echo "<td><input name=\"relation\" value=\"". $row['relation_emergency_contact'] ."\"/></br></td>";
                echo "<td><input name=\"relation\" value=\"". $row['family_code'] ."\"/></br></td>";
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
