<?php
include 'session.php';
session_destroy();
header("location:/Login/Registrieren.php");
?>