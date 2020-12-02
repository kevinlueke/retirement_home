<?php
require_once '../../includes/viewheader.php';
require_once '../auth/supercheck.php';
?>
<?php
    if (isset($_SESSION['sessionId'])) {
        echo "Welcome, Supervisor " . $_SESSION['sessionlName'];;
    } else {
        echo "Home";
    }
?>
<?php
require_once '../../includes/footer.php'
?>
