<?php
if(isset($_GET['id'])){
    $id = intval(Query::securisation($_GET['id']));
    $i = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$id'")
    ?>


<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">MODIFIER UN VÉHICULE</h4>

            <form id="userForm" >
                <div class="row">
                    <!-- Marque -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Marque</label>
                            <input type="text" value="<?=$i->getMarque()?>" name="inputMarque" id="inputMarque" class="form-control" required />
                        </div>
                    </div>

                    <!-- Type -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" value="<?=$i->getType()?>" name="inputType" id="inputType" class="form-control" required />
                        </div>
                    </div>

                    <!-- Numéro Châssis -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Numéro Châssis</label>
                            <input type="text" value="<?=$i->getNumeroChassier()?>" name="inputChassis" id="inputChassis" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Numéro de plaque</label>
                            <input type="text" value="<?=$i->getNumeroPlaque()?>" name="inputPlaque" id="inputPlaque" class="form-control" required />
                        </div>
                    </div>
                    <!-- Nombre de places -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre de places</label>
                            <input type="text" value="<?=$i->getNbrePlace()?>" name="inputPlace" id="inputPlace" class="form-control" required />
                        </div>
                    </div>

                    <!-- Nombre de chevaux -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre de chevaux</label>
                            <input type="text" value="<?=$i->getChevotVapeur()?>" name="inputChevaux" id="inputChevaux" class="form-control" required />
                        </div>
                    </div>

                    <!-- Kilométrage -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Kilométrage</label>
                            <input type="text" value="<?=$i->getKilometrage()?>" name="inputKilometrage" id="inputKilometrage" class="form-control" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Prochaine inspection</label>
                            <input type="text" value="<?=$i->getProchaineInspection()?>" name="inputProchaineInspection" id="inputProchaineInspection" class="form-control" required />
                        </div>
                    </div>

                    <!-- Couleur -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Prochain entretien</label>
                            <input type="text" value="<?=$i->getProchaineEntretiens()?>" name="inputProchainEntretien" id="inputProchainEntretien" class="form-control" required />
                        </div>
                    </div>
                    <!-- Couleur -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Couleur</label>
                            <input type="text" value="<?=$i->getCouleur()?>" name="inputCouleur" id="inputCouleur" class="form-control" required />
                        </div>
                    </div>

                    <!-- Plaque -->


                    <!-- Nom du propriétaire -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nom du propriétaire</label>
                            <input type="text" value="<?=$i->getNomProprietaire()?>" name="inputProprietaire" id="inputProprietaire" class="form-control" required />
                        </div>
                    </div>

                    <!-- Date de fabrication -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date de fabrication</label>
                            <input type="date" name="inputFabrication" value="<?=$i->getDateFabrication()?>" id="inputFabrication" class="form-control" required />
                        </div>
                    </div>

                    <!-- Date de mise en service -->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Date de mise en service</label>
                            <input type="date" name="inputMiseEnService" value="<?=$i->getDateEnService()?>" id="inputMiseEnService" class="form-control" required />
                        </div>
                    </div>

                    <!-- Image -->

                </div>

                <!-- Bouton -->
                <div class="mt-3">
                    <button type="submit" name="btn_form_vehicule_update" class="btn btn-primary">Modifier</button>
                </div>
            </form>
            <div id="loader" style="display:none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Chargement...</span>
                </div>
            </div>

            <div id="response" class="mt-3"></div>

        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#userForm').on('submit', function(e) {
            e.preventDefault();

            // Récupération des valeurs
            const inputMarque = $('#inputMarque').val();
            const inputType = $('#inputType').val();
            const inputChassis = $('#inputChassis').val();
            const inputPlaque = $('#inputPlaque').val();
            const inputPlace = $('#inputPlace').val();
            const inputChevaux = $('#inputChevaux').val();
            const inputKilometrage = $('#inputKilometrage').val();
            const inputProchaineInspection = $('#inputProchaineInspection').val();
            const inputProchainEntretien = $('#inputProchainEntretien').val();
            const inputCouleur = $('#inputCouleur').val();
            const inputProprietaire = $('#inputProprietaire').val();
            const inputFabrication = $('#inputFabrication').val();
            const inputMiseEnService = $('#inputMiseEnService').val();

            // Vérification des champs
            if (!inputMiseEnService || !inputFabrication || !inputProprietaire || !inputCouleur || !inputProchainEntretien || !inputProchaineInspection
                || !inputKilometrage || !inputChevaux || !inputPlace || !inputPlaque || !inputChassis || !inputType || !inputMarque) {
                $('#response').html('<div class="alert alert-danger">Tous les champs sont obligatoires.</div>');
                return;
            }

            // Afficher le loader
            $('#loader').removeClass('d-none');
            $('#response').html('');

            // Envoi AJAX
            $.ajax({
                url: 'data.html',
                type: 'POST',
                data: {
                    btn_send_vehicule_update: <?=$id?>,
                    type: inputType,
                    chassis: inputChassis,
                    marque: inputMarque,
                    plaque: inputPlaque,
                    place: inputPlace,
                    chevaux: inputChevaux,
                    kilometrage: inputKilometrage,
                    prochaineInspection: inputProchaineInspection,
                    prochainEntretien: inputProchainEntretien,
                    couleur: inputCouleur,
                    proprietaire: inputProprietaire,
                    fabrication: inputFabrication,
                    miseEnService: inputMiseEnService
                },
                success: function(response) {
                    $('#loader').addClass('d-none');
                    $('#response').html('<div class="alert alert-success">' + response + '</div>');
                    $('#userForm')[0].reset();
                },
                error: function(xhr) {
                    $('#loader').addClass('d-none');
                    $('#response').html('<div class="alert alert-danger">Erreur, veuillez réessayer svp</div>');
                }
            });
        });
    });

</script>
<?php }
else{ ?>
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">AJOUTER UN VÉHICULE</h4>

                <form id="userForm" >
                    <div class="row">
                        <!-- Marque -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marque</label>
                                <input type="text" name="inputMarque" id="inputMarque" class="form-control" required />
                            </div>
                        </div>

                        <!-- Type -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type</label>
                                <input type="text" name="inputType" id="inputType" class="form-control" required />
                            </div>
                        </div>

                        <!-- Numéro Châssis -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Numéro Châssis</label>
                                <input type="text" name="inputChassis" id="inputChassis" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Numéro de plaque</label>
                                <input type="text" name="inputPlaque" id="inputPlaque" class="form-control" required />
                            </div>
                        </div>
                        <!-- Nombre de places -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre de places</label>
                                <input type="text" name="inputPlace" id="inputPlace" class="form-control" required />
                            </div>
                        </div>

                        <!-- Nombre de chevaux -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre de chevaux</label>
                                <input type="text" name="inputChevaux" id="inputChevaux" class="form-control" required />
                            </div>
                        </div>

                        <!-- Kilométrage -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kilométrage</label>
                                <input type="text" name="inputKilometrage" id="inputKilometrage" class="form-control" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Prochaine inspection</label>
                                <input type="text" name="inputProchaineInspection" id="inputProchaineInspection" class="form-control" required />
                            </div>
                        </div>

                        <!-- Couleur -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Prochain entretien</label>
                                <input type="text" name="inputProchainEntretien" id="inputProchainEntretien" class="form-control" required />
                            </div>
                        </div>
                        <!-- Couleur -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Couleur</label>
                                <input type="text" name="inputCouleur" id="inputCouleur" class="form-control" required />
                            </div>
                        </div>

                        <!-- Plaque -->


                        <!-- Nom du propriétaire -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom du propriétaire</label>
                                <input type="text" name="inputProprietaire" id="inputProprietaire" class="form-control" required />
                            </div>
                        </div>

                        <!-- Date de fabrication -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date de fabrication</label>
                                <input type="date" name="inputFabrication" id="inputFabrication" class="form-control" required />
                            </div>
                        </div>

                        <!-- Date de mise en service -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Date de mise en service</label>
                                <input type="date" name="inputMiseEnService" id="inputMiseEnService" class="form-control" required />
                            </div>
                        </div>

                        <!-- Image -->

                    </div>

                    <!-- Bouton -->
                    <div class="mt-3">
                        <button type="submit" name="btn_form_vehicule" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
                <div id="loader" style="display:none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Chargement...</span>
                    </div>
                </div>

                <div id="response" class="mt-3"></div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userForm').on('submit', function(e) {
                e.preventDefault();

                // Récupération des valeurs
                const inputMarque = $('#inputMarque').val();
                const inputType = $('#inputType').val();
                const inputChassis = $('#inputChassis').val();
                const inputPlaque = $('#inputPlaque').val();
                const inputPlace = $('#inputPlace').val();
                const inputChevaux = $('#inputChevaux').val();
                const inputKilometrage = $('#inputKilometrage').val();
                const inputProchaineInspection = $('#inputProchaineInspection').val();
                const inputProchainEntretien = $('#inputProchainEntretien').val();
                const inputCouleur = $('#inputCouleur').val();
                const inputProprietaire = $('#inputProprietaire').val();
                const inputFabrication = $('#inputFabrication').val();
                const inputMiseEnService = $('#inputMiseEnService').val();

                // Vérification des champs
                if (!inputMiseEnService || !inputFabrication || !inputProprietaire || !inputCouleur || !inputProchainEntretien || !inputProchaineInspection
                    || !inputKilometrage || !inputChevaux || !inputPlace || !inputPlaque || !inputChassis || !inputType || !inputMarque) {
                    $('#response').html('<div class="alert alert-danger">Tous les champs sont obligatoires.</div>');
                    return;
                }

                // Afficher le loader
                $('#loader').removeClass('d-none');
                $('#response').html('');

                // Envoi AJAX
                $.ajax({
                    url: 'data.html',
                    type: 'POST',
                    data: {
                        btn_send_vehicule: true,
                        type: inputType,
                        chassis: inputChassis,
                        marque: inputMarque,
                        plaque: inputPlaque,
                        place: inputPlace,
                        chevaux: inputChevaux,
                        kilometrage: inputKilometrage,
                        prochaineInspection: inputProchaineInspection,
                        prochainEntretien: inputProchainEntretien,
                        couleur: inputCouleur,
                        proprietaire: inputProprietaire,
                        fabrication: inputFabrication,
                        miseEnService: inputMiseEnService
                    },
                    success: function(response) {
                        $('#loader').addClass('d-none');
                        $('#response').html('<div class="alert alert-success">' + response + '</div>');
                        $('#userForm')[0].reset();
                    },
                    error: function(xhr) {
                        $('#loader').addClass('d-none');
                        $('#response').html('<div class="alert alert-danger">Erreur, veuillez réessayer svp</div>');
                    }
                });
            });
        });

    </script>
<?php }
?>