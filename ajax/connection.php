<?php
$servername = "localhost";
$username = "root";
$password = "";


    $db = new PDO("mysql:host=$servername;dbname=form",$username,$password );
   
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    


?>