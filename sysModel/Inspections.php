<?php

class Inspections
{
    private $id, $inspection, $frequence, $date, $status;

    /**
     * @param $id
     * @param $inspection
     * @param $frequence
     * @param $date
     * @param $status
     */
    public function __construct($id, $inspection, $frequence, $date, $status)
    {
        $this->id = $id;
        $this->inspection = $inspection;
        $this->frequence = $frequence;
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
    public function getInspection()
    {
        return $this->inspection;
    }

    /**
     * @return mixed
     */
    public function getFrequence()
    {
        return $this->frequence;
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
        $key = self::keys();
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Inspections($i->id, $key->decrypt($i->inspection), $key->decrypt($i->frequence), $i->date, $i->status);
            return $tab;
        }
    }
    public static function toDo($query){
        $key = self::keys();
        if ($query){
            $i = $query->fetch(PDO::FETCH_OBJ);
            return new Inspections($i->id, $key->decrypt($i->inspection), $key->decrypt($i->frequence), $i->date, $i->status);
        }
    }
    public static function affichers($query){ return self::toDoList(Query::CRUD($query)); }
    public static function afficher($query){ return self::toDo(Query::CRUD($query)); }

    public function ajouter(){
        Query::CRUD("INSERT INTO `inspections`(`inspection`, `frequence`,`status`) VALUES ('$this->inspection','$this->frequence','$this->status')");
    }


}