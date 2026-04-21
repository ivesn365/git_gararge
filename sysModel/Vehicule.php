<?php

class Vehicule
{
    private $id;
    private $marque;
    private $type;
    private $numero_chassier;
    private $chevot_vapeur;
    private $couleur;
    private $numero_plaque;
    private $date_en_service;
    private $date_fabrication;
    private $nbre_place;
    private $nom_proprietaire;
    private $kilometrage;
    private $prochaine_inspection;
    private $prochaine_entretiens;
    private $modifier_la;
    private $status;

    /**
     * @param $id
     * @param $marque
     * @param $type
     * @param $numero_chassier
     * @param $chevot_vapeur
     * @param $couleur
     * @param $numero_plaque
     * @param $date_en_service
     * @param $date_fabrication
     * @param $nbre_place
     * @param $nom_proprietaire
     * @param $kilometrage
     * @param $prochaine_inspection
     * @param $prochaine_entretiens
     * @param $modifier_la
     * @param $status
     */
    public function __construct($id, $marque, $type, $numero_chassier, $chevot_vapeur, $couleur, $numero_plaque, $date_en_service, $date_fabrication, $nbre_place, $nom_proprietaire, $kilometrage, $prochaine_inspection, $prochaine_entretiens, $modifier_la, $status)
    {
        $this->id = $id;
        $this->marque = $marque;
        $this->type = $type;
        $this->numero_chassier = $numero_chassier;
        $this->chevot_vapeur = $chevot_vapeur;
        $this->couleur = $couleur;
        $this->numero_plaque = $numero_plaque;
        $this->date_en_service = $date_en_service;
        $this->date_fabrication = $date_fabrication;
        $this->nbre_place = $nbre_place;
        $this->nom_proprietaire = $nom_proprietaire;
        $this->kilometrage = $kilometrage;
        $this->prochaine_inspection = $prochaine_inspection;
        $this->prochaine_entretiens = $prochaine_entretiens;
        $this->modifier_la = $modifier_la;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getNumeroChassier()
    {
        return $this->numero_chassier;
    }

    /**
     * @return mixed
     */
    public function getChevotVapeur()
    {
        return $this->chevot_vapeur;
    }

    /**
     * @return mixed
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * @return mixed
     */
    public function getNumeroPlaque()
    {
        return $this->numero_plaque;
    }

    /**
     * @return mixed
     */
    public function getDateEnService()
    {
        return $this->date_en_service;
    }

    /**
     * @return mixed
     */
    public function getDateFabrication()
    {
        return $this->date_fabrication;
    }

    /**
     * @return mixed
     */
    public function getNbrePlace()
    {
        return $this->nbre_place;
    }

    /**
     * @return mixed
     */
    public function getNomProprietaire()
    {
        return $this->nom_proprietaire;
    }

    /**
     * @return mixed
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * @return mixed
     */
    public function getProchaineInspection()
    {
        return $this->prochaine_inspection;
    }

    /**
     * @return mixed
     */
    public function getProchaineEntretiens()
    {
        return $this->prochaine_entretiens;
    }

    /**
     * @return mixed
     */
    public function getModifierLa()
    {
        return $this->modifier_la;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }


    public static function key(){ return new AES('T/r9k4Yd,shdg6,%t3Q*-/('); }

    public static function toDoList($query){
        $tab = array();
        $key = self::key();
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Vehicule($i->id, $key->decrypt($i->marque), $key->decrypt($i->type_vehicule), $key->decrypt($i->numero_chassier), $key->decrypt($i->chevot_vapeur), $key->decrypt($i->couleur), $key->decrypt($i->numero_plaque), $key->decrypt($i->date_en_service), $key->decrypt($i->date_fabrication), $i->nbre_place, $key->decrypt($i->nom_proprietaire), $i->kilometrage, $i->prochaine_inspection, $i->prochaine_entretiens, $i->modifier_la, $i->status);
            return $tab;
        }
    }
    public static function toDo($query){
        $key = self::key();
        if ($query){
            $i = $query->fetch(PDO::FETCH_OBJ);
            return new Vehicule($i->id, $key->decrypt($i->marque), $key->decrypt($i->type_vehicule), $key->decrypt($i->numero_chassier), $key->decrypt($i->chevot_vapeur), $key->decrypt($i->couleur), $key->decrypt($i->numero_plaque), $key->decrypt($i->date_en_service), $key->decrypt($i->date_fabrication), $i->nbre_place, $key->decrypt($i->nom_proprietaire), $i->kilometrage, $i->prochaine_inspection, $i->prochaine_entretiens, $i->modifier_la, $i->status);
        }
    }

    public static function affichers($query){ return self::toDoList(Query::CRUD($query)); }
    public static function afficher($query){ return self::toDo(Query::CRUD($query)); }

    public function ajouter(){
        return Query::CRUD("INSERT INTO `vehicule`(`marque`, `type_vehicule`, `numero_chassier`, `chevot_vapeur`, `couleur`, `numero_plaque`, `date_en_service`, `date_fabrication`, `nbre_place`, `nom_proprietaire`, `kilometrage`, `prochaine_inspection`, `prochaine_entretiens`,  `status`) VALUES ('$this->marque','$this->type','$this->numero_chassier','$this->chevot_vapeur','$this->couleur','$this->numero_plaque','$this->date_en_service','$this->date_fabrication','$this->nbre_place','$this->nom_proprietaire','$this->kilometrage','$this->prochaine_inspection','$this->prochaine_entretiens','$this->status')");
    }

}