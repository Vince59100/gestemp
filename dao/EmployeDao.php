<?php

include_once("../model/Employe.php");
include_once("Commande.php");

class EmployeDAO extends Commande
{

// ---------------------------------------------------------------------------------------------------------------
    function detail($id)
    {

        // $mysqli = new mysqli('127.0.0.1', 'vincent', 'vincent', 'gest_employes');
        parent::connectionBdd();
        $stmt = $mysqli->prepare("SELECT noemp, nom, prenom, emploi, sup, embauche, sal, comm, noserv FROM employes WHERE noemp=?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $rs = $stmt->get_result(); //permet de stocker les resultats du select dans la var rs 
        $tab = $rs->fetch_array(MYSQLI_ASSOC);       //stock dans tab la var rs avec 
        $rs->free();       // Libérer de la mémoire, $rs contient des données
        $mysqli->close();  //Fermer la connexion la connexion a la bdd pour libérer de la mémoire
        return $tab;
    }

// ---------------------------------------------------------------------------------------------------------------

    function ajouterbdd ($postForm) 
    {
            parent::connectionBdd();
            $postForm = $_POST['noemp'].", '".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['emploi']."', ";
            $postForm .= $_POST['sup'].", '".$_POST['embauche']."', '".$_POST['salaire']."', '".$_POST['comm']."', ";
            $postForm .= $_POST['noserv'].", '".date("Y-m-d")."'"; //RECUPERATION DE TOUTES LES DONNEES CAPTE VIA LE FORM DANS UNE VARIABLE//
            $query = mysqli_query("INSERT INTO employes VALUES($postForm)");
            $mysqli->close();
    }
    ajouterbdd($postForm);

// ---------------------------------------------------------------------------------------------------------------

    function delete($id)
    {

        parent::connectionBdd();
        $query = mysqli_query("DELETE FROM employes WHERE noemp='".$id."' ;");
        $mysqli->close();
    }
    delete($_GET['id']);

// ---------------------------------------------------------------------------------------------------------------

    function modifierEmploye($postForm) {                       //l'argument peut prendre n'importequel nom 

        parent::connectionBdd();
            
        $postForm =  "noemp = ".$_POST['noemp'].", ";
        $postForm .= "nom = '".$_POST['nom']."', ";
        $postForm .= "prenom = '".$_POST['prenom']."', ";
        $postForm .= "emploi = '".$_POST['emploi']."', ";
        $postForm .= "sup = ".$_POST['sup'].", ";
        $postForm .= "embauche = '".$_POST['embauche']."', ";
        $postForm .= "sal = '".$_POST['sal']."', ";
        $postForm .= "comm = '".$_POST['comm']."', ";
        $postForm .= "noserv = ".$_POST['noserv'];

    
        $query = query("UPDATE employes SET $postForm WHERE noemp=".$_POST['noemp']);
        $mysqli->close();
    
        header("Location: index.php");
    
        if($mysqli->error)
        {
            echo "erreur de query : " . $mysqli->error;
        }
        }
    modifierEmploye($postForm);

// ---------------------------------------------------------------------------------------------------------------

    function login()
    {
        session_start();

        $_POST['username'];
        $_POST['mdp'];

        parent::connectionBdd();
        if($mysqli->connect_error){
            die("connection failed : ".$mysqli->connect_error);
        } else{
            $query = "SELECT * FROM users WHERE username = '".$_POST['username']."'";
            $statement = $mysqli->query($query);
            if($statement->num_rows > 0){
                $row = $statement->fetch_array();

                if(password_verify($_POST['mdp'], $row['hasha'])){
                    $_SESSION['user'] = array(
                        'id'        =>     $row['id'],
                        'username'  =>     $row['username'],
                        'email'     =>     $row['email'],
                        'rang'      =>     $row['rang']
                    );
                    header("Location: index.php");
                } else {
                    echo "wrong password";
                }
            } else {
                echo "username doesn't exist";
            }
        }
    }

    login();

// ---------------------------------------------------------------------------------------------------------------

    function signIn()
    {
        if($_POST['register'] == "register"){ 
            $userName = $_POST['username'];
            $mdp = $_POST['mdp'];
            $id = "";

            //Validation des données//
            if(empty($userName) || empty($mdp)){
                header("Location: ../register_page.php");
            } else if(!preg_match("#^[a-zA-Z0-9]*$#", $userName)){
                header("Location: ../register_page.php");
            
            //Validation OK//
            } else {

                //CONNECTION BDD//
                $DB = new mysqli("127.0.0.1", "vincent", "vincent", "gest_employes");
                if($DB->connect_error){
                    die("connection failed :".$DB->connect_error);
                
                } else { 
                    $hashMdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);     //Création du hash//

                    //QUERY SQL
                    /*
                    *attention à bien insérer les ? dans l'ordre des colonnes
                    *dans bind_param le première argument est le type des variables
                    * 
                    */
                    $query = "INSERT INTO users VALUES(?, ?, ?, ?, ?)"; 
                    $statement = $DB->prepare($query);
                    $statement->bind_param("ssssi", $id, $_POST['email'], $userName, $hashMdp, $_POST['rang']);
                    $statement->execute();

                    if($DB->error){
                        echo "error :".$DB->error;
                    } else { //REDIRECTION//
                        echo "inscription réussi <br> <br>";
                        echo "<a href=\"login_page.php\">CONNECTEZ-VOUS</a>";
                    }
                }
            }
        }
    }

    signIn();

}