<!-- script para serrar la sesión -->
<?php
session_start();
session_destroy();
header("Location: index.php");
?>