<?php
if(isset($_GET['id'])){
    $id = intval(Query::securisation($_GET['id']));
?>
<div class="container mt-5">
    <h3 class="mb-4">📋 Formulaire de clôture de panne</h3>
    <form action="data.html" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Veuillez insérer un fichier PDF</label>
            <input type="file" name="photo" class="form-control" accept="application/pdf" required>
            <input type="hidden" name="id" value="<?=$id?>">
        </div>
        <button class="btn btn-primary" type="submit" name="btn_cloture_tache" >Clôturer</button>
    </form>

    <div id="response"></div>
</div>
<?php

} ?>