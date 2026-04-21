<?php
if (isset($_GET['id'])) {
    $id = intval(Query::securisation($_GET['id']));
    $_SESSION['id_anomalie'] = $id;
    $anomalie = Panne::afficher("SELECT * FROM panne WHERE id='$id'");
    $idVe = $anomalie->getIdvehicule();
    $i = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$idVe'");
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
            <h2 class="text-center section-title">Information du véhicule</h2>

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




        </div>
        <div class="container mt-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">

                    <div class="alert alert-danger">Anomalie : <?=$anomalie->getBody()?></div>
                </div>
                <div class="card-body">
                    <form method="post" action="data.html">
                        <div class="mb-3">
                            <label for="instructionInput" class="form-label">Ajouter une instruction</label>
                            <input type="text" id="instructionInput" class="form-control" placeholder="Tapez une instruction et appuyez sur Entrée">
                        </div>

                        <ul id="listeInstructions" class="list-group mb-3"></ul>

                        <!-- Champ caché contenant toutes les instructions -->
                        <input type="hidden" name="instructions" id="instructionsFinales">

                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    <?php }
}
?>


<script>
    const input = document.getElementById('instructionInput');
    const liste = document.getElementById('listeInstructions');
    const champHidden = document.getElementById('instructionsFinales');
    const instructions = [];

    input.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' && input.value.trim() !== '') {
            event.preventDefault();
            const valeur = input.value.trim();
            instructions.push(valeur);
            champHidden.value = instructions.join('|');

            const item = document.createElement('li');
            item.className = 'list-group-item d-flex justify-content-between align-items-center';
            item.innerHTML = `${valeur} <button type="button" class="btn btn-sm btn-danger">X</button>`;

            item.querySelector('button').addEventListener('click', () => {
                const index = instructions.indexOf(valeur);
                if (index > -1) instructions.splice(index, 1);
                champHidden.value = instructions.join('|');
                item.remove();
            });

            liste.appendChild(item);
            input.value = '';
        }
    });
</script>
