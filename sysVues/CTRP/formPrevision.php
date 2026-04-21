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
<?php
    if(isset($_GET['id'])){
        $id = intval(Query::securisation($_GET['id']));
        $course = Course::afficher("SELECT * FROM course WHERE id='$id'");
        $idVehicule = $course->getVehicule();
        $idChauffeur = $course->getChauffeur(); ?>


        <div class="container mt-5">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <h4 class="card-title text-center mb-4">Modifier une Course</h4>
                    <div id="loader"></div>
                    <form id="form-course">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="vehicule" class="form-label">Véhicule</label>
                                <select class="form-select js-example-tags right-align" id="vehicule" name="vehicule" required>
                                    <option selected disabled>Choisir un véhicule</option>
                                    <?php
                                    $vehicule = Vehicule::affichers("SELECT * FROM vehicule WHERE status=1");
                                    if($vehicule) {
                                        foreach ($vehicule as $i) {
                                            if($idVehicule == $i->getid()){
                                            ?>
                                            <option value="<?=$i->getid()?>" selected><?=$i->getNumeroPlaque()?> - <?=$i->getMarque()?></option>
                                        <?php  }else{ ?>
                                                <option value="<?=$i->getid()?>"><?=$i->getNumeroPlaque()?> - <?=$i->getMarque()?></option>

                                            <?php }
                                        }
                                    }

                                    ?>

                                </select>

                            </div>
                            <div class="col-md-6">
                                <label for="chauffeur" class="form-label">Chauffeur</label>
                                <select class="form-control form-control-lg js-example-tags right-align" name="chauffeur" required id="chauffeur" style="width: 100%">
                                    <option selected disabled>Veuillez Selectionner un chauffeur</option>
                                    <?php
                                    $role = Users::key()->encrypt("Chauffeur");
                                    $mecanicien =  Users::afficher2("SELECT * FROM users WHERE status=1 AND role='$role'");
                                    if ($mecanicien) {
                                        foreach ($mecanicien as $i) {
                                            if($idChauffeur == $i->getId()) {
                                                echo '<option selected value="' . $i->getId() . '">' . $i->getUsername() . '</option>';
                                            }else echo '<option value="' . $i->getId() . '">' . $i->getUsername() . '</option>';

                                        }
                                    }
                                    ?>

                                </select>                    </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" value="<?=$course->getDateCourse()?>"  id="date" name="date" required>
                            </div>
                            <div class="col-md-6">
                                <label for="destination" class="form-label">Destination</label>
                                <input type="text" class="form-control" value="<?=$course->getDestination()?>" id="destination" name="destination" required>
                            </div>
                            <div class="col-md-6">
                                <label for="destination" class="form-label">Nombre des courses prévues</label>
                                <input type="number" class="form-control" value="<?=$course->getCoursePrevue()?>"  id="courses" name="courses" required>
                            </div>
                        </div>



                        <div id="message" class="text-center mb-3"></div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                    </form>
                </div>
                <div id="response"></div>
            </div>
        </div>
        <script>
            $(".js-example-tags").select2({
                tags: true
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#form-course').on('submit', function(e) {
                    e.preventDefault();

                    // Récupération des valeurs
                    const vehicule = $('#vehicule').val();
                    const chauffeur = $('#chauffeur').val();
                    const date = $('#date').val();
                    const destination = $('#destination').val();
                    const courses = $('#courses').val();

                    // Vérification des champs
                    if (!vehicule || !chauffeur || !date || !destination|| !courses) {
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
                            btn_send_course_prevision_update: true,
                            vehicule: vehicule,
                            chauffeur: chauffeur,
                            date: date,
                            destination:destination,
                            courses:courses,
                            id:<?=$id?>
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

 <?php   }else{
?>
<div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="card-title text-center mb-4">Ajouter une Course</h4>
            <div id="loader"></div>
            <form id="form-course">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="vehicule" class="form-label">Véhicule</label>
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
                    <div class="col-md-6">
                        <label for="chauffeur" class="form-label">Chauffeur</label>
                        <select class="form-control form-control-lg js-example-tags right-align" name="chauffeur" required id="chauffeur" style="width: 100%">
                            <option selected disabled>Veuillez Selectionner un chauffeur</option>
                            <?php
                            $role = Users::key()->encrypt("Chauffeur");
                            $mecanicien =  Users::afficher2("SELECT * FROM users WHERE status=1 AND role='$role'");
                            if ($mecanicien){
                                foreach ($mecanicien as $i)
                                    echo '<option value="'.$i->getId().'">'.$i->getUsername().'</option>';
                            }
                            ?>

                        </select>                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="col-md-6">
                        <label for="destination" class="form-label">Destination</label>
                        <input type="text" class="form-control" id="destination" name="destination" required>
                    </div>
                    <div class="col-md-6">
                        <label for="destination" class="form-label">Nombre des courses prévues</label>
                        <input type="number" class="form-control" id="courses" name="courses" required>
                    </div>
                </div>



                <div id="message" class="text-center mb-3"></div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                </div>
            </form>
        </div>
        <div id="response"></div>
    </div>
</div>
<script>
    $(".js-example-tags").select2({
        tags: true
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#form-course').on('submit', function(e) {
            e.preventDefault();

            // Récupération des valeurs
            const vehicule = $('#vehicule').val();
            const chauffeur = $('#chauffeur').val();
            const date = $('#date').val();
            const destination = $('#destination').val();
            const courses = $('#courses').val();

            // Vérification des champs
            if (!vehicule || !chauffeur || !date || !destination|| !courses) {
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
                    btn_send_course_prevision: true,
                    vehicule: vehicule,
                    chauffeur: chauffeur,
                    date: date,
                    destination:destination,
                    courses:courses
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
<?php } ?>
