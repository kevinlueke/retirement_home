<?php
require_once '../includes/viewheader.php';
require_once 'auth/carecheck.php';
?>
<?php
    if (isset($_SESSION['sessionId'])) {
        echo "Welcome, Nurse " . $_SESSION['sessionlName'];
    } else {
        echo "Home";
    }
?>
<?php
require_once 'includes/footer.php'
?>
