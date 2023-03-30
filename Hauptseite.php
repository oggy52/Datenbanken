<?php
include 'session.php';
include 'DB.inc.php';

echo "Hallo " . $_SESSION['name']."";
$abfrage = "Select id, Vorname, Nachname, Email, Rechte from benutzer";

//echo $_GET ['vorname'];
?>
<table border="1">

<?php

            if ($_SESSION['Rechte'] ==1)
                {
                    $ergebniss = mysqli_query($con_Admin, $abfrage);
                }
            elseif ($_SESSION['Rechte'] ==2)
                {
                    $ergebniss = mysqli_query($con_User, $abfrage);
                }



if($_SESSION['Rechte']== 1)
{
?>
    <td><img src ="img/loeschen.png" width="20" height="20"></td>
    <td><img src ="img/aendern.png" width="20" height="20"></td>
    <td>Vorname</td>
    <td>Nachname</td>
    <td>Email</td>
    <td>Berechtigung</td>
<?php
}
else
{
    ?>
    <td>Vorname</td>
    <td>Nachname</td>
    <td>Email</td>
    <?php
}
?>
</tr>
<?php
while ($row = mysqli_fetch_object($ergebniss))
{

    ?>
    <tr>
    <?php
        if($_SESSION['Rechte'] == 1)
        {?>
            <td><a href="aendern.php?l_id=<?php echo $row->id; ?>">
            <img src="img/loeschen.png" width="20" height="20"></a>
            </td>
            <td><a href="aendern.php?id=<?php echo $row->id; ?>">
            <img src="img/aendern.png" width="20" height="20"></a>
            </td>

            <td><?php echo $row->Vorname;?></td>
            <td><?php echo $row->Nachname;?></td>
            <td><?php echo $row->Email;?></td>
                <?php
                    if($row->Rechte==2)
                    {
                ?>

                <td><a href="aendern.php?g_id= <?php echo $row-> id; ?>" name= "Admin" ><button>Admin machen</button>

                <?php
                    }
                ?>
                <?php
                    if($row->Rechte==1)
                    {
                ?>
                    <td><a href="aendern.php?gr_id=<?php echo $row->id;?>" name= "Benutzer"><button>Nutzer machen</button>
                <?php
                    }
                ?>
            <?php
        }
        else
        {
            if($_SESSION["eingeloggt"]==$row->Email)
        {
            ?>
            <td><?php echo $row->Vorname; ?></td>
            <td><?php echo $row->Nachname; ?></td>
            <td><?php echo $row->Email; ?></td>
            <?php
        }
    }
}
    ?>
    </table>
    <?php
    if($_SESSION['Rechte']== 1)
        {
            ?>

            <a href="einfuegen.php"><button name="einfuegen">einfuegen</button></a>
                <?php
        }
            ?>
            <?php

            ?>
<a href="destroyed.hp"><button name="einfuegen">logout</button></a>