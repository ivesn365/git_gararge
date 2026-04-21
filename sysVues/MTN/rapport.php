<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<div class="container bg-white p-4 rounded shadow mb-5">
    <h2 class="mb-4">🛠️ Générer un Rapport</h2>

    <form action="rapport.php" method="POST" class="row g-3">
        <!-- Date de début -->
        <div class="col-md-4">
            <label for="dateDebut" class="form-label">Date de début</label>
            <input type="date" id="dateDebut" name="dateDebut" class="form-control" required>
        </div>

        <!-- Date de fin -->
        <div class="col-md-4">
            <label for="dateFin" class="form-label">Date de fin</label>
            <input type="date" id="dateFin" name="dateFin" class="form-control" required>
        </div>

        <!-- Filtrer par Véhicule -->
        <div class="col-md-4">
            <label for="vehicule" class="form-label">Véhicule</label>
            <select class="form-select js-example-tags right-align" id="vehicule" name="vehicule" required>
                <option value="0" selected>Tous</option>
                <?php
                $vehicule = Vehicule::affichers("SELECT * FROM vehicule WHERE status=1");
                if($vehicule) {
                    foreach ($vehicule as $i) { ?>
                        <option value="<?=$i->getid()?>"><?=$i->getNumeroPlaque()?> - <?=$i->getMarque()?></option>
                    <?php  }
                }

                ?>

            </select>        </div>

        <!-- État de l'anomalie -->
        <div class="col-md-4">
            <label for="etat" class="form-label">État</label>
            <select id="etat" name="etat" class="form-select" required>
                <option value="Tous" selected>Tous</option>
                <option value="Résolu">Résolu</option>
                <option value="En cours">En cours</option>
                <option value="En attente">En attente</option>
            </select>
        </div>

        <!-- Bouton Générer -->
        <div class="col-12 mt-4" >
            <button type="submit" hidden name="rapport" class="btn btn-primary w-100 mb-4">📄 Générer le Rapport</button>

        <button type="submit" name="rapportPDF"  class="btn btn-primary w-100 ">
            📄 Exporter en PDF
        </button>
        </div>

    </form>
</div>
<script>
    $(".js-example-tags").select2({
        tags: true
    });
</script>