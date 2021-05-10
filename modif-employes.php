<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Modifier une personne</title>
</head>
<body>

<?php

$bdd = mysqli_init();
mysqli_real_connect($bdd, "127.0.0.1", "vincent", "vincent", "gest_employes");
$result = mysqli_query($bdd, "SELECT* FROM employes WHERE noemp='$_GET[id]';");
$donnees = mysqli_fetch_all($result, MYSQLI_ASSOC); //RECUP DES DONNEES//
?>
    <form method="POST" action="modifier-employes.php">

        <input type="number" class="form-control" name="noemp" placeholder="votre noemp" value="<?php echo $donnees[0]['noemp'] ?>">
        <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom" value="<?php echo $donnees[0]['nom'] ?>">  
        <input type="text" class="form-control" name="prenom" placeholder="Entrez votre prénom" value="<?php echo $donnees[0]['prenom'] ?>">
        <input type="text" class="form-control" name="emploi" placeholder="Entrez votre emploi"value="<?php echo $donnees[0]['emploi'] ?>">
        <input type="text" class="form-control" name="sup" placeholder="Entrez votre supérieur"value="<?php echo $donnees[0]['sup'] ?>">
        <input type="date" class="form-control" name="embauche" placeholder="Entrez votre date d'entrée"value="<?php echo $donnees[0]['embauche'] ?>">
        <input type="number" class="form-control" name="sal" placeholder="Entrez votre salaire"value="<?php echo $donnees[0]['sal'] ?>">
        <input type="number" class="form-control" name="comm" placeholder="Entrez votre comm"value="<?php echo $donnees[0]['comm'] ?>">
        <input type="number" class="form-control" name="noserv" placeholder="Entrez votre numéro de service"value="<?php echo $donnees[0]['noserv'] ?>">
       
        <input type="submit" class="btn btn-success" value="Soumettre">
    </form>
    
</body>
</html>