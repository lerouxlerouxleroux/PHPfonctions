<?php
// héritage
include 'Players.class.php';


class Footballer extends Player //extention de player, classe fille et classe parent
{
    private $salaire = 1800; //propriété définie au niveau de la classe fille
    //cette propriété s'ajoute à celle provenant de la classe mère

    public function getSalaire() 
    {
        return $this->salaire;
    }
 
    public function setSalaire($value) 
    {
    
    $this->salaire = $value;
    
    }
}



?>