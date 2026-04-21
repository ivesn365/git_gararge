<div class="col-12 grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Liste des Véhicules</h4>
            <?php
            if ($_SESSION['roleSys'] == 'admin'){
            ?>
            <a href="page-formVehicule" class="btn btn-primary" style="float: right;margin-bottom: 5px">Nouveau</a>
            <?php } ?>
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un véhicule...">
            </div>
            <div class="table-responsive">

                <table class="table table-hover table-bordered" id="vehiculesTable">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Marque</th>
                        <th>Type</th>
                        <th>Châssis</th>
                        <th>Places</th>
                        <th>Chevaux</th>
                        <th>Kilométrage</th>
                        <th>Couleur</th>
                        <th>Plaque</th>
                        <th>Propriétaire</th>
                        <th>Prochaine inspection</th>
                        <th>Prochain Entretien</th>
                        <th>Date Fabrication</th>
                        <th>Date Mise en Service</th>
                        <?php
                        if ($_SESSION['roleSys'] == 'admin'){
                        ?>
                        <th colspan="3" class="text text-center">Action</th>
                        <?php }else{ ?>
                            <th class="text text-center">Action</th>
                     <?php   } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $j = 1;
                    $vehicule = Vehicule::affichers("SELECT * FROM vehicule WHERE status=1");
                    if($vehicule){
                        foreach ($vehicule as $i){ ?>
                            <tr>
                                <td><?=$j++?></td>
                                <td><?=$i->getMarque()?></td>
                                <td><?=$i->getType()?></td>
                                <td><?=$i->getNumeroChassier()?></td>
                                <td><?=$i->getNbrePlace()?></td>
                                <td><?=$i->getChevotVapeur()?></td>
                                <td><?=$i->getKilometrage()?></td>
                                <td><?=$i->getCouleur()?></td>
                                <td><?=$i->getNumeroPlaque()?></td>
                                <td><?=$i->getNomProprietaire()?></td>
                                <td><?=$i->getProchaineInspection()?></td>
                                <td><?=$i->getProchaineEntretiens()?></td>
                                <td><?=$i->getDateFabrication()?></td>
                                <td><?=$i->getDateFabrication()?></td>
                            <?php
                            if ($_SESSION['roleSys'] == 'admin'){
                                ?>
                                <td><a href="pages-formVehicule-<?=$i->getId()?>" class="btn btn-sm btn-primary">Modifier</a></td>
                                <td><button type="button" class="btn btn-sm btn-danger" onclick="showSwalDanger(<?=$i->getId()?>)">Supprimer</button></td>
                                <?php } ?>
                                <td><a href="pages-historiqueBus-<?=$i->getId()?>" class="btn btn-sm btn-info">Historique</a></td>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');

        rows.forEach(function(row) {
            const cells = row.getElementsByTagName('td');
            const Plaque = cells[8].textContent.toLowerCase();
            const Marque = cells[1].textContent.toLowerCase();
            const Type = cells[2].textContent.toLowerCase();

            if (Plaque.includes(searchValue) || Marque.includes(searchValue) || Type.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    function showSwalDanger(val) {
        Swal.fire({
            title: 'Supprimer! ',
            text: 'Voulez-vous supprimer definitivement ce véhicule?',
            icon: 'error',
            color: '#d33',
            confirmButtonText: 'Oui'
        }).then((result) => {
            if (result.isConfirmed) {
                // Action à effectuer lorsque l'utilisateur clique sur "OK"
                $.ajax({
                    url: 'data.html',
                    type: 'POST',
                    data: {
                        btn_send_vehicule_delete: val
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr) {

                    }
                });

            }
        })

    }
</script>