<div class="container-fluid mt-4">


    <div class="row g-4">
        <!-- Carte prévisions de course -->
        <div class="col-md-9">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h5 class="card-title text-primary">
                        <i class="fas fa-flag-checkered"></i>Courses réalisées
                    </h5>

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
                            $course = Course::affichers("SELECT * FROM course WHERE status=2");
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

        <!-- Carte courses réalisées -->


    </div>
</div>
<script>
        $(document).ready(function () {
            var table = $('#courseTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
                },
                pageLength: 5
            });


        });
</script>