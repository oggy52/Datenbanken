<?php
session_start();

if (!isset($_SESSION["eingeloggt"]))
{
    header("location:/Login/Registrieren.php");
}
?>