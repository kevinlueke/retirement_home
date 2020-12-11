<?php
session_start();

require_once '../auth/familycheck.php';
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Shady Acres</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
  </head>
  <body>
  <header>
<nav>
  <ul>
    <?php
        echo ' <li> <a href="../family/patienthome.php">Home</a></li>';
        echo ' <li> <a href="../family/viewroster.php">View Roster</a></li>';

     ?>
     <li> <a href="../../logout.php">Log Out</a></li>
  </ul>
</nav>



<?php
    if (isset($_SESSION['sessionId'])) {
        echo "Welcome, Mr./Mrs. " . $_SESSION['sessionlName'];
        echo "<br>";
        echo "<h1>Your Relative's Schedule</h1>";
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
