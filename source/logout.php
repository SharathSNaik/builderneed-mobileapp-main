<?php
session_start();
unset($_SESSION['phone']);
session_destroy();
header("Location: ../index.php");
exit;
?>