<?php

require_once ('header.php');
require('fpdf.php');
if (isset($_POST['rapportPDF'])) {

    class PDF extends FPDF
    {
        function Header()
        {
            $this->Image('assets/img/logo.png', 10, 10, 40);
            $this->Ln(30);

            $this->SetFont('Arial', 'B', 16);
            $status = intval(Query::securisation($_POST['etat']));
            if ($status == 1)
                $this->Cell(0, 10, utf8_decode('Rapport de prévision des courses'), 0, 1, 'C');
            else
                $this->Cell(0, 10, utf8_decode('Rapport de réalisation des courses'), 0, 1, 'C');
            $this->Ln(5);
        }

        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 5, utf8_decode('Produit par IHS-RDC | Généré le : ') . date('d/m/Y H:i'), 0, 1, 'C');
            $this->Cell(0, 5, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        }
    }

    ob_clean(); // <-- Important pour éviter l'erreur "Some data has already been output"

    // Sécuriser et récupérer les données
    $dateDebut = Query::securisation($_POST['dateDebut']);
    $dateFin = Query::securisation($_POST['dateFin']);
    $vehicule = intval(Query::securisation($_POST['vehicule']));
    $status = intval(Query::securisation($_POST['etat']));

    // Requête des courses
    if ($status) {
        if ($vehicule)
            $course = Course::affichers("SELECT * FROM course WHERE (date_course >= '$dateDebut' AND date_course <= '$dateFin') AND status = '$status' AND vehicule = '$vehicule' ORDER BY id DESC");
        else
            $course = Course::affichers("SELECT * FROM course WHERE (date_course >= '$dateDebut' AND date_course <= '$dateFin') AND status = '$status' ORDER BY id DESC");
    } else {
        if ($vehicule)
            $course = Course::affichers("SELECT * FROM course WHERE (date_course >= '$dateDebut' AND date_course <= '$dateFin') AND vehicule = '$vehicule' ORDER BY id DESC");
        else
            $course = Course::affichers("SELECT * FROM course WHERE (date_course >= '$dateDebut' AND date_course <= '$dateFin') ORDER BY id DESC");
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
    $pdf->SetTextColor(255);

    $header = ($status == 1) ?
        ['#', 'Immatriculation', 'Date prévue', 'Destination', 'Courses prévues', 'Chauffeur'] :
        ['#', 'Immatriculation', 'Date prévue', 'Destination', 'Courses prévues', 'Chauffeur', 'Courses réalisées', 'KM parcouru', 'Carburant'];

    $colWidth = 277 / count($header); // 277mm = largeur A4 en paysage moins marges

    foreach ($header as $col) {
        $pdf->Cell($colWidth, 10, utf8_decode($col), 1, 0, 'C', true);
    }
    $pdf->Ln();

    // Corps du tableau
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetTextColor(0);
    $fill = false;
    $j = 1;

    if ($course) {
        foreach ($course as $i) {
            $idVehicule = $i->getVehicule();
            $idChauffeur = $i->getChauffeur();
            $vehiculeObj = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$idVehicule'");
            $chauffeur = Users::afficher("SELECT * FROM users WHERE id='$idChauffeur'");

            $pdf->SetFillColor($fill ? 230 : 245, 245, 245);

            $row = [
                $j++,
                utf8_decode($vehiculeObj->getNumeroPlaque()),
                utf8_decode($i->getDateCourse()),
                utf8_decode($i->getDestination()),
                $i->getCoursePrevue(),
                ucfirst($chauffeur->getUsername())
            ];

            if ($status != 1) {
                $row[] = $i->getCourseRealise();
                $row[] = $i->getIndexKm();
                $row[] = $i->getCarburant();
            }

            // Calcul de la hauteur max
            $maxHeight = 10;
            foreach ($row as $cell) {
                $nbLines = ceil($pdf->GetStringWidth($cell) / ($colWidth - 2));
                $cellHeight = max(10, $nbLines * 5);
                if ($cellHeight > $maxHeight) {
                    $maxHeight = $cellHeight;
                }
            }

            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();

            foreach ($row as $cell) {
                $pdf->MultiCell($colWidth, 5, $cell, 1, 'C', $fill);
                $xPos += $colWidth;
                $pdf->SetXY($xPos, $yPos);
            }

            $pdf->Ln($maxHeight);
            $fill = !$fill;
        }
    } else {
        $pdf->Cell(0, 10, 'Aucune course trouvée.', 1, 1, 'C');
    }

    // Sortie PDF
    $pdf->Output('I', 'rapport_course.pdf');
}
?>




