<?php
require_once ('header.php');
if (isset($_POST['rapport'])){
    $dateDebut = Query::securisation($_POST['dateDebut']);
    $dateFin = Query::securisation($_POST['dateFin']);
    $vehicule = Query::securisation($_POST['vehicule']);
    $status = 0;
    $status2 = 0;
    $etat = Query::securisation($_POST['etat']);
    if($etat == 'Tous') $status = 0;
    elseif($etat == 'Résolu'){
        $status = 2;
        $status2 = 2;
    }
    elseif($etat == 'En cours'){
        $status2 = 1;
        $status = 2;
    }
    else $status = 1;

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport | IHS-GARAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body >

<div class="container bg-white">
    <div class="row">
    <div class="col-lg-12">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📋 Rapport des Anomalies</h2>
        <button class="btn btn-primary no-print" onclick="window.print()">🖨️ Imprimer</button>
    </div>

    <!-- Barre de recherche -->
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control no-print" placeholder="Rechercher...">
    </div>

    <!-- Tableau rapport -->
    <div class="table-responsive">
        <table id="rapportTable" class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Véhicule</th>
                <th>Immatriculation</th>
                <th>Description de l’anomalie</th>
                <th>Date Anomalie</th>
                <th>Index</th>
                <th>Niveau de gravité</th>
                <th class="text text-center">Etat</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $j = 1;
            if($status)
                $anomalie = Panne::affichers("SELECT * FROM panne WHERE (DATE_FORMAT(date,'%Y-%m-%d')>='$dateDebut' AND DATE_FORMAT(date,'%Y-%m-%d')<='$dateFin') AND status='$status' ORDER BY id DESC");
            else $anomalie = Panne::affichers("SELECT * FROM panne WHERE (DATE_FORMAT(date,'%Y-%m-%d')>='$dateDebut' AND DATE_FORMAT(date,'%Y-%m-%d')<='$dateFin')  ORDER BY id DESC");
            if ($anomalie){
                foreach ($anomalie as $i){
                    $idPanne = $i->getId();
                    $garage = Garage::affichers("SELECT * FROM garage WHERE idpanne='$idPanne'");
                    $idVehicule = $i->getIdvehicule();
                    $vehicule = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$idVehicule'");
                    ?>


                    <tr>
                        <td><?=$j++?></td>
                        <td><?=$vehicule->getMarque().' '.$vehicule->getType()?></td>
                        <td><?=$vehicule->getNumeroPlaque()?></td>
                        <td><?=$i->getBody()?></td>
                        <td><?=$i->getDate()?></td>
                        <td><?=$i->getKilometrage()?></td>
                        <td><?=ucfirst($i->getNiveau())?></td>
                        <td>
                            <ul>
                                <?php
                                if ($garage){
                                    foreach ($garage as $item){
                                        if($status2){
                                            if ($item->getStatus() == $status2){
                                                echo '<li>'.$etat.'</li>';
                                            }
                                        }else{
                                            if ($item->getStatus() == 2){
                                                echo '<li>Résolu</li>';
                                            }else echo '<li>En cours</li>';
                                        }

                                    }
                                }else{
                                    echo '<li class="badge badge-info">En attente</li>';
                                }
                                ?>
                            </ul>

                        </td>
                    </tr>
                <?php   }
            }
            ?>
            <!-- d'autres lignes... -->
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
<!-- Bootstrap + Recherche rapide -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const searchInput = document.getElementById('searchInput');
    searchInput.addEventListener('keyup', function() {
        const filter = searchInput.value.toLowerCase();
        const rows = document.querySelectorAll('#rapportTable tbody tr');
        rows.forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(filter) ? '' : 'none';
        });
    });
</script>

