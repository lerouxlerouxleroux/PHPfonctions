<?php

class Client
{  //propriétés
    public $nom; // propriété de la class, accès par$this, public accessible depuis l'extérieur de la classe
    public $prenom; // idem
    private $nb_cb; // accessible par getteur, accessible à l'int de la methode, mais inaccessible depuis l'ext. on recourt à une methode d'acces(getNbCb)

    // méthodes
    // constructeur, celle qui s'execute à l'instanciations
    function __construct($nom, $prenom, $nb_cb) 
    {
        // le nom des arguments frounis en entrée est arbitraire, 
        //ils ne doivent pas forcément être identiques aux noms des propriétés
       
        // hydratation, on fournit des valeurs aux propriétés
        $this->nom = $nom; //l'objet instancie
        $this->prenom = $prenom;
       // $this->nb_cb = $nb_cb; // hydratation de l'objet // modification direct sans controle
        $this->setNbCb($nb_cb); // modification vie une methode setteur, intéret: avant de mofier c'est d'effectuer le controle
    }

    public function isCbValid() 
    {
        // on retire les espaces éventuels
        $cb_no_spaces = str_replace(' ','', $this->nb_cb); //version sans espace/ ^this reprend tout la haut
        
        //on v&rifie que le numéro de cb contient 16 caractères
        if (strlen($cb_no_spaces) == 16) {
            return true;
        } else {
            return false;
        }




    }


//methode à usage interne, non accessible depuis l'extérieur de la classe
    private function isCbOk($nb_cb) 
    {

    $cb_no_spaces = str_replace(' ','', $nb_cb); //version sans espace/ ^this reprend tout la haut
        
        //on v&rifie que le numéro de cb contient 16 caractères
        if (strlen($cb_no_spaces) == 16) {
            return true;
        } else {
            return false;
        }  
    }

    // Getter, fonction pour obtenir de l'info
    //accéder à une propriété via une methode (accesseur)
    // permet d'effectuer un controle avant de renvoyer la valeur
    //exemple: on renvoie le numéro de cb uniquement si l'utilisateur 
    // du site est logué en tant qu'administrateur
    public function getNbCb()

    {
    
    return $this->nb_cb;

    }
  

  //Mutateur (Setteur) permet de définir
    //modifie une propriété via une methode
      // permet d'effectuer un controle avant de modifier la valeur
    //exemple: on modifie le numéro de cb uniquement si l'utilisateur 
    // du site est logué en tant qu'administrateur
    public function setNbCb($value)
    
    {   

        if($this->isCbOk($value)) 
            {
                 $this->nb_cb = $value;

        } // on autorise la modification
      

    }




}








?>