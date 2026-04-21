<?php

class Instructions
{
    private $id, $id_anomalie, $texte, $date, $status;

    /**
     * @param $id
     * @param $id_anomalie
     * @param $texte
     * @param $date
     * @param $status
     */
    public function __construct($id, $id_anomalie, $texte, $date, $status)
    {
        $this->id = $id;
        $this->id_anomalie = $id_anomalie;
        $this->texte = $texte;
        $this->date = $date;
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
    public function getIdAnomalie()
    {
        return $this->id_anomalie;
    }

    /**
     * @return mixed
     */
    public function getTexte()
    {
        return $this->texte;
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
    public function getStatus()
    {
        return $this->status;
    }



    public static function keys(){ return new AES(""); }

    public static function toDoList($query){
        $tab = array();
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Instructions($i->id, $i->id_anomalie, self::keys()->decrypt($i->texte), $i->date, $i->status);
            return $tab;
        }
    }
    public static function toDo($query){

        if ($query){
            $i = $query->fetch(PDO::FETCH_OBJ);
            return new Instructions($i->id, $i->id_anomalie, self::keys()->decrypt($i->texte), $i->date, $i->status);
        }
    }

    public static function affichers($query){ return self::toDoList(Query::CRUD($query)); }
    public static function afficher($query){ return self::toDo(Query::CRUD($query)); }

    public function ajouter(){ return Query::CRUD("INSERT INTO `instructions`(`id_anomalie`, `texte`, `status`) VALUES ('$this->id_anomalie','$this->texte','$this->status')"); }
}