</body>
</html>
<?php
}
elseif(isset($_POST['rapportPDF'])) {
    require('fpdf.php');

// Créer une classe pour header/footer personnalisés
    class PDF extends FPDF
    {
        function Header()
        {
            // Logo
            $this->Image('assets/img/logo.png', 10, 10, 40);
            $this->Ln(30); // Décalage après le logo
            // Titre
            $this->SetFont('Arial', 'B', 16);
            $this->Cell(0, 10, utf8_decode('Rapport des Anomalies'), 0, 1, 'C');
            $this->Ln(5);
           // $this->Watermark();
        }

        function Footer()
        {
            // Positionné à 15 mm du bas
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            // Date de génération
            $this->Cell(0, 5, utf8_decode('Produit par IHS-RDC | Généré le : ') . date('d/m/Y H:i'), 0, 1, 'C');
            // Numéro de page
            $this->Cell(0, 5, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }

        function Watermark()
        {
            // Couleur gris clair pour le filigrane
            $this->SetTextColor(220, 220, 220);
            $this->SetFont('Arial', 'B', 50);
            // Positionner au milieu de la page sans rotation
            $this->SetXY(30, 100);
            $this->Cell(0, 30, utf8_decode('CONFIDENTIEL'), 0, 0, 'C');
            // Remettre couleur texte normale après
            $this->SetTextColor(0, 0, 0);
        }


    }

// Sécuriser et récupérer les données
    $dateDebut = Query::securisation($_POST['dateDebut']);
    $dateFin = Query::securisation($_POST['dateFin']);
    $vehicule = intval(Query::securisation($_POST['vehicule']));
    $etat = Query::securisation($_POST['etat']);

    $status = 0;
    $status2 = 0;
    if ($etat == 'Tous') $status = 0;
    elseif ($etat == 'Résolu') {
        $status = 2;
        $status2 = 2;
    } elseif ($etat == 'En cours') {
        $status = 2;
        $status2 = 1;
    } else {
        $status = 1;
    }

// Récupération des anomalies
    $j = 1;
    if ($status) {
        if($vehicule)
            $anomalie = Panne::affichers("SELECT * FROM panne WHERE (DATE_FORMAT(date,'%Y-%m-%d')>='$dateDebut' AND DATE_FORMAT(date,'%Y-%m-%d')<='$dateFin') AND status='$status' AND idvehicule='$vehicule' ORDER BY id DESC");
        else $anomalie = Panne::affichers("SELECT * FROM panne WHERE (DATE_FORMAT(date,'%Y-%m-%d')>='$dateDebut' AND DATE_FORMAT(date,'%Y-%m-%d')<='$dateFin') AND status='$status' ORDER BY id DESC");

    } else {
        if ($vehicule)
            $anomalie = Panne::affichers("SELECT * FROM panne WHERE (DATE_FORMAT(date,'%Y-%m-%d')>='$dateDebut' AND DATE_FORMAT(date,'%Y-%m-%d')<='$dateFin') AND idvehicule='$vehicule' ORDER BY id DESC");
        else $anomalie = Panne::affichers("SELECT * FROM panne WHERE (DATE_FORMAT(date,'%Y-%m-%d')>='$dateDebut' AND DATE_FORMAT(date,'%Y-%m-%d')<='$dateFin')  ORDER BY id DESC");
    }

// Instancier le PDF
    $pdf = new PDF('L', 'mm', 'A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();

// Période
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Periode : ' . date('d/m/Y', strtotime($dateDebut)) . ' - ' . date('d/m/Y', strtotime($dateFin)), 0, 1, 'C');
    $pdf->Ln(5);

// En-tête du tableau
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetFillColor(50, 50, 50);
    $pdf->SetTextColor(255, 255, 255);

    $header = ['#', 'Véhicule', 'Immatriculation', 'Description', 'Date Anomalie', 'Index', 'Gravité', 'Etat'];
    foreach ($header as $col) {
        $pdf->Cell(35, 10, utf8_decode($col), 1, 0, 'C', true);
    }
    $pdf->Ln();

// Corps du tableau
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(0);
    $fill = false;

    if ($anomalie) {
        foreach ($anomalie as $i) {
            $idPanne = $i->getId();
            $garage = Garage::affichers("SELECT * FROM garage WHERE idpanne='$idPanne'");
            $idVehicule = $i->getIdvehicule();
            $vehiculeObj = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$idVehicule'");

            $etat = "En attente";
            if ($garage) {
                foreach ($garage as $item) {
                    if ($status2) {
                        if ($item->getStatus() == $status2) {
                            $etat = $item->getStatus() == 2 ? 'Résolu' : 'En cours';
                        }
                    } else {
                        $etat = $item->getStatus() == 2 ? 'Résolu' : 'En cours';
                    }
                }
            }

            // Lignes alternées
            $pdf->SetFillColor(245, 245, 245);

            $pdf->Cell(35, 10, $j++, 1, 0, 'C', $fill);
            $pdf->Cell(35, 10, utf8_decode($vehiculeObj->getMarque() . ' ' . $vehiculeObj->getType()), 1, 0, 'L', $fill);
            $pdf->Cell(35, 10, utf8_decode($vehiculeObj->getNumeroPlaque()), 1, 0, 'L', $fill);
            $pdf->Cell(35, 10, utf8_decode(substr($i->getBody(), 0, 20) . '...'), 1, 0, 'L', $fill);
            $pdf->Cell(35, 10, $i->getDate(), 1, 0, 'C', $fill);
            $pdf->Cell(35, 10, $i->getKilometrage(), 1, 0, 'C', $fill);
            $pdf->Cell(35, 10, ucfirst($i->getNiveau()), 1, 0, 'C', $fill);
            $pdf->Cell(35, 10, utf8_decode($etat), 1, 1, 'C', $fill);

            $fill = !$fill;
        }
    } else {
        $pdf->Cell(0, 10, 'Aucune anomalie trouvée.', 1, 1, 'C');
    }

// Afficher ou Télécharger
    $pdf->Output('I', 'rapport_anomalies.pdf');
}
?>


