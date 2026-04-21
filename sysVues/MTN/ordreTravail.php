<div class="col-12 grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Liste des ordres de travail</h4>
            <a href="page-ordreTravail" class="btn btn-primary mb-3" >Ordres de travail clôturées</a>
            <input type="text" id="searchVehicule" class="form-control mb-3" placeholder="🔍 Rechercher un véhicule...">

            <div class="table-responsive">
                <table id="vehiculeTable" class="table table-bordered table-hover align-middle text-center">
                    <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Immatriculation</th>
                        <th>Description de l’anomalie</th>
                        <th>Date Anomalie</th>
                        <th>Niveau de gravité</th>
                        <th>Instructions</th>
                        <th>Date début</th>
                        <th>Heure début</th>
                        <th>Date fin</th>
                        <th>Heure fin</th>
                        <th class="text text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $j = 1;
                    $garage = Garage::affichers("SELECT * FROM garage WHERE status=2");
                    if ($garage){
                        foreach ($garage as $item){
                            $idPanne = $item->getIdpanne();
                            $i = Panne::afficher("SELECT * FROM panne WHERE id='$idPanne'");
                            $id = $i->getId();
                            $idVehicule = $i->getIdvehicule();
                            //$garage = Garage::afficher("SELECT * FROM garage WHERE idpanne='$id'");
                            $vehicule = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$idVehicule'");
                            ?>


                            <tr>
                                <td><?=$j++?></td>
                                <td><?=$vehicule->getNumeroPlaque()?></td>
                                <td><?=$i->getBody()?></td>
                                <td><?=$i->getDate()?></td>
                                <td><?=$i->getNiveau()?></td>
                                <td>
                                    <ul>
                                        <?php
                                        $instruction = Instructions::affichers("SELECT * FROM instructions WHERE id_anomalie='$id'");
                                        if ($instruction){
                                            foreach ($instruction as $items){
                                                echo '<li>'.$items->getTexte().'</li>';
                                            }
                                        }
                                        ?>
                                    </ul>
                                </td>
                                <td><?=$item->getDateDebut()?></td>
                                <td><?=$item->getDebut()?></td>
                                <td><?=$item->getDateFin()?></td>
                                <td><?=$item->getFin()?></td>
                                <td>

                                    <a class="btn btn-sm btn-danger" target="_blank" href="docJobCarte-<?=$item->getId()?>">Fichier</a>

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

