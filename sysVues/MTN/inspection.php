<div class="col-12 grid-margin stretch-card mt-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Liste des inspections et leurs fréquences</h4>
            <a href="page-formInspection" class="btn btn-primary mb-3" >Formulaire</a>
            <div class="table-responsive">
                <table id="inspectionTable" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-dark">
                    <tr>
                        <th>Inspection</th>
                        <th>Fréquence</th>
                        <th>Anomalie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $inspection = Inspections::affichers("SELECT * FROM inspections");
                    if ($inspection){
                        foreach ($inspection as $i){
                            $checked = $i->getStatus()==2 ? 'checked' : '';
                            $rowClass = $i->getStatus()==2 ? 'bg-success-subtle' : '';
                            ?>
                            <tr class="<?= $rowClass ?>" id="row-<?= $i->getId() ?>">
                                <td><?=$i->getInspection()?></td>
                                <td><?=$i->getFrequence()?></td>
                                <td class="text-center">
                                    <input
                                            type="checkbox"
                                            class="form-check-input update-effectue"
                                            data-id="<?= $i->getId() ?>"
                                        <?= $i->getStatus() == 2 ? 'checked' : '' ?>
                                    >
                                </td>
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
<script>
    $(document).ready(function () {
        var table = $('#inspectionTable').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
            },
            pageLength: 5
        });


    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.update-effectue').change(function() {
            var id = $(this).data('id');
            var effectue = $(this).is(':checked') ? 1 : 0;
            var row = $('#row-' + id);


            $.ajax({
                url: 'data.html',
                type: 'POST',
                data: { btn_check_anomalie:true, id: id, effectue: effectue },
                success: function(response) {
                    if (effectue === 1) {
                        row.addClass('bg-success-subtle');
                    } else {
                        row.removeClass('bg-success-subtle');
                    }
                },
                error: function() {
                    alert('Erreur lors de la mise à jour.');
                }
            });
        });
    });
</script>

