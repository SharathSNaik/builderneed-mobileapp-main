<?php
include_once 'connect.php';
session_start();
if (isset($_SESSION['phone'])) {
    $globaluserid = $_SESSION['phone'];
    $name = mysqli_fetch_assoc(mysqli_query($connection, "SELECT `name` from bn_leads WHERE phone='$globaluserid'"));
} else {
    header("Location: ../");
}
