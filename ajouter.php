<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Ajouter une personne</title>
</head>
<body>
    <form action="ajouterbdd.php" method="POST">

        <input type="number" class="form-control" name="noemp" placeholder="Entrez votre numéro d'employé"> 
        <input type="text" class="form-control" name="nom" placeholder="Entrez votre nom">
        <input type="text" class="form-control" name="prenom" placeholder="Entrez votre prénom">
        <input type="text" class="form-control" name="emploi" placeholder="Entrez votre emploi">
        <input type="text" class="form-control" name="sup" placeholder="Entrez votre supérieur">
        <input type="date" class="form-control" name="embauche" placeholder="Entrez votre date d'entrée">
        <input type="number" class="form-control" name="salaire" placeholder="Entrez votre salaire">
        <input type="number" class="form-control" name="comm" placeholder="Entrez votre comm">
        <input type="number" class="form-control" name="noserv" placeholder="Entrez votre numéro de service">
        <input type="submit" class="btn btn-success" name="valider" value="valider">
    </form>
    
</body>
</html>