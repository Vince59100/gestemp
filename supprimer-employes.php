<?php

    // $bdd = mysqli_init();
    // mysqli_real_connect($bdd, "127.0.0.1", "vincent", "vincent", "gest_employes");
    // $result = mysqli_query($bdd, "DELETE FROM employes WHERE noemp='$_GET[id]';");
    // $donnees = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // var_dump($donnees);


    function delete($id)

    {

        $bdd = mysqli_init();
        mysqli_real_connect($bdd, "127.0.0.1", "vincent", "vincent", "gest_employes");
        $result = mysqli_query($bdd, "DELETE FROM employes WHERE noemp='".$id."' ;");
        mysqli_close($bdd);

    }

    delete($_GET['id']);
    ?>

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
</body>


</html>