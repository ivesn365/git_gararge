<?php

class Course
{
    private $id, $vehicule, $chauffeur, $date_course,$destination,$status, $date_create,$course_realise, $index_km, $carburant, $course_prevue;

    /**
     * @param $id
     * @param $vehicule
     * @param $chauffeur
     * @param $date_course
     * @param $destination
     * @param $status
     * @param $date_create
     * @param $course_realise
     * @param $index_km
     * @param $carburant
     * @param $course_prevue
     */
    public function __construct($id, $vehicule, $chauffeur, $date_course, $destination, $status, $date_create, $course_realise, $index_km, $carburant, $course_prevue)
    {
        $this->id = $id;
        $this->vehicule = $vehicule;
        $this->chauffeur = $chauffeur;
        $this->date_course = $date_course;
        $this->destination = $destination;
        $this->status = $status;
        $this->date_create = $date_create;
        $this->course_realise = $course_realise;
        $this->index_km = $index_km;
        $this->carburant = $carburant;
        $this->course_prevue = $course_prevue;
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
    public function getVehicule()
    {
        return $this->vehicule;
    }

    /**
     * @return mixed
     */
    public function getChauffeur()
    {
        return $this->chauffeur;
    }

    /**
     * @return mixed
     */
    public function getDateCourse()
    {
        return $this->date_course;
    }

    /**
     * @return mixed
     */
    public function getDestination()
    {
        return $this->destination;
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
    public function getDateCreate()
    {
        return $this->date_create;
    }

    /**
     * @return mixed
     */
    public function getCourseRealise()
    {
        return $this->course_realise;
    }

    /**
     * @return mixed
     */
    public function getIndexKm()
    {
        return $this->index_km;
    }

    /**
     * @return mixed
     */
    public function getCarburant()
    {
        return $this->carburant;
    }

    /**
     * @return mixed
     */
    public function getCoursePrevue()
    {
        return $this->course_prevue;
    }


    public static function toDoList($query){
        $keys = Panne::key();
        $tab = array();
        if ($query){
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Course($i->id, $i->vehicule, $i->chauffeur, $i->date_course, $keys->decrypt($i->destination), $i->status, $i->date_create, $i->course_realise, $i->index_km, $i->carburant, $i->course_prevue);
            return $tab;
        }

    }
    public static function toDo($query){
        $keys = Panne::key();
        if ($query){
            $i = $query->fetch(PDO::FETCH_OBJ);
            return new Course($i->id, $i->vehicule, $i->chauffeur, $i->date_course, $keys->decrypt($i->destination), $i->status, $i->date_create, $i->course_realise, $i->index_km, $i->carburant, $i->course_prevue);
        }

    }
    public static function affichers($query){ return self::toDoList(Query::CRUD($query)); }
    public static function afficher($query){ return self::toDo(Query::CRUD($query)); }

    public function ajouter(){
        Query::CRUD("INSERT INTO `course`(`vehicule`, `chauffeur`, `date_course`, `destination`, `course_realise`, `index_km`, `carburant`, `course_prevue`, `status`) VALUES ('$this->vehicule','$this->chauffeur','$this->date_course','$this->destination','$this->course_realise','$this->index_km','$this->carburant','$this->course_prevue','$this->status')");
    }
    public static function countPanne($mois, $status){
        if($status == 1)
            return Query::CRUD("SELECT * FROM course WHERE (DATE_FORMAT(date_create,'%Y-%m')='$mois')")->rowCount();
        else return Query::CRUD("SELECT * FROM course WHERE (DATE_FORMAT(date_create,'%Y-%m')='$mois') AND status='$status'")->rowCount();
    }


}