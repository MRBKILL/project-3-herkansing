

<?php
// sessie starten/stoppen ivm inloggen/uitloggen
session_start();
session_destroy();
header("location: index.php");
exit;
?>