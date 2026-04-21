<?php

class Planing
{
    private $id, $idagent, $plaque, $date_debut, $date_fin, $contenue,$indexe, $status;

    /**
     * @param $id
     * @param $idagent
     * @param $plaque
     * @param $date_debut
     * @param $date_fin
     * @param $contenue
     * @param $status
     */
    public function __construct($id, $idagent, $plaque, $date_debut, $date_fin, $contenue,$indexe, $status)
    {
        $this->id = $id;
        $this->idagent = $idagent;
        $this->plaque = $plaque;
        $this->date_debut = $date_debut;
        $this->date_fin = $date_fin;
        $this->contenue = $contenue;
        $this->indexe = $indexe;
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
    public function getIdagent()
    {
        return $this->idagent;
    }

    /**
     * @return mixed
     */
    public function getPlaque()
    {
        return $this->plaque;
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
    public function getContenue()
    {
        return $this->contenue;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    public function getIndexe()
    {
        return $this->indexe;
    }



    public static function keys(){ return new AES(''); }

    public static function toDoList($query)
    {
        $key = self::keys();
        if ($query)
        {
            while ($i = $query->fetch(PDO::FETCH_OBJ))
                $tab[] = new Planing($i->id, $i->idagent, $key->decrypt($i->plaque), $i->date_debut, $i->date_fin, ($key->decrypt($i->contenue)),$i->indexe,$i->status);
            return $tab;
        }
    }

    public static function Afficher($query){ return self::toDoList(Query::CRUD($query)); }

    public function Ajouter(){
        Query::CRUD("INSERT INTO `planing`(`idagent`, `plaque`, `date_debut`, `date_fin`, `contenue`,`indexe`, `status`) VALUES ('$this->idagent','$this->plaque','$this->date_debut','$this->date_fin','$this->contenue','$this->indexe','$this->status')");
    }

    public static function NbrePanne($plaque){
        $som = 0;
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$plaque'");
        if ($query)
        {
            foreach ($query as $i)
                $som++;
            return $som;
        }else
            return $som;
    }
    public static function Verifier($plaque)
    {

        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$plaque' AND DAY(`date_fin`) <= DAY(NOW()) AND MONTH(`date_fin`) <= MONTH(NOW()) AND YEAR(`date_fin`) <= YEAR(NOW())  AND status=0");
        if ($query)
        {
            return true;
        }else
            return false;

    }

    public static function NbrePanneMecano($id){
        $som = 0;
        $query = self::Afficher("SELECT * FROM `planing` WHERE idagent='$id'");
        if ($query)
        {
            foreach ($query as $i)
                $som++;
            return $som;
        }else
            return $som;
    }

    public static function json(){
        $query = self::Afficher("SELECT * FROM `planing`");
        if ($query)
        {
            foreach ($query as $i)
                $tab[] = array("id"=>$i->getId(),"plaque"=>$i->getPlaque(),"date_debut"=>$i->getDateDebut(),"date_fin"=>$i->getDateFin(),"contenue"=>$i->getContenue());
            echo json_encode($tab);
        }
    }

    public static function verifierTache($plaque, $date){
        $p = self::keys()->encrypt($plaque);
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND date_debut='$date'");
        if ($query)
        {
            foreach ($query as $i)
                return ucfirst($i->getContenue());
        }
    }

    public static function verifierComments($plaque, $date){
        $p = self::keys()->encrypt($plaque);
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND date_debut='$date'");
        if ($query)
        {
            foreach ($query as $i)
                return $i->getDateFin();
        }
    }

    public static function verifierComments2($plaque, $date, $contenue){
        $p = self::keys()->encrypt($plaque);
        $contenues = self::keys()->encrypt($contenue);
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND date_debut='$date' AND contenue='$contenues' ");

        if ($query)
        {

            foreach ($query as $i)
                return $i->getDateFin();
        }
    }

    public static function verifierCommentsContenue($plaque, $date, $contenue){
        $p = self::keys()->encrypt($plaque);
        $contenues = self::keys()->encrypt($contenue);
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND date_debut='$date' AND contenue='$contenues' ");

        if ($query)
        {

            foreach ($query as $i)
                return $i->getContenue();
        }
    }
    public static function verifierDate($plaque, $date){
        $p = self::keys()->encrypt($plaque);
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND date_debut='$date'");
        if ($query)
        {
            foreach ($query as $i)
                return $i->getDateDebut();
        }
    }

    public static function AfficherPLaque($date){

        return self::Afficher("SELECT * FROM `planing` WHERE date_debut='$date'");


    }




    public static function AfficherContenue($date){

        $query = self::Afficher("SELECT * FROM `planing` WHERE date_debut='$date'");
        if ($query)
        {
            foreach ($query as $i)
                return $i->getContenue();
        }
    }



    public static function AfficherContenuePlaqueE($plaque){
        $p = self::keys()->encrypt($plaque);
        $c = self::keys()->encrypt("Entretien");
        $t = 0;
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND contenue='$c'");
        if ($query)
        {
            foreach ($query as $i)
            {
                $t =   $i->getDateDebut();
            }
            $d = new DateTime(date($t));
            return  $d->format('d/m/Y');

        }
    }
    public static function AfficherContenuePlaqueEPanne($plaque, $c){

        $t = 0;
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND contenue='$c'");
        if ($query)
        {
            foreach ($query as $i)
            {
                return  $i->getId();
            }


        }
    }

    public static function Indexe($plaque,$date){

        $p = self::keys()->encrypt($plaque);
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND date_debut='$date'");
        if ($query)
        {
            foreach ($query as $i)
                return $i->getIndexe();
        }
    }

    public static function idPanneV($plaque,$date){

        $p = self::keys()->encrypt($plaque);
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND date_debut='$date'");
        if ($query)
        {
            foreach ($query as $i)
                return $i->getStatus();
        }
    }


    public static function AfficherIndex($date){

        $query = self::Afficher("SELECT * FROM `planing` WHERE date_debut='$date'");
        if ($query)
        {
            foreach ($query as $i)
                return $i->getIndexe();
        }

    }

    public static function AfficherNbreEntretienInspection($date, $tache, $client,$aa){
        $p = self::keys()->encrypt($tache);
        $som = 0;
        $dates = $aa.'-'.$date;
        $pp = self::keys()->encrypt(strtoupper($tache));
        $plaquess = null;
        $cl = self::keys()->encrypt($client);

        $query = Query::CRUD("SELECT * FROM `planing` WHERE (contenue='$p' || contenue='$pp') AND DATE_FORMAT(`modifier_moi`,'%Y-%m') = '$dates' AND plaque IN (SELECT `id_automobile` FROM `affecter` WHERE `nom_entreprise`='$cl')")->rowCount();

        return $query;

    }
    public static function AfficherNbreEntretienInspectionRealise($date, $tache, $client,$aa){
        $p = self::keys()->encrypt($tache);
        $som = 0;
        $dates = $aa.'-'.$date;
        $pp = self::keys()->encrypt(strtoupper($tache));
        $cl = self::keys()->encrypt($client);

        $query = Query::CRUD("SELECT * FROM `planing` WHERE (contenue='$p' || contenue='$pp') AND DATE_FORMAT(`modifier_moi`,'%Y-%m') = '$dates' AND idagent=3 AND plaque IN (SELECT `id_automobile` FROM `affecter` WHERE `nom_entreprise`='$cl')")->rowCount();

        return $query;

    }



    public static function AfficherNbreInspection($date, $tache, $client,$aa){
        $p = self::keys()->encrypt("Entretien");
        $pp = self::keys()->encrypt("ENTRETIEN");
        $som = 0;
        $dates = $aa.'-'.$date;
        $plaquess = null;
        $cl = self::keys()->encrypt($client);

        $query = Query::CRUD("SELECT * FROM `planing` WHERE (contenue!='$p' || contenue!='$pp') AND DATE_FORMAT(`modifier_moi`,'%Y-%m') = '$dates' AND plaque IN (SELECT `id_automobile` FROM `affecter` WHERE `nom_entreprise`='$cl')")->rowCount();

        return $query;

    }
    public static function AfficherNbreInspectionRealise($date, $tache, $client,$aa){
        $p = self::keys()->encrypt("Entretien");
        $pp = self::keys()->encrypt("ENTRETIEN");
        $som = 0;
        $dates = $aa.'-'.$date;
        $cl = self::keys()->encrypt($client);

        $query = Query::CRUD("SELECT * FROM `planing` WHERE (contenue!='$p' || contenue!='$pp') AND DATE_FORMAT(`modifier_moi`,'%Y-%m') = '$dates' AND (status=3 || idagent=3) AND plaque IN (SELECT `id_automobile` FROM `affecter` WHERE `nom_entreprise`='$cl')")->rowCount();

        return $query;

    }





    public static function AfficherNbreInspectionRealiseWeek($date, $tache, $client){
        $p = self::keys()->encrypt("Entretien");
        $som = 0;
        $plaquess = null;
        if($client == 'MUMI') $plaquess = array('6282AB14','6284AB14','6285AB14','6286AB14','6288AB14','6289AB14','6290AB14','6291AB14','6292AB14','6295AB14','6296AB14','1588AB14','6120AB14','5110AB14','3682AR05','2747AB14','3510AT05','6120AB14','2755AB14','0496AS05','8071AA14','3924AR05','5110AB14','0492AS05','6287AB14','9093AA04');
        elseif($client == 'TFM') $plaquess = array('8710AA14','4090AQ05','6264AB14','8254AS05','8256AS05','2621AR05','8036AA14','8705AA14','2748AB14','5991AT05','3684AR05','8978AA14','8977AA14','3362AZ01','8255AS05','2746AB14','4094AQ05');
        elseif($client == 'KAMOA') $plaquess = array('8072AA14','4064AZ01','6119AB14','6183AP05','3362AZ01','6636AC22','6630AC22','4065AZ01','2619AR05','2749AB14','2752AB14');
        elseif($client == 'CongoEquipement') $plaquess = array('6294AB14','2746AB14','2753AB14','6283AB14','8254AS05','7375AA14','8255AS05','8257AS05');

        $query = self::Afficher("SELECT * FROM `planing` WHERE contenue!='$p'");
        if ($query && $plaquess)
        {
            foreach ($query as $i)
            {
                if((strlen($i->getDateDebut()) > 5) && (intval(substr($i->getDateDebut(), 0, 1)) != 0)){
                    $d = new DateTime(date($i->getDateDebut()));
                    if(((self::dateWeekDebut(1) <= intval($d->format('d')) && (self::dateWeekDebut(2) == intval($d->format('m')))) && (self::dateWeekDebut(3) == intval($d->format('Y'))) ) &&
                        ((self::dateWeekFin(1) >= intval($d->format('d'))) && (self::dateWeekFin(2) == intval($d->format('m'))) && (self::dateWeekFin(3) == intval($d->format('Y'))) ) && in_array($i->getPlaque(), $plaquess)   /*&& (intval($aa) == intval($d->format('Y'))) */){
                        $som++;
                    }
                }

            }

        }
        return $som;

    }
    public static function AfficherNbreEntretienRealiseWeek($date, $tache, $client){
        $p = self::keys()->encrypt("Entretien");
        $som = 0;
        $plaquess = null;
        if($client == 'MUMI') $plaquess = array('6282AB14','6284AB14','6285AB14','6286AB14','6288AB14','6289AB14','6290AB14','6291AB14','6292AB14','6295AB14','6296AB14','1588AB14','6120AB14','5110AB14','3682AR05','2747AB14','3510AT05','6120AB14','2755AB14','0496AS05','8071AA14','3924AR05','5110AB14','0492AS05','6287AB14','9093AA04');
        elseif($client == 'TFM') $plaquess = array('8710AA14','4090AQ05','6264AB14','8254AS05','8256AS05','2621AR05','8036AA14','8705AA14','2748AB14','5991AT05','3684AR05','8978AA14','8977AA14','3362AZ01','8255AS05','2746AB14','4094AQ05');
        elseif($client == 'KAMOA') $plaquess = array('8072AA14','4064AZ01','6119AB14','6183AP05','3362AZ01','6636AC22','6630AC22','4065AZ01','2619AR05','2749AB14','2752AB14');
        elseif($client == 'CongoEquipement') $plaquess = array('6294AB14','2746AB14','2753AB14','6283AB14','8254AS05','7375AA14','8255AS05','8257AS05');

        $query = self::Afficher("SELECT * FROM `planing` WHERE contenue='$p'");
        if ($query && $plaquess)
        {
            foreach ($query as $i)
            {
                if((strlen($i->getDateDebut()) > 5) && (intval(substr($i->getDateDebut(), 0, 1)) != 0)){
                    $d = new DateTime(date($i->getDateDebut()));
                    if(((self::dateWeekDebut(1) <= intval($d->format('d')) && (self::dateWeekDebut(2) == intval($d->format('m')))) && (self::dateWeekDebut(3) == intval($d->format('Y'))) ) &&
                        ((self::dateWeekFin(1) >= intval($d->format('d'))) && (self::dateWeekFin(2) == intval($d->format('m'))) && (self::dateWeekFin(3) == intval($d->format('Y'))) ) && in_array($i->getPlaque(), $plaquess)   /*&& (intval($aa) == intval($d->format('Y'))) */){
                        $som++;
                    }
                }

            }

        }
        return $som;

    }

    public static function AfficherAnomalieNonFinie(){
        $p = self::keys()->encrypt("Entretien");
        $som = 0;
        $plaquess = null;
        $tab = array();

        $query = self::Afficher("SELECT * FROM `planing` WHERE status !=3");
        if ($query)
        {

            foreach ($query as $i)
            {
                if(strlen($i->getDateDebut()) > 5 ){

                    $d = new DateTime(date($i->getDateDebut()));
                    if((intval($_SESSION['M'] - 1) == intval($d->format('m')))   && (intval(date('Y')) == intval($d->format('Y'))) ){

                        $tab[] = $i;
                    }
                }

            }

        }
        if($tab){
            $size = sizeof($tab);
            $nbre = rand(1, $size-1);
            return ($tab[$nbre]);

        }


    }


    public static function dateWeekFin($t){
        $premierJour = strftime("%d-%m-%Y", strtotime("this week"));
        $d = new DateTime(date($premierJour));

        $d->modify('+'.(7).'day');
        $jj = intval($d->format('d'));
        $m = intval($d->format('m'));
        $d->format('Y-m-d');
        if($m == intval(date('m'))){
            if($t==1)
                return $jj;
            elseif($t == 2) return $m;
            else return $d->format('Y');
        }else{
            if($t==1)
                return date('t');
            elseif($t == 2) return intval(date('m'));
            else return $d->format('Y');
        }


    }
    public static function dateWeekDebut($t){
        if($t==1)
            return intval(strftime("%d", strtotime("this week")));
        elseif($t == 2) return intval(strftime("%m", strtotime("this week")));
        else return strftime("%Y", strtotime("this week"));

    }


    public static function fullStatusIdPanne($id){
        //$p = self::keys()->encrypt($body);
        // $plaque = self::keys()->encrypt($plaque);
        $query = self::Afficher("SELECT * FROM `planing` WHERE id='$id'  ORDER BY id DESC LIMIT 1");
        if ($query)
        {
            foreach ($query as $i)
            {
                if($i->getStatus() != 1)return $i->getStatus();

            }
        }
    }

    public static function planMNT($id){
        echo Garage::getMecano($id).'&#013;'.'Heure début :'.Carte_travaille::h_debut($id).'&#013;Heure fin:'.Carte_travaille::h_fin($id).'&#013;INDEX:'.Carte_travaille::kilometrageS($id).'&#013;Date d\'aff:'.Garage::getIdPlanning($id);
    }


    public static function AfficherContenueList($plaque, $date){
        $p = self::keys()->encrypt($plaque);
        return self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND date_debut='$date' ORDER BY modifier_moi DESC");

    }

    public static function idPanneV2($plaque,$date, $d){

        $p = self::keys()->encrypt($plaque);
        $query = self::Afficher("SELECT * FROM `planing` WHERE plaque='$p' AND date_debut='$date' AND contenue='$d' AND status=3");
        if ($query)
        {
            foreach ($query as $i)
                return $i->getStatus();
        }
    }

    public static function fullPanneNonAffecter($body,$plaque,$date){
        $p = self::keys()->encrypt($body);
        $plaque = self::keys()->encrypt($plaque);
        $query = self::Afficher("SELECT * FROM `planing` WHERE contenue='$p'  AND date_debut='$date' AND idagent != 0 ORDER BY id DESC");
        if ($query)
        {
            return true;
        }
    }


    public static function AfficherNbrePanne($date, $tache, $client,$aa){
        $p = self::keys()->encrypt("Entretien");
        $som = 0;
        $plaquess = null;
        if($client == 'MUMI') $plaquess = array('6282AB14','6284AB14','6285AB14','6286AB14','6288AB14','6289AB14','6290AB14','6291AB14','6292AB14','6295AB14','6296AB14','1588AB14','6120AB14','5110AB14','3682AR05','2747AB14','3510AT05','6120AB14','2755AB14','0496AS05','8071AA14','3924AR05','5110AB14','0492AS05','6287AB14','9093AA04','6248AB14','6249AB14');
        elseif($client == 'TFM') $plaquess = array('8710AA14','4090AQ05','6264AB14','8254AS05','8256AS05','2621AR05','8036AA14','8705AA14','2748AB14','5991AT05','3684AR05','8978AA14','8977AA14','3362AZ01','8255AS05','2746AB14','4094AQ05');
        elseif($client == 'KAMOA') $plaquess = array('8072AA14','4064AZ01','6119AB14','6183AP05','3362AZ01','6636AC22','6630AC22','4065AZ01','2619AR05','2749AB14','2752AB14');
        elseif($client == 'CongoEquipement') $plaquess = array('6294AB14','2746AB14','2753AB14','6283AB14','8254AS05','7375AA14','8255AS05','8257AS05');

        $query = self::Afficher("SELECT * FROM `planing`");
        if ($query && $plaquess)
        {
            foreach ($query as $i)
            {
                if(strlen($i->getDateDebut()) > 5 ){
                    $d = new DateTime(date($i->getDateDebut()));
                    if((intval($date) == intval($d->format('m'))) && in_array($i->getPlaque(), $plaquess)    && (intval($aa) == intval($d->format('Y'))) ){
                        $som++;
                    }
                }
            }

        }
        return $som;

    }

    public static function AfficherNbrePanneRealiser($date, $tache, $client,$aa){
        $p = self::keys()->encrypt("Entretien");
        $som = 0;
        $plaquess = null;
        if($client == 'MUMI') $plaquess = array('6282AB14','6284AB14','6285AB14','6286AB14','6288AB14','6289AB14','6290AB14','6291AB14','6292AB14','6295AB14','6296AB14','1588AB14','6120AB14','5110AB14','3682AR05','2747AB14','3510AT05','6120AB14','2755AB14','0496AS05','8071AA14','3924AR05','5110AB14','0492AS05','6287AB14','9093AA04');
        elseif($client == 'TFM') $plaquess = array('8710AA14','4090AQ05','6264AB14','8254AS05','8256AS05','2621AR05','8036AA14','8705AA14','2748AB14','5991AT05','3684AR05','8978AA14','8977AA14','3362AZ01','8255AS05','2746AB14','4094AQ05');
        elseif($client == 'KAMOA') $plaquess = array('8072AA14','4064AZ01','6119AB14','6183AP05','3362AZ01','6636AC22','6630AC22','4065AZ01','2619AR05','2749AB14','2752AB14');
        elseif($client == 'CongoEquipement') $plaquess = array('6294AB14','2746AB14','2753AB14','6283AB14','8254AS05','7375AA14','8255AS05','8257AS05');

        $query = self::Afficher("SELECT * FROM `planing` WHERE status=3");
        if ($query && $plaquess)
        {
            foreach ($query as $i)
            {
                if(strlen($i->getDateDebut()) > 5 ){
                    $d = new DateTime(date($i->getDateDebut()));
                    if((intval($date) == intval($d->format('m'))) && in_array($i->getPlaque(), $plaquess)    && (intval($aa) == intval($d->format('Y'))) ){
                        $som++;
                    }
                }
            }

        }
        return $som;

    }

    public static function AfficherNbrePanneEnCours($date, $tache, $client,$aa){
        $p = self::keys()->encrypt("Entretien");
        $som = 0;
        $plaquess = null;
        if($client == 'MUMI') $plaquess = array('6282AB14','6284AB14','6285AB14','6286AB14','6288AB14','6289AB14','6290AB14','6291AB14','6292AB14','6295AB14','6296AB14','1588AB14','6120AB14','5110AB14','3682AR05','2747AB14','3510AT05','6120AB14','2755AB14','0496AS05','8071AA14','3924AR05','5110AB14','0492AS05','6287AB14','9093AA04');
        elseif($client == 'TFM') $plaquess = array('8710AA14','4090AQ05','6264AB14','8254AS05','8256AS05','2621AR05','8036AA14','8705AA14','2748AB14','5991AT05','3684AR05','8978AA14','8977AA14','3362AZ01','8255AS05','2746AB14','4094AQ05');
        elseif($client == 'KAMOA') $plaquess = array('8072AA14','4064AZ01','6119AB14','6183AP05','3362AZ01','6636AC22','6630AC22','4065AZ01','2619AR05','2749AB14','2752AB14');
        elseif($client == 'CongoEquipement') $plaquess = array('6294AB14','2746AB14','2753AB14','6283AB14','8254AS05','7375AA14','8255AS05','8257AS05');

        $query = self::Afficher("SELECT * FROM `planing` WHERE status != 0 AND status != 1 AND status != 3 ");
        if ($query && $plaquess)
        {
            foreach ($query as $i)
            {
                if(strlen($i->getDateDebut()) > 5 ){
                    $d = new DateTime(date($i->getDateDebut()));
                    if((intval($date) == intval($d->format('m'))) && in_array($i->getPlaque(), $plaquess)    && (intval($aa) == intval($d->format('Y'))) ){
                        $som++;
                    }
                }
            }

        }
        return $som;

    }

    public static function AfficherNbrePanneNonAffecter($date, $tache, $client,$aa){
        $p = self::keys()->encrypt("Entretien");
        $som = 0;
        $plaquess = null;
        if($client == 'MUMI') $plaquess = array('6282AB14','6284AB14','6285AB14','6286AB14','6288AB14','6289AB14','6290AB14','6291AB14','6292AB14','6295AB14','6296AB14','1588AB14','6120AB14','5110AB14','3682AR05','2747AB14','3510AT05','6120AB14','2755AB14','0496AS05','8071AA14','3924AR05','5110AB14','0492AS05','6287AB14','9093AA04');
        elseif($client == 'TFM') $plaquess = array('8710AA14','4090AQ05','6264AB14','8254AS05','8256AS05','2621AR05','8036AA14','8705AA14','2748AB14','5991AT05','3684AR05','8978AA14','8977AA14','3362AZ01','8255AS05','2746AB14','4094AQ05');
        elseif($client == 'KAMOA') $plaquess = array('8072AA14','4064AZ01','6119AB14','6183AP05','3362AZ01','6636AC22','6630AC22','4065AZ01','2619AR05','2749AB14','2752AB14');
        elseif($client == 'CongoEquipement') $plaquess = array('6294AB14','2746AB14','2753AB14','6283AB14','8254AS05','7375AA14','8255AS05','8257AS05');

        $query = self::Afficher("SELECT * FROM `planing` WHERE date_fin != 0  ");
        if ($query && $plaquess)
        {
            foreach ($query as $i)
            {
                if(strlen($i->getDateDebut()) > 5 ){
                    $d = new DateTime(date($i->getDateDebut()));
                    if((intval($date) == intval($d->format('m'))) && in_array($i->getPlaque(), $plaquess)    && (intval($aa) == intval($d->format('Y'))) ){
                        $som++;
                    }
                }
            }

        }
        return $som;

    }

    public static function AfficherNbreParCouleur($date,$status,$aa){
        $som = 0;

        $query = self::Afficher("SELECT * FROM `planing` WHERE status='$status'");
        if ($query)
        {
            foreach ($query as $i)
            {
                if(strlen($i->getDateDebut()) > 5 ){
                    $d = new DateTime(date($i->getDateDebut()));
                    if((intval($date) == intval($d->format('m'))) && (intval($aa) == intval($d->format('Y'))) ){
                        $som++;
                    }
                }
            }

        }
        return $som;

    }
    public static function AfficherNbreParCouleur2($date,$status,$aa){
        $som = 0;

        $query = self::Afficher("SELECT * FROM `planing` WHERE idagent='$status'");
        if ($query)
        {
            foreach ($query as $i)
            {
                if(strlen($i->getDateDebut()) > 5 ){
                    $d = new DateTime(date($i->getDateDebut()));
                    if((intval($date) == intval($d->format('m'))) && (intval($aa) == intval($d->format('Y'))) ){
                        $som++;
                    }
                }
            }

        }
        return $som;

    }

    public static function AfficherNbreParCouleur3($date,$status,$aa){
        $som = 0;

        $query = self::Afficher("SELECT STR_TO_DATE(`date_debut`, '%d-%m-%Y') as date_debut FROM `planing` WHERE idagent NOT IN(3,1,2) AND status NOT IN(3,2,1)");
        if ($query)
        {
            foreach ($query as $i)
            {
                if(strlen($i->getDateDebut()) > 5 ){

                    $d = new DateTime(date($i->getDateDebut()));


                    if((intval($date) == intval($d->format('m'))) && (intval($aa) == intval($d->format('Y'))) ){
                        $som++;
                    }
                }
            }

        }


        return $som;

    }



}