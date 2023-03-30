<?php
include 'DB.inc.php';

$user=$_POST['Benutzername'];
$Email=$_POST['Email'];
$Passwort=$_POST['Passwort'];

if (isset($_POST['submit']))
{
    $SELECT = "SELECT Benutzername, Rechte, Passwort FROM login WHERE Email='$Email'";
    $Ergebnis = mysqli_query($con_root,$SELECT);
    echo $user;
    echo $Email;
}
?>