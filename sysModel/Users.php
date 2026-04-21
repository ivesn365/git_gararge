<?php

class Users
{
    private $id, $matricule, $username, $password, $role, $status, $date;

    /**
     * @param $id
     * @param $matricule
     * @param $username
     * @param $password
     * @param $role
     * @param $status
     * @param $date
     */
    public function __construct($id, $matricule, $username, $password, $role, $status, $date)
    {
        $this->id = $id;
        $this->matricule = $matricule;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->status = $status;
        $this->date = $date;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
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
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }





    public static function key(){ return new AES('T/r9k4Yg6,%t3Q*-/('); }



    public static function toDoList2($query){
        $key = self::key();
        if ($query)
        {
            while ($i = $query->fetch(PDO::FETCH_OBJ)){
                $tab[] = new Users($i->id, $key->decrypt($i->matricule),$key->decrypt($i->username), 1, $key->decrypt($i->role), $i->status, $i->date);

            }
            return $tab;
        }
    }
    public static function toDoList($query){
        $key = self::key();
        if ($query)
        {
           $i = $query->fetch(PDO::FETCH_OBJ);
              return  new Users($i->id, $key->decrypt($i->matricule),$key->decrypt($i->username), 1, $key->decrypt($i->role), $i->status, $i->date);



        }
    }
    public static function afficher($query)
    { return self::toDoList(Query::CRUD($query)); }
    public static function afficher2($query){ return self::toDoList2(Query::CRUD($query)); }

    public function ajouter(){
        return Query::CRUD("INSERT INTO users(`matricule`,`username`, `password`,`role`, `status`) VALUES ('$this->matricule', '$this->username', '$this->password',  '$this->role','$this->status')");
    }

}