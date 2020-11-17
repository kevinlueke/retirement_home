<?php
require_once '../includes/viewheader.php'
?>
<?php
    if (isset($_SESSION['sessionId'])) {
        echo "Welcome, MR." . $_SESSION['sessionlName'];
    } else {
        echo "Home";
    }
?>
<?php
require_once '../includes/footer.php'
?>
