<?php
require_once '../../includes/viewheader.php';
require_once '../auth/patientcheck.php';
?>
<?php
    if (isset($_SESSION['sessionId'])) {
        echo "Welcome, Mr./Mrs. " . $_SESSION['sessionlName'];
        echo "<br>";
        echo "<h1>Your Schedule</h1>";
    }

    echo "<table border='1px black solid'>";
    echo "<tr>";
    echo "<th>Morning Medicine</th>";
    echo "<th>Afternnon Medicine</th>";
    echo "<th>Night Medicine </th>";
    echo "<th> Breakfast </th>";
    echo "<th>  Lunch </th>";
    echo "<th> Dinner </th>";
    echo "</tr>";
    echo "<tr>";
    echo "<td> <input type=\"checkbox\" name=\"Morn\"></td>";
    echo "<td> <input type=\"checkbox\" name=\"After\"></td>";
    echo "<td> <input type=\"checkbox\" name=\"Night\"></td>";
    echo "<td> <input type=\"checkbox\" name=\"Break\"></td>";
    echo "<td> <input type=\"checkbox\" name=\"Lunch\"></td>";
    echo "<td> <input type=\"checkbox\" name=\"Dinner\"></td>";




?>
<?php
require_once '../../includes/footer.php'
?>
