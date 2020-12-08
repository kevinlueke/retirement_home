<?php
require_once '../../includes/viewheader.php';
require_once '../auth/admincheck.php';

?>

<?php
    echo "Welcome, " . $_SESSION['sessionfName'];
    echo "<br>";
    echo "<h1>Roster</h1>";
    ?>
    <form  method="POST">
      <?php
        echo "<input type='date' name='date' value='" . date('Y-m-d') . "'></label>";
       ?>
        <button type="submit" name="submit"> SEARCH </button>
    </form>
    <?php
    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "retirement";



    // Create Connection
    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);


    if (isset($_POST['date'])) {
        $date = $_POST['date'];

    $sql = "SELECT * FROM Roster WHERE roster_date = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1px black solid'>";
            echo "<tr>";
            echo "<th>Roster Date</th>";
            echo "<th>Supervisor</th>";
            echo "<th>Doctor</th>";
            echo "<th>Care Giver 1</th>";
            echo "<th>Care Giver 2</th>";
            echo "<th> Care Giver 3 </th>";
            echo "<th>Care Giver 4 </th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['roster_date'] . "</td>";
                echo "<td>" . $row['supervisor_id'] . "</td>";
                echo "<td>" . $row['doctor_id'] . "</td>";
                echo "<td>" . $row['caregiver_1'] . "</td>";
                echo "<td>" . $row['caregiver_2'] . "</td>";
                echo "<td>" . $row['caregiver_3'] . "</td>";
                echo "<td>" . $row['caregiver_4'] . "</td>";
                echo "</form>";

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
  }
?>
<?php
require_once '../../includes/footer.php'
?>
