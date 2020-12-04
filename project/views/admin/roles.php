<?php

require_once '../../includes/viewheader.php';
require_once '../auth/admincheck.php';

?>

<?php
    echo "Welcome, " . $_SESSION['sessionfName'];
    echo "<br>";
    if (isset($_SESSION["confirm"])) {
      echo "Role added!";
      unset($_SESSION["confirm"]);
    }
    echo "<h1>Roles</h1>";
?>



<form action="rolesadd.php" method="post">
    <input type="text" name="Name"  required placeholder="Role Name">
    <input type="number" name="Level" required placeholder="Access Level 0 - 4" min="0" max="4" style="width: 125px">

    <button type="submit" name="submit">ADD</button>
</form>
<?php
require_once '../../includes/footer.php'
?>
