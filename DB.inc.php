<?php
$con_root = mysqli_connect("localhost", "root", "", "ita00") or die ("error beim connect");
$con_Admin = mysqli_connect("localhost", "admin", "p3B8KRxv6RCSJiS6", "ita00") or die ("error beim connect");
$con_User = mysqli_connect("localhost", "Benutzer", "F5Yedg6C1ktTAt1R", "ita00") or die ("error beim connect");

$tabelle= 'benutzer'
?>