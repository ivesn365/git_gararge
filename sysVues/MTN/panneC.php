<div class="col-12 grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Liste des pannes</h4>

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
                        <th>Instructions</th>
                        <th class="text text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $j = 1;
                    $anomalie = Panne::affichers("SELECT * FROM panne WHERE status=2");
                    if ($anomalie){
                        foreach ($anomalie as $i){
                            $id = $i->getId();
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
                                    $instruction = Instructions::affichers("SELECT * FROM instructions WHERE id_anomalie='$id'");
                                    if ($instruction){
                                        foreach ($instruction as $item){
                                            echo '<li>'.$item->getTexte().'</li>';
                                        }
                                    }
                                    ?>
                                    </ul>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="pages-formAffect-<?=$i->getId()?>">Affecter</a>

                                </td>
                            </tr>
                        <?php   }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
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
</script>

