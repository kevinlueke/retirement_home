<?php
require_once '../../includes/viewheader.php';
require_once '../auth/admincheck.php';

?>

<?php
    echo "Welcome, " . $_SESSION['sessionfName'];
    echo "<br>";
    echo "<h1>Employees</h1>";
    ?>
<form method="GET" action="employees.php">
  <select  name="column">
    <option value="Users.id">id</option>
    <option value="first_name">First Name</option>
    <option value="last_name">Last Name</option>
    <option value="email">Email</option>
    <option value="age">Age</option>
    <option value="salary">Salary</option>
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

    if(isset($_GET['search'])){
      $key=$_GET["search"];  //key=pattern to be searched;
      $row = $_GET["column"];
      $sql = "SELECT * FROM Users
      LEFT JOIN Employees ON employee_id = Users.ID
      WHERE $row LIKE '%$key%'";
    }else{
      $sql = "SELECT * FROM Users
      LEFT JOIN Employees ON employee_id = Users.ID
      WHERE role_id BETWEEN 1 AND 4;";
    }


    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1px black solid'>";
            echo "<tr>";
            echo "<th>Id</th>";
            echo "<th>First_Name</th>";
            echo "<th>Last_Name</th>";
            echo "<th>Email</th>";
            echo "<th>Age</th>";
            echo "<th> Salary </th>";
            echo "<th>Edit </th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['employee_id'] . "</td>";
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
                echo "<td>" . $row['salary'] . "</td>";
                echo "<form action=\"employees_edit.php\" method=\"post\">";
                echo "<td hidden><input name=\"id\" value=\"". $row['employee_id'] ."\" hidden/></br></td>";
                echo "<td> <button type=\"submit\">EDIT</button> </td>";
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
?>
<?php
require_once '../../includes/footer.php'
?>
