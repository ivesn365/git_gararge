<?php

class Garage
{
    private $id;
    private $date_debut;
    private $date_fin;
    private $idAgent;
    private $debut;
    private $fin;
    private $niveau;
    private $ctrl_q;
    private $idpanne;
    private $status;

    /**
     * @param $id
     * @param $date_debut
     * @param $date_fin
     * @param $idAgent
     * @param $debut
     * @param $fin
     * @param $niveau
     * @param $ctrl_q
     * @param $idpanne
     * @param $status
     */
    public function __construct($id, $date_debut, $date_fin, $idAgent, $debut, $fin, $niveau, $ctrl_q, $idpanne, $status)
    {
        $this->id = $id;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->idAgent = $idAgent;
        $this->debut = $debut;
        $this->fin = $fin;
        $this->niveau = $niveau;
        $this->ctrl_q = $ctrl_q;
        $this->idpanne = $idpanne;
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
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @return mixed
     */
    public function getIdAgent()
    {
        return $this->idAgent;
    }

    /**
     * @return mixed
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * @return mixed
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * @return mixed
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * @return mixed
     */
    public function getCtrlQ()
    {
        return $this->ctrl_q;
    }

    /**
     * @return mixed
     */
    public function getIdpanne()
    {
        return $this->idpanne;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    public static function keys(){ return new AES(""); }

    public static function toDoList($query){
        $key = self::keys();
        $tab = array();
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Garage($i->id, $key->decrypt($i->date_debut), $key->decrypt($i->date_fin), $i->idAgent, $key->decrypt($i->debut), $key->decrypt($i->fin), $key->decrypt($i->niveau), $key->decrypt($i->ctrl_q), $i->idpanne, $i->status);
            return $tab;
        }
    }
    public static function toDo($query){
        $key = self::keys();
        if ($query){
          $i = $query->fetch(PDO::FETCH_OBJ);
             return new Garage($i->id, $key->decrypt($i->date_debut), $key->decrypt($i->date_fin), $i->idAgent, $key->decrypt($i->debut), $key->decrypt($i->fin), $key->decrypt($i->niveau), $key->decrypt($i->ctrl_q), $i->idpanne, $i->status);

        }
    }

    public static function affichers($query){ return self::toDoList(Query::CRUD($query)); }
    public static function afficher($query){ return self::toDo(Query::CRUD($query)); }

    public function ajouter(){
        Query::CRUD("INSERT INTO `garage`(`date_debut`, `date_fin`, `idAgent`, `debut`, `fin`, `niveau`, `ctrl_q`, `idpanne`, `status`) VALUES ('$this->date_debut','$this->date_fin','$this->idAgent','$this->debut','$this->fin','$this->niveau','$this->ctrl_q','$this->idpanne','$this->status')");
    }
    public static function countPanne($mois, $status){
        return Query::CRUD("SELECT * FROM garage WHERE (DATE_FORMAT(date,'%Y-%m')='$mois') AND status='$status'")->rowCount();
    }

}