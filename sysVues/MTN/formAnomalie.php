
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<style>

    .select2-container--default .select2-selection--single{
        padding:6px;
        height: 37px;
        width: 100%;
        font-size: 0.9em;
        position: relative;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        background-image: -moz-linear-gradient(top, #424242, #030303);
        background-image: -ms-linear-gradient(top, #424242, #030303);
        background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #424242), color-stop(100%, #030303));
        background-image: -webkit-linear-gradient(top, #424242, #030303);
        background-image: -o-linear-gradient(top, #424242, #030303);
        background-image: linear-gradient(#424242, #030303);
        width: 100%;
        color: #fff;
        font-size: 1.3em;
        padding: 4px 12px;
        height: 27px;
        position: absolute;
        top: 0px;
        right: 0px;
        width: 20px;
    }
</style>
<div class="container mt-5">
    <h3 class="mb-4">📋 Créer une anomalie</h3>
    <div id="loader" class="d-none text-center">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Chargement...</span>
        </div>
        <p>Enregistrement en cours...</p>
    </div>
    <form id="userForm">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="vehicule" class="form-label">Véhicule concerné</label>
                <select class="form-select js-example-tags right-align" id="vehicule" name="vehicule" required>
                    <option selected disabled>Choisir un véhicule</option>
                    <?php
                    $vehicule = Vehicule::affichers("SELECT * FROM vehicule WHERE status=1");
                    if($vehicule) {
                        foreach ($vehicule as $i) { ?>
                            <option value="<?=$i->getid()?>"><?=$i->getNumeroPlaque()?> - <?=$i->getMarque()?></option>
                      <?php  }
                    }

                    ?>

                </select>
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Description de l’anomalie</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Décrire le problème constaté..." required></textarea>
            </div>

            <div class="col-md-6">
                <label for="niveau" class="form-label">Niveau de gravité</label>
                <select class="form-select" id="niveau" name="niveau" required>
                    <option value="" disabled selected>Choisir le niveau</option>
                    <option value="mineure">Mineure</option>
                    <option value="moyenne">Moyenne</option>
                    <option value="critique">Critique</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="kilometrage" class="form-label">Kilométrage</label>
                <input type="number" class="form-control" id="kilometrage" name="kilometrage" placeholder="Ex : 123456" required>
            </div>

            <div class="col-12 text-end">
                <button type="submit" class="btn btn-success">📨 Enregistrer</button>
            </div>
        </div>
    </form>
    <div id="response"></div>
</div>
<script>
    $(".js-example-tags").select2({
        tags: true
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#userForm').on('submit', function(e) {
            e.preventDefault();

            // Récupération des valeurs
            const vehicule = $('#vehicule').val();
            const description = $('#description').val();
            const niveau = $('#niveau').val();
            const kilometrage = $('#kilometrage').val();

            // Vérification des champs
            if (!vehicule || !description || !niveau || !kilometrage) {
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
                    btn_send_anomalie: true,
                    vehicule: vehicule,
                    description: description,
                    niveau: niveau,
                    kilometrage:kilometrage

                },
                success: function(response) {
                    $('#loader').addClass('d-none');
                    $('#response').html('<div class="alert alert-success">' + response + '</div>');
                    $('#userForm')[0].reset();
                },
                error: function(xhr) {
                    console.log(xhr)
                    $('#loader').addClass('d-none');
                   // $('#response').html('<div class="alert alert-danger">Erreur : ' + xhr.responseText + '</div>');
                }
            });
        });
    });

</script>