<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php

    //CONNECTION A LA BDD//

    // $bdd = mysqli_init();
    // mysqli_real_connect($bdd, "127.0.0.1", "vincent", "vincent", "gest_employes");

    function DetailsEmploye(){

    include_once("connexion.php");
    $result = mysqli_query($conn, "SELECT noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv FROM employes WHERE noemp='$_GET[id]';");
    $donnees = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //FIN DE LA CONNECTION//

    // var_dump($donnees);     AFFICHE LE CONTENU DE LA VARIABLE//

    for($i = 0; $i < count($donnees); $i++) {
        echo "<tr>";
            echo "<td>". $donnees [$i] ['noemp']." </td>";
            echo "<td>". $donnees [$i] ['nom'] ." </td>";
            echo "<td>". $donnees [$i] ['prenom'] ." </td>";
            echo "<td>". $donnees [$i] ['emploi'] ." </td>";
            echo "<td>". $donnees [$i] ['sup'] ." </td>";
            echo "<td>". $donnees [$i] ['embauche'] ." </td>";
            echo "<td>". $donnees [$i] ['sal'] ." </td>";
            echo "<td>". $donnees [$i] ['comm'] ." </td>";
            echo "<td>". $donnees [$i] ['noserv'] ." </td>";

            echo "<td> <button type='button' class='btn btn-primary'> Supprimer </button> </td>";
            echo "<td> <button type='button' class='btn btn-primary'> Modifier </button> </td>";
        echo "</tr>";  
        
}
}

DetailsEmploye();
    ?>
    
</body>


</html>