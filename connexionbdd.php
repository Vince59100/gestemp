<?php

    $dbServername ="127.0.0.1";
    $username = "vincent";
    $dbPassword="vincent";
    $dbName="gest_employes";
    // $bdd = mysqli_init();  
    // $conn = mysqli_real_connect($bdd, $dbServername, $username, $dbPassword, $dbName);
    $conn = new mysqli($dbServername, $username, $dbPassword, $dbName);
    
?>