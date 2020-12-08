<?php
require_once '../../includes/viewheader.php';
require_once '../auth/admincheck.php';

?>

<?php
    $mysqli = new mysqli('localhost', 'root', '', 'retirement');
    echo "Welcome, " . $_SESSION['sessionfName'];
    echo "<br>";
    echo "<h1>Roster</h1>";
?>
<form method="GET" action="viewroster.php">
  <?php
    echo "<input type='date' name='search' value='" . date('Y-m-d') . "'></label>";
   ?>
    <button type="submit" > SEARCH </button>
</form>


<?php
$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "retirement";



// Create Connection
$conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if(isset($_GET['search'])){
  $key=$_GET["search"];  //key=pattern to be searched;

  // Check connection
  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if ($result=mysqli_query($conn,"select * from Roster where roster_date like '$key'")) {
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
              $supervisor =$row['supervisor_id'];
              $doctor = $row['doctor_id'];
              $care1 = $row['caregiver_1'];
              $care2 = $row['caregiver_2'];
              $care3 = $row['caregiver_3'];
              $care4 = $row['caregiver_4'];

              $employees = array($supervisor, $doctor, $care1, $care2, $care3, $care4);
              echo "<tr>";
              echo "<td>" . $row['roster_date'] . "</td>";
              if ($stmt = $mysqli->prepare("SELECT first_name, last_name FROM Users WHERE id = ?")) {
                foreach ($employees as $employee) {
                  $stmt->bind_param('s', $employee);
                  $stmt->execute();
                  $result = $stmt->get_result();
                  while ($row = $result->fetch_assoc()) {
                  printf(<<<EOT
                  <td>%s %s</td>
                  EOT, $row['first_name'], $row['last_name']);
                }
                }
                $stmt->close();
              }
              echo "</tr>";
              echo "<tr>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td>Group 1</td>";
              echo "<td>Group 2</td>";
              echo "<td>Group 3</td>";
              echo "<td>Group 4</td>";
              echo "</tr>";

          }
          echo "</table>";

          // Free result set
          mysqli_free_result($result);
      } else {
          echo "No records matching your query were found.";
      }
    } else {
        echo "warning: Could not able to execute. ";
    }
  }

?>
<?php
require_once '../../includes/footer.php'
?>
