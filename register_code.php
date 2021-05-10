<?php

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
                    echo "<a href=\"loginPage.php\">CONNECTEZ-VOUS</a>";
                }
            }
        }
    }
}

signIn();

?>