<?php
session_start();
unset($_SESSION['bn_ag_phone']);
session_destroy();
header("Location: ../index.php");
exit;
?>