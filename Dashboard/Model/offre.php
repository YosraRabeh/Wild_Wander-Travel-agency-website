 
<?php
class Offre
{

    private $ID_offre = null ;
    private $nom_offre=null ;
    private $date_debut=null ;
    private $date_fin=null ;
    
    function __construct($nom_offre,$date_debut,$date_fin)
    {
        $this->nom_offre = $nom_offre;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
    }

    function getID_offre()
    {
        return $this->ID_offre;
    }


    function getnom_offre()
    {
        return $this->nom_offre;
    }
    function setnom_offre(string $nom_offre)
    {
        $this->nom_offre = $nom_offre;
    }


    function getdate_debut()
    {
        return $this->date_debut;
    }
    function setdate_debut(string $date_debut)
    {
        $this->date_debut = $date_debut;
    }



    function getdate_fin()
    {
        return $this->date_fin;
    }
    function setdate_fin(string $date_fin)
    {
        $this->date_fin = $date_fin;
    }




}
?>