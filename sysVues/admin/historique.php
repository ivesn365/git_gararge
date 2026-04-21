<?php
if (isset($_GET['id'])) {
    $id = intval(Query::securisation($_GET['id']));
    $i = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$id'");
    if ($i) { ?>
        <style>
            @media print {
                .no-print {
                    display: none;
                }
                .table th, .table td {
                    border: 1px solid #000 !important;
                    print-color-adjust: exact;
                }
                body {
                    -webkit-print-color-adjust: exact;
                }
            }

            .table thead {
                background-color: #f8f9fa;
            }

            .section-title {
                font-size: 24px;
                font-weight: bold;
                margin-top: 30px;
                border-bottom: 2px solid #dee2e6;
                padding-bottom: 10px;
            }

            .table td, .table th {
                vertical-align: middle;
            }

            .info-label {
                font-weight: bold;
                color: #6c757d;
            }

            .info-value {
                color: #000;
            }

            .btn-group .btn {
                margin-right: 10px;
            }
        </style>

        <div class="container mt-5 mb-5">
            <h2 class="text-center section-title">Historique du véhicule</h2>

            <div class="table-responsive mt-4">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th class="info-label">N° Plaque</th>
                        <td class="info-value"><?= $i->getNumeroPlaque() ?></td>
                        <th class="info-label">Marque & Modèle</th>
                        <td class="info-value"><?= $i->getMarque() ?></td>
                    </tr>
                    <tr>
                        <th class="info-label">N° Châssis</th>
                        <td class="info-value"><?= $i->getNumeroChassier() ?></td>
                        <th class="info-label">Kilométrage</th>
                        <td class="info-value"><?= $i->getKilometrage() ?> km</td>
                    </tr>
                    <tr>
                        <th class="info-label">Année de fabrication</th>
                        <td class="info-value"><?= $i->getDateFabrication() ?></td>
                        <th class="info-label">Mise en circulation</th>
                        <td class="info-value"><?= $i->getDateEnService() ?></td>
                    </tr>
                    <tr>
                        <th class="info-label">Nombre de places</th>
                        <td class="info-value"><?= $i->getNbrePlace() ?></td>
                        <th class="info-label"></th>
                        <td class="info-label"></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-4 no-print">
                <div class="btn-group" role="group">
                    <a class="btn btn-danger" data-bs-toggle="collapse" href="#collapsePannes" role="button" aria-expanded="false" aria-controls="collapsePannes">
                        Pannes
                    </a>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCourses" aria-expanded="false" aria-controls="collapseCourses">
                        Courses
                    </button>
                    <button class="btn btn-outline-dark" onclick="window.print()" hidden>Imprimer</button>
                </div>
            </div>

            <!-- Collapse content -->
            <div class="collapse mt-4" id="collapsePannes">
                <div class="card card-body">
                    <h5>Pannes enregistrées</h5>
                    <input type="text" id="searchVehicule" class="form-control mb-3" placeholder="🔍 Rechercher un véhicule...">

                    <div class="table-responsive">
                        <table id="vehiculeTable" class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Véhicule</th>
                                <th>Immatriculation</th>
                                <th>Description de l’anomalie</th>
                                <th>Date Anomalie</th>
                                <th>Index</th>
                                <th>Niveau de gravité</th>
                                <th class="text text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $j = 1;
                            $anomalie = Panne::affichers("SELECT * FROM panne ORDER BY id DESC");
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
                                                    if ($item->getStatus() == 2){
                                                       echo '<li><a  target="_blank" href="docJobCarte-'.$item->getId().'">Ordre travaille</a></li>';
                                                    }else echo '<li class="text text-danger">Non clôturée</li>';
                                                }
                                            }else{
                                                echo '<li class="badge badge-info">En cours</li>';
                                            }
                                            ?>
                                            </ul>

                                        </td>
                                    </tr>
                                <?php   }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>                </div>
            </div>

            <div class="collapse mt-3" id="collapseCourses">
                <div class="card card-body">
                    <h5>Courses effectuées</h5>
                    <div class="table-responsive mt-3">
                        <table id="courseTable" class="table table-bordered table-hover align-middle text-center" >
                            <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Véhicule</th>
                                <th>Date prévue</th>
                                <th>Destination</th>
                                <th>Courses prévues</th>
                                <th>Chauffeur</th>
                                <th>Courses prévues</th>
                                <th>Kilomètre parcouru</th>
                                <th>Carburant consommé</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $carburant = 0;
                            $course = Course::affichers("SELECT * FROM course ORDER BY id DESC");
                            if($course){
                                $j = 1;

                                foreach ($course as $i){
                                    $carburant += $i->getCarburant();
                                    $idVehicule = $i->getVehicule();
                                    $idChauffeur = $i->getChauffeur();
                                    $vehicule = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$idVehicule'");
                                    $chauffeur = Users::afficher("SELECT * FROM users WHERE id='$idChauffeur'"); ?>

                                    <tr>
                                        <td><?=$j++?></td>
                                        <td><?=$vehicule->getNumeroPlaque()?></td>
                                        <td><?=$i->getDateCourse()?></td>
                                        <td><?=$i->getDestination()?></td>
                                        <td><?=$i->getCoursePrevue()?></td>
                                        <td><?=$chauffeur->getUsername()?></td>
                                        <td><?=$i->getCourseRealise()?></td>
                                        <td><?=$i->getIndexKm()?></td>
                                        <td><?=$i->getCarburant()?></td>

                                    </tr>
                                <?php  }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}
?>
<script>
    $(document).ready(function () {
        var table = $('#vehiculeTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
            },
            pageLength: 5
        });

        // Lier le champ de recherche perso à DataTables
        $('#searchVehicule').on('keyup', function () {
            table.search(this.value).draw();
        });
    });

        $(document).ready(function () {
        var table = $('#courseTable').DataTable({
        language: {
        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
    },
        pageLength: 5
    });


    });
</script>