<?php
    include 'session.php';
    include 'DB.inc.php';

    $user=$_POST['User'];
    $Email=$_POST['Email'];
    $passwort=$_POST['passwort'];
    $_SESSION["eingeloggt"]=$Email;
    if(isset($_POST["submit"]))
    {
    $SELECT = "SELECT Passwort, Rechte, Benutzername FROM benutzer WHERE Email='$Email'";
    $Ergebnis = mysqli_query($con_root,$SELECT);
    if(!$Ergebnis)
    {
        echo "Fehler!";
    }
    else
    {
        while($row["passwort"]==$passwort)
        {
            if($row["passwort"]==$passwort)
            {
                $_SESSION["RECHTE"] =$row["Rechte"];
                $_SESSION['name']=$row["Benutzername"];
                header("location:/login/Hauptseite.php");
            }
        }
    }
}
if (isset($_POST["submit2"]))
    {
        $_SESSION["RECHTE"]=2;
        $Vorname=$_POST['Vorname'];
        $Nachname=$_POST['Nachname'];
    $SELECT2 = "INSERT INTO benutzer (Vorname, Nachname, Benutzername, Email, Passwort, Rechte) values ('$Vorname', '$Nachname', '$Email', '$user', '$Email', '$passwort', $Rechte)";
    $Ergebnis = mysqli_query($con_root, $SELECT2);
    header("location:/login/Hauptseite.php");
    }

