<?php

//INITIALISATION
include_once("connexionbdd.php"); //connexion bdd
session_start(); 

//affichage login
if(isset($_SESSION['user'])){   //['user'] est un tableau crée dans le logincode.php L.20 //
    $welcome = "Welcome ".$_SESSION['user']['username']." (".$_SESSION['user']['rang'].")<br><br>";
} else { 
    $welcome = "<a href=\"login_page.php\"><br><br>"; 
}

//COMPTEUR
$result = $conn->query("SELECT COUNT(date_ajout) FROM employes where date_ajout = DATE_FORMAT(SYSDATE(), '%Y-%m-%d')");  //SELECTIONNE LA DONNEE//                           
if($result->num_rows > 0) {
    $row = $result->fetch_all(MYSQLI_ASSOC);
    $compteur = "Nombre d'employes : ".$row[0]["COUNT(date_ajout)"];
}   

//Création de la table employes
$rows = "";
$result1 = $conn->query("SELECT distinct sup from employes where sup is not null");
$sup = $result1->fetch_all(MYSQLI_ASSOC);
$result2 = $conn->query("SELECT * FROM employes"); 
while ($donnees = $result2->fetch_assoc()) 
{
    $rows .= "<tr>";
    $rows .= "<td hidden> ". $donnees['noemp']." </td>";  
    $rows .= "<td>". $donnees['nom'] ." </td>";
    $rows .= "<td>". $donnees['prenom'] ." </td>";
    $rows .= "<td>". $donnees['emploi'] ." </td>";
    $rows .= "<td>". $donnees['sup'] ." </td>";
    $rows .= "<td>". $donnees['noserv'] ." </td>";

    if ($donnees['sup'] == NULL || $donnees['sup'] != "" ) {                        //EST CE QUE CETTE PERSONNE EST LE CHEF//
                                                                                    //EST CE LE SUP DE QUELQUUN//
        $isSup = false;
        for($j = 0; $j < count($sup); $j++) {                                       //SI CE NEST PAS LE CHEF ON ENTRE DANS CETTE BOUCLE//
                if ($sup[$j]['sup'] == $donnees['noemp']) {
                $isSup = true;
                break;
            }
        }
    }
    $rows .= "<td>";
    $rows .= "<a href='detail-employes.php?id=".$donnees['noemp']."'>Détails</a>"; 
    if (null === $_SESSION['user'] || $_SESSION['user']['rang'] != 1) {
        $_SESSION['user']['rang'] = 2; 
    } else {
        $rows .= "&nbsp;|&nbsp;<a href='modif-employes.php?id=".$donnees['noemp']."'>Modifier</a>";
        if (!$isSup) {
            $rows .= "&nbsp;|&nbsp;<a href='supprimer-employes.php?id=".$donnees ['noemp']."'>Supprimer</a>";    
        }
    }
    $rows .= "</td></tr>"; 
}
echo $donnees;
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
    <?php
     echo $welcome.$compteur; ?>
    &nbsp;|&nbsp;<a href='ajouter.php'>Ajouter</a>&nbsp;&nbsp;|&nbsp;&nbsp; 

    <?php if($_SESSION['user']['rang'] = 1)
    {echo "<a href='deconnexion.php'>Deconnexion</a>";} else {}
    ?> 

    &nbsp;&nbsp;|&nbsp;&nbsp; <a href='loginPage.php'>Se connecter</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">nom</th>
                <th scope="col">prenom</th>
                <th scope="col">emploi</th>
                <th scope="col">sup</th>
                <th scope="col">noserv</th>
                <th scope="col">date_ajout</th>
            </tr>
        </thead>
        <?php echo $rows; ?>
    </table>
    
</body>


</html>



<!-- // exercice :

/**
 * - Utiliser la BDD gestion_employes
 * - Afficher les employes dans un tableau HTML(BOOTSTRAP): nom, prenom, emploi, superieur, service
 * - Pour chaque ligne du tableau : boutton detail, modifier, supprimer
 * - En haut du tableau, un bouton pou' l'ajout d'un nouvel employé
 * - Même chose pour les services
 */ -->
