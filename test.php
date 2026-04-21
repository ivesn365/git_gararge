<?php
ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
require_once ("header.php");

 $key = Users::key();
 $username = $key->encrypt("ADMIN");
            $matricule = $key->encrypt("admin");
            $password = md5("admin");
            echo $password;
            $role = $key->encrypt("admin");
//(new Users(null, $matricule, $username, $password, $role, 1, null))->ajouter();

/*
// Tableau des inspections
$inspections = [
    ["inspection" => "Niveau d'huile moteur", "frequence" => "Quotidien"],
    ["inspection" => "Liquide de refroidissement", "frequence" => "Quotidien"],
    ["inspection" => "Liquide de frein", "frequence" => "Quotidien"],
    ["inspection" => "Pression et état des pneus", "frequence" => "Quotidien"],
    ["inspection" => "Éclairage (phares, clignotants, feux stop)", "frequence" => "Quotidien"],
    ["inspection" => "Équipements de sécurité (extincteur, triangle, trousse de secours)", "frequence" => "Quotidien"],
    ["inspection" => "Essuie-glaces et liquide lave-glace", "frequence" => "Hebdomadaire"],
    ["inspection" => "État de la batterie", "frequence" => "Hebdomadaire"],
    ["inspection" => "Courroies visibles", "frequence" => "Hebdomadaire"],
    ["inspection" => "Système de freinage (plaquettes, disques)", "frequence" => "Mensuel"],
    ["inspection" => "Direction et suspension", "frequence" => "Mensuel"],
    ["inspection" => "Fuites sous le véhicule", "frequence" => "Mensuel"],
    ["inspection" => "État intérieur (ceintures, alarmes)", "frequence" => "Mensuel"],
    ["inspection" => "Vidange d'huile moteur", "frequence" => "Trimestriel ou 5 000 km"],
    ["inspection" => "Filtre à air moteur", "frequence" => "Trimestriel"],
    ["inspection" => "Filtre habitacle", "frequence" => "Trimestriel"],
    ["inspection" => "Alignement et équilibrage des roues", "frequence" => "Trimestriel"],
    ["inspection" => "Système d'échappement", "frequence" => "Trimestriel"],
    ["inspection" => "État de la climatisation", "frequence" => "Semestriel"],
    ["inspection" => "Train roulant complet", "frequence" => "Semestriel"],
    ["inspection" => "Changement filtre à huile", "frequence" => "Semestriel"],
    ["inspection" => "Contrôle du système de refroidissement", "frequence" => "Semestriel"],
    ["inspection" => "Inspection générale professionnelle", "frequence" => "Annuel"],
    ["inspection" => "Vidange complète de tous les fluides", "frequence" => "Annuel"],
    ["inspection" => "Contrôle technique obligatoire", "frequence" => "Annuel (ou selon législation)"],
    ["inspection" => "Nettoyage en profondeur", "frequence" => "Annuel"],
    ["inspection" => "Changement de batterie", "frequence" => "Chaque 4-5 ans"],
    ["inspection" => "Remplacement des courroies de distribution", "frequence" => "60 000 - 160 000 km"],
    ["inspection" => "Changement des pneus", "frequence" => "Chaque 5 ans ou selon usure"],
    ["inspection" => "Vidange de la boîte de vitesses", "frequence" => "Selon constructeur (60 000 - 100 000 km)"],
    ["inspection" => "Révision complète du système de freinage", "frequence" => "Chaque 2 ans minimum"],
];

// Exemple d'insertion SQL (avec PDO)
try {




    foreach ($inspections as $inspection) {
       // (new Inspections(null, Inspections::keys()->encrypt($inspection['inspection']), Inspections::keys()->encrypt($inspection['frequence']), null, 1 ))->ajouter();
    }


} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
*/
