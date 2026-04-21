<?php
require_once ("../header.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['btn_connexion'])){
        $matricule = Users::key()->encrypt(Query::securisation($_POST['login']));
        $password = md5(Query::securisation($_POST['password']));
        if(isset($_SESSION['csrf_tokenss']) && !empty($_SESSION['csrf_tokenss']) && isset($_POST['csrf_token']) && ($_POST['csrf_token'] == $_SESSION['csrf_tokenss'])) {
            $users = Users::afficher("SELECT * FROM users WHERE matricule='$matricule' AND password='$password'");
            if ($users && $users->getId()) {
                $_SESSION['idd'] = $users->getId();
                $_SESSION['username'] = $users->getUsername();
                $_SESSION['roleSys'] = $users->getRole();
                if(Query::securisation($_POST['login']) == Query::securisation($_POST['password']))
                    echo 'mot';
                else echo 'success';
            }else echo 'Echec';
        }else echo 'Echec';
    }

    if ($_SESSION['csrf_tokenss'] && $_SESSION['roleSys']) {

        if (isset($_POST['btn_connexion_modifier'])){
            $password = md5(Query::securisation($_POST['password']));
            $id = $_SESSION['idd'];
            Query::CRUD("UPDATE `users` SET `password`='$password' WHERE `id`='$id'");
            echo 'success';
        }

    if (isset($_POST['btn_send_users'])) {
            $key = Users::key();
            $username = $key->encrypt(Query::securisation($_POST['name']));
            $matricule = $key->encrypt(Query::securisation($_POST['matricule']));
            $password = md5(Query::securisation($_POST['matricule']));
            $role = $key->encrypt(Query::securisation($_POST['role']));

            if ((new Users(null, $matricule, $username, $password, $role, 1, null))->ajouter()) echo "Utilisateur ajouté avec succès!";
            else echo "Erreur lors de l'ajout de l'utilisateur.";

        }
    elseif (isset($_POST['btn_send_users_update'])) {
            $key = Users::key();
            $username = $key->encrypt(Query::securisation($_POST['name']));
            $id = intval(Query::securisation($_POST['btn_send_users_update']));
            $matricule = $key->encrypt(Query::securisation($_POST['matricule']));
            $password = md5(Query::securisation($_POST['matricule']));
            $role = $key->encrypt(Query::securisation($_POST['role']));

            if (Query::CRUD("UPDATE `users` SET `matricule`='$matricule',`username`='$username',`role`='$role' WHERE `id`='$id'")) echo "Utilisateur modifié avec succès!";
            else echo "Erreur lors de l'ajout de l'utilisateur.";

        }
    elseif (isset($_POST['btn_send_users_delete'])) {

            $id = intval(Query::securisation($_POST['btn_send_users_delete']));


            if (Query::CRUD("DELETE FROM users WHERE `id`='$id'")) echo "Utilisateur modifié avec succès!";
            else echo "Erreur lors de l'ajout de l'utilisateur.";

        }
    elseif (isset($_POST['btn_send_vehicule'])) {

            $key = Vehicule::key();
            $type = $key->encrypt(Query::securisation($_POST['type']));
            $chassis = $key->encrypt(Query::securisation($_POST['chassis']));
            $marque = $key->encrypt(Query::securisation($_POST['marque']));
            $plaque = $key->encrypt(Query::securisation($_POST['plaque']));
            $chevaux = $key->encrypt(Query::securisation($_POST['chevaux']));
            $couleur = $key->encrypt(Query::securisation($_POST['couleur']));
            $proprietaire = $key->encrypt(Query::securisation($_POST['proprietaire']));
            $fabrication = $key->encrypt(Query::securisation($_POST['fabrication']));
            $miseEnService = $key->encrypt(Query::securisation($_POST['miseEnService']));
            $place = intval(Query::securisation($_POST['place']));
            $kilometrage = intval(Query::securisation($_POST['kilometrage']));
            $prochaineInspection = intval(Query::securisation($_POST['prochaineInspection']));
            $prochainEntretien = intval(Query::securisation($_POST['prochainEntretien']));


            if ((new Vehicule(null, $marque, $type, $chassis, $chevaux, $couleur, $plaque, $miseEnService, $fabrication, $place, $proprietaire, $kilometrage, $prochaineInspection, $prochainEntretien, null, 1))->ajouter()) echo "Le véhicule ajouté avec succès!";
            else echo "Erreur lors de l'ajout de ce véhicule.";

        }
    elseif (isset($_POST['btn_send_vehicule_update'])) {

            $key = Vehicule::key();
            $type = $key->encrypt(Query::securisation($_POST['type']));
            $chassis = $key->encrypt(Query::securisation($_POST['chassis']));
            $marque = $key->encrypt(Query::securisation($_POST['marque']));
            $plaque = $key->encrypt(Query::securisation($_POST['plaque']));
            $chevaux = $key->encrypt(Query::securisation($_POST['chevaux']));
            $couleur = $key->encrypt(Query::securisation($_POST['couleur']));
            $proprietaire = $key->encrypt(Query::securisation($_POST['proprietaire']));
            $fabrication = $key->encrypt(Query::securisation($_POST['fabrication']));
            $miseEnService = $key->encrypt(Query::securisation($_POST['miseEnService']));
            $place = intval(Query::securisation($_POST['place']));
            $kilometrage = intval(Query::securisation($_POST['kilometrage']));
            $prochaineInspection = intval(Query::securisation($_POST['prochaineInspection']));
            $prochainEntretien = intval(Query::securisation($_POST['prochainEntretien']));
            $id = intval(Query::securisation($_POST['btn_send_vehicule_update']));
            if (Query::CRUD("UPDATE `vehicule` SET `marque`='$marque',`type_vehicule`='$type',`numero_chassier`='$chassis',`chevot_vapeur`='$chevaux',`couleur`='$couleur',`numero_plaque`='$plaque',`date_en_service`='$miseEnService',`date_fabrication`='$fabrication',`nbre_place`='$place',`nom_proprietaire`='$proprietaire',`kilometrage`='$kilometrage',`prochaine_inspection`='$prochaineInspection',`prochaine_entretiens`='$prochainEntretien' WHERE `id`='$id'")) echo "Le véhicule modifié avec succès!";
            else echo "Erreur lors de la modification de ce véhicule.";

        }
        elseif (isset($_POST['btn_send_vehicule_delete'])) {
            $id = intval(Query::securisation($_POST["btn_send_vehicule_delete"]));
            Query::CRUD("UPDATE vehicule SET status=0 WHERE id='$id'");
            echo "succesfull";
        }
        elseif (isset($_POST['btn_send_anomalie'])) {
           /* ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL); */
            $vehicule = intval(Query::securisation($_POST["vehicule"]));
            $kilometrage = intval(Query::securisation($_POST["kilometrage"]));
            $description = Panne::key()->encrypt(Query::securisation($_POST["description"]));
            $niveau = Panne::key()->encrypt(Query::securisation($_POST["niveau"]));

            $vehicules = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$vehicule'");
            if ($vehicules->getKilometrage() <= $kilometrage) {
                Query::CRUD("UPDATE vehicule SET kilometrage='$kilometrage' WHERE id='$vehicule'");
                $keys = Planing::keys();
                $date_debuts = (intval(date('d')))."-".intval(date('m'))."-".intval(date('Y'));

                $pl = $keys->encrypt($vehicules->getNumeroPlaque());
                $tache = $keys->encrypt(Query::securisation($_POST['description']));
                (new Planing(null,1, $pl, $date_debuts, '',$tache, $kilometrage,0))->Ajouter();
                if ((new Panne(null, $_SESSION['idd'], null, $vehicule, $description, $niveau, $kilometrage, 1))->ajouter()) echo "L'anomalie a été créer avec succès";
                else echo "Erreur lors de la création de l'anomalie.";
            }else echo "Erreur: Index saisi est inférieur à celui du système (Index saisi : $kilometrage, Index système : $vehicules->getKilometrage()).";
        }
        elseif (isset($_POST['instructions'])) {
            $instructions = $_POST['instructions']; // Exemple : "instruction1|instruction2|instruction3"
            $instructions = explode('|', $_POST['instructions']);
            $instructions = array_map('trim', $instructions);
            $id_anomalie = $_SESSION['id_anomalie'];
            foreach ($instructions as $instruction) {
                // Sécurité
                $instruction = htmlspecialchars($instruction);
                (new Instructions(null, $id_anomalie, Instructions::keys()->encrypt($instruction), null, 1))->ajouter();
                //echo "Instruction enregistrée : " . $instruction . "<br>";
            }
            Query::CRUD("UPDATE panne SET status=2 WHERE id='$id_anomalie'");
            header("Location:page-panne");
        }

        elseif (isset($_POST['btn_affecter_carte_panne'])){

            $key = Garage::keys();
            $idAgent = intval(Query::securisation($_POST['agent']));
            $idPanne = intval(Query::securisation($_POST['idPanne']));
            $date_debut = $key->encrypt(Query::securisation($_POST['date_debut']));
            $debut = $key->encrypt(Query::securisation($_POST['h_debut']));
            $date_fin = $key->encrypt(Query::securisation($_POST['date_fin']));
            $fin = $key->encrypt(Query::securisation($_POST['h_fin']));
            $niveau = $key->encrypt(Query::securisation($_POST['niveau']));

            (new Garage(null, $date_debut, $date_fin, $idAgent, $debut, $fin, $niveau, '', $idPanne, 1))->ajouter();
            $idGarage = Garage::afficher("SELECT * FROM garage ORDER BY id DESC LIMIT 1")->getId();
            Query::CRUD("UPDATE panne SET status=3 WHERE id='$idPanne'");
            header("Location:print-job-carte-$idGarage");
             /* $panneC = Panne::afficher("SELECT * FROM panne WHERE id='$idPanne'");
                 $d = new DateTime($panneC->getDate());
                $date_debuts = intval($d->format('d'))."-".intval($d->format('m'))."-".intval($d->format('Y'));
                $idVehicule = $panneC->getIdvehicule();
                $plaque = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$idVehicule'");
                $pl = $keys->encrypt($plaque);
                 $tache = $keys->encrypt($panneC->getBody());
         
                  
          if(Planing::AfficherContenuePlaqueEPanne($pl, $tache)) Query::CRUD("UPDATE `planing` SET `status`='2', idagent=0 WHERE `plaque`='$pl' AND `contenue`='$tache'");
            
            */

        }
        elseif (isset($_POST['btn_cloture_tache'])){
            $extensionsPhoto = array('.PDF', '.pdf');
            $id = intval(Query::securisation($_POST['id']));
            if (isset($_FILES)) {
                $fichierPhoto = $_FILES['photo']['name'];
                $fichierPhoto = strtr($fichierPhoto,
                    'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                    'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichierPhoto = preg_replace('/([^.a-z0-9]+)/i', '-', $fichierPhoto);
                $extensionP = strrchr($_FILES['photo']['name'], '.');
                $rename = time().$extensionP;
                $fichier_tmp1 = $_FILES['photo']['tmp_name'];
                $destination1 = '../assets/doc/'.$rename;

                if (in_array($extensionP, $extensionsPhoto)) {

                    $copy1 = move_uploaded_file($fichier_tmp1, $destination1);

                    if ($copy1) {
                        $fich = Garage::keys()->encrypt($rename);
                        Query::CRUD("UPDATE `garage` SET `status`='2',ctrl_q='$fich' WHERE `id`='$id'");
                        header("Location:page-carteTravail");
                    }
                    else{
                        header("Location:page-carteTravail");
                    }
                }
                else{
                    header("Location:page-carteTravail");
                }
            }
        }
        elseif (isset($_POST['btn_save_tache_planing']))
        {
            $keys = Planing::keys();

                $plaque = $keys->encrypt(substr(Query::securisation($_POST['plaque']), 0,8));
                $date_debut = Query::securisation(substr(Query::securisation($_POST['plaque']),8).'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);

                $date_test = Query::securisation(substr(Query::securisation($_POST['plaque']),8).'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
                $tache = $keys->encrypt(Query::textArea($_POST['tacheInput']));
                // $idagent = intval(Query::securisation($_POST['agent']));

                $day = intval(date('d')).'-'.intval(date('m')).'-'.(date('Y'));


                (new Planing(null,0, $plaque, $date_debut, '',$tache, 0,1))->Ajouter();

                echo 'succesfull';

            //header("Location:../index-planing-jdueiiijjdnc");
        }
    elseif (isset($_POST['tacheInput_update']))
    {
        $keys = Planing::keys();
        if(substr(Query::securisation($_POST['plaque']), 0,5) == 'Autre'){
            $plaque = $keys->encrypt(substr(Query::securisation($_POST['plaque']), 0,5));
            $date_debut = Query::securisation(substr(Query::securisation($_POST['plaque']),5).'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
            //$date_fin = Query::securisation($_POST['date_fin']);
            $tache = $keys->encrypt(Query::textArea($_POST['tacheInput_update']));
            // $idagent = intval(Query::securisation($_POST['agent']));

            Query::CRUD("UPDATE `planing` SET `contenue`='$tache' WHERE plaque='$plaque' AND date_debut='$date_debut' ");

            echo Query::textArea($_POST['tacheInput_update']);

        }elseif(substr(Query::securisation($_POST['plaque']), 0,6) == 'Groupe'){
            $plaque = $keys->encrypt(substr(Query::securisation($_POST['plaque']), 0,28));
            $date_debut = Query::securisation(substr(Query::securisation($_POST['plaque']),28).'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
            //$date_fin = Query::securisation($_POST['date_fin']);
            $tache = $keys->encrypt(Query::textArea($_POST['tacheInput_update']));
            // $idagent = intval(Query::securisation($_POST['agent']));

            Query::CRUD("UPDATE `planing` SET `contenue`='$tache' WHERE plaque='$plaque' AND date_debut='$date_debut' ");


            echo Query::textArea($_POST['tacheInput_update']);

        }else{
            $plaque = $keys->encrypt(substr(Query::securisation($_POST['plaque']), 0,8));
            $date_debut = Query::securisation(substr(Query::securisation($_POST['plaque']),8).'-'.intval($_SESSION['M']).'-'.$_SESSION['Y']);
            //$date_fin = Query::securisation($_POST['date_fin']);
            $tache = $keys->encrypt(Query::textArea($_POST['tacheInput_update']));
            // $idagent = intval(Query::securisation($_POST['agent']));

            Query::CRUD("UPDATE `planing` SET `contenue`='$tache' WHERE plaque='$plaque' AND date_debut='$date_debut' ");

            echo Query::textArea($_POST['tacheInput_update']);

        }
    }
    elseif(isset($_POST['id_panne_delete_planing'])){
        $id = intval(Query::securisation($_POST['id_panne_delete_planing']));
        Query::CRUD("DELETE FROM `planing` WHERE id='$id' AND idagent=1");
        echo 'succesfull';
    }
    elseif (isset($_POST['btn_send_course_prevision'])){
        $vehicule = intval(Query::securisation($_POST['vehicule']));
        $chauffeur = intval(Query::securisation($_POST['chauffeur']));
        $courses = intval(Query::securisation($_POST['courses']));
        $destination = Panne::key()->encrypt(Query::securisation($_POST['destination']));
        $date = (Query::securisation($_POST['date']));
     (new Course(null, $vehicule, $chauffeur, $date, $destination, 1, null, 0, 0, 0, $courses))->ajouter();
    echo "La course a été créer avec succès";

    }
    elseif (isset($_POST['btn_send_course_prevision_update'])){
        $vehicule = intval(Query::securisation($_POST['vehicule']));
        $id = intval(Query::securisation($_POST['id']));
        $chauffeur = intval(Query::securisation($_POST['chauffeur']));
        $courses = intval(Query::securisation($_POST['courses']));
        $destination = Panne::key()->encrypt(Query::securisation($_POST['destination']));
        $date = (Query::securisation($_POST['date']));
        Query::CRUD("UPDATE `course` SET `vehicule`='$vehicule',`chauffeur`='$chauffeur',`date_course`='$date',`destination`='$destination',`course_prevue`='$courses' WHERE `id`='$id'");
        echo "La course a été modifier avec succès";

    }
    elseif (isset($_POST['btn_send_course_prevision_confirmer'])){
        $vehicules = intval(Query::securisation($_POST['vehicule']));
        $id = intval(Query::securisation($_POST['id']));
        $chauffeur = intval(Query::securisation($_POST['chauffeur']));
        $courses = intval(Query::securisation($_POST['courses']));
        $coursesRealiser = intval(Query::securisation($_POST['coursesRealiser']));
        $indexKm = intval(Query::securisation($_POST['indexKm']));
        $carburant = intval(Query::securisation($_POST['carburant']));
        $destination = Panne::key()->encrypt(Query::securisation($_POST['destination']));
        $date = (Query::securisation($_POST['date']));
        $vehicule = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$vehicules'");
        if ($vehicule->getKilometrage() <= $indexKm) {
            Query::CRUD("UPDATE `course` SET `vehicule`='$vehicules',`chauffeur`='$chauffeur',`date_course`='$date',`destination`='$destination',`course_prevue`='$courses',`course_realise`='$coursesRealiser',`index_km`='$indexKm',`carburant`='$carburant',status=2 WHERE `id`='$id'");
        echo "La course a été confirmer avec succès";
    }else echo "Erreur: Index saisi est inférieur à celui du système (Index saisi : $indexKm, Index système : $vehicule->getKilometrage()).";


    }
    elseif(isset($_POST['btn_check_anomalie'])){
        $id = intval(Query::securisation($_POST['id']));
        $effectue = intval(Query::securisation($_POST['effectue']));
        $inspection = Inspections::afficher("SELECT * FROM inspections WHERE id='$id'")->getStatus();
        if ($inspection == 1)
            Query::CRUD("UPDATE inspections SET status=2 WHERE id='$id'");
        else Query::CRUD("UPDATE inspections SET status=1 WHERE id='$id'");
    }
    elseif(isset($_POST['btn_send_inspection'])){
        $inspection = Inspections::keys()->encrypt(Query::securisation($_POST['inspection']));
        $frequence = Inspections::keys()->encrypt(Query::securisation($_POST['frequence']));
        (new Inspections(null, $inspection, $frequence, null, 1 ))->ajouter();
        echo "L'inspection a été créer avec succès";
    }

    }else  header("Location:page-connexion");
}
elseif ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if ($_SESSION['csrf_tokenss'] && $_SESSION['roleSys']) {
        if (isset($_GET['pdfOrder'])) {
            $id = intval(Query::securisation($_GET['pdfOrder']));


            $q = Garage::afficher("SELECT * FROM garage WHERE id='$id'");
            if ($q && $q->getCtrlQ()) {
                $file = '../assets/doc/' . $q->getCtrlQ();


                //Type de contenu d'en-tête
                header("Content-type: application/pdf");

                header("Content-Length: " . filesize($file));

                // Envoyez le fichier au navigateur.
                readfile($file);
            }


        }
        if(isset($_GET['logout'])){
            session_destroy();
            header("Location:page-connexion");
        }
    }else  header("Location:page-connexion");
}else header("Location:page-connexion");