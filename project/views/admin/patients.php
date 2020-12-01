<?php
require_once '../../includes/viewheader.php';
require_once '../auth/admincheck.php';

?>

<?php
    echo "Welcome, " . $_SESSION['sessionfName'];
    echo "<br>";
    echo "<h1>Patients</h1>";

    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "retirement";

    // Create Connection
    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
    $sql = "SELECT * FROM Users
    INNER JOIN Patients
    ON Users.ID=Patients.patient_id";
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1px black solid'>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>First_Name</th>";
            echo "<th>Last_Name</th>";
            echo "<th>Email</th>";
            echo "<th>Age</th>";
            echo "<th> Emergency Contact Name </th>";
            echo "<th> Relation </th>";
            echo "<th> Admission Date </th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['first_name'] . "</td>";
                echo "<td>" . $row['last_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                $birthDate = $row['date_of_birth'];
                //explode the date to get month, day and year
                $birthDate = explode("-", $birthDate);
                //get age from date or birthdate
                $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                  ? ((date("Y") - $birthDate[1]) - 1)
                  : (date("Y") - $birthDate[0]));
                echo "<td>" . $age . "</td>";
                echo "<td>" . $row['emergency_contact'] . "</td>";
                echo "<td>" . $row['relation_emergency_contact'] . "</td>";
                echo "<td>" . $row['admission_date'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
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
