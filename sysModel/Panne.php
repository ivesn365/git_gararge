<?php

class Panne
{
    private $id;
    private $id_agent;
    private $date;
    private $idvehicule;
    private $body;
    private $niveau;
    private $kilometrage;
    private $status;

    /**
     * @param $id
     * @param $id_agent
     * @param $date
     * @param $idvehicule
     * @param $body
     * @param $niveau
     * @param $kilometrage
     * @param $status
     */
    public function __construct($id, $id_agent, $date, $idvehicule, $body, $niveau, $kilometrage, $status)
    {
        $this->id = $id;
        $this->id_agent = $id_agent;
        $this->date = $date;
        $this->idvehicule = $idvehicule;
        $this->body = $body;
        $this->niveau = $niveau;
        $this->kilometrage = $kilometrage;
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
    public function getIdAgent()
    {
        return $this->id_agent;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getIdvehicule()
    {
        return $this->idvehicule;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
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
    public function getKilometrage()
    {
        return $this->kilometrage;
    }



    public static function key(){
        return new AES("qwety90penmmnsmnsnnnnnnn;l;;l;ll;l;;nnnnn");
    }

    public static function toDoList($query){
        $tab = array();
        $key = self::key();
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Panne($i->id, $i->id_agent, $i->date, $i->idvehicule, $key->decrypt($i->body),$key->decrypt($i->niveau), $i->kilometrage, $i->status);
            return $tab;
        }
    }
    public static function toDo($query){
        $key = self::key();
        if ($query){
           $i = $query->fetch(PDO::FETCH_OBJ);
            return new Panne($i->id, $i->id_agent, $i->date, $i->idvehicule, $key->decrypt($i->body),$key->decrypt($i->niveau),$i->kilometrage, $i->status);
        }
    }
    public static function affichers($query){ return self::toDoList(Query::CRUD($query)); }
    public static function afficher($query){ return self::toDo(Query::CRUD($query)); }

    public function ajouter(){
        return Query::CRUD("INSERT INTO `panne`(`id_agent`, `idvehicule`, `body`, `niveau`,`kilometrage`, `status`) VALUES ('$this->id_agent','$this->idvehicule','$this->body','$this->niveau','$this->kilometrage','$this->status')");
    }
    public static function countPanne($mois, $status){
        return Query::CRUD("SELECT * FROM panne WHERE (DATE_FORMAT(date,'%Y-%m')='$mois') AND status='$status'")->rowCount();
    }
}