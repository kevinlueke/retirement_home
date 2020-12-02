<?php
require_once '../../includes/viewheader.php';
require_once '../auth/admincheck.php';

?>

<?php
    echo "Welcome, " . $_SESSION['sessionfName'];
?>
<?php
require_once '../../includes/footer.php'
?>
