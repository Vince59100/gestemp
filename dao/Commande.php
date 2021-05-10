<?php

class Commande 
{
    
    protected function connectionBdd()
    {
        $mysqli = new mysqli("127.0.0.1", "vincent", "vincent", "gest_employes");
        return $mysqli
    }

}

?>