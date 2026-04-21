<div class="col-6 grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
    <h4 class="mb-3">Ajouter une inspection</h4>
            <div id="loader" class="d-none text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Chargement...</span>
                </div>
                <p>Enregistrement en cours...</p>
            </div>
    <form  id="formAjoutInspection">
        <div class="mb-3">
            <label for="inspection" class="form-label">Nom de l'inspection</label>
            <input type="text" class="form-control" id="inspection" name="inspection" required>
        </div>

        <div class="mb-3">
            <label for="frequence" class="form-label">Fréquence</label>
            <select class="form-select" id="frequence" name="frequence" required>
                <option value="">-- Sélectionner la fréquence --</option>
                <option value="Quotidien">Quotidien</option>
                <option value="Hebdomadaire">Hebdomadaire</option>
                <option value="Mensuel">Mensuel</option>
                <option value="Trimestriel">Trimestriel</option>
                <option value="Semestriel">Semestriel</option>
                <option value="Annuel">Annuel</option>
                <option value="Selon kilométrage">Selon kilométrage</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
        <div id="response"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#formAjoutInspection').on('submit', function(e) {
            e.preventDefault();

            // Récupération des valeurs
            const inspection = $('#inspection').val();
            const frequence = $('#frequence').val();

            // Vérification des champs
            if (!inspection || !frequence) {
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
                    btn_send_inspection: true,
                    inspection: inspection,
                    frequence: frequence

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

