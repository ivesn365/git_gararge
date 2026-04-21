<?php


function isMobile() {
    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
    $mobileKeywords = ['iphone', 'android', 'blackberry', 'opera mini', 'windows phone', 'mobile', 'tablet'];

    foreach ($mobileKeywords as $keyword) {
        if (strpos($userAgent, $keyword) !== false) {
            return true;
        }
    }
    return false;
}


if(isset($_GET['id'])){
    $id = intval(Query::securisation($_GET['id']));
    $id = intval(Query::securisation($_GET['id']));
    $anomalie = Panne::afficher("SELECT * FROM panne WHERE id='$id'");
    $idVe = $anomalie->getIdvehicule();
    $vehicule = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$idVe'");?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <div class="main-panel" >
        <div class="content-wrapper" >
            <div class="row">
                <div class="col-lg-4" <?php
                if(!isMobile()){ ?>
                    style="position:fixed; right: 0; z-index: 1;"
                <?php   }


                ?>>
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title"></h4>
                            <span class="text text-bold">N° Plaque : <?= $vehicule->getNumeroPlaque() ?></span><br>
                            <p class="text text-danger"> <?=$anomalie->getBody()?></p>
                            <ol class=" upgrade-info mb-0">


                            </ol>
                            <ul>
                                <?php
                                $garage = Garage::affichers("SELECT * FROM garage WHERE idpanne='$id'");
                                if($garage){ ?>


                                <?php    }


                                if ($garage){
                                    echo "<h3>Mecanicien(s) affecté(s)</h3>";
                                    foreach ($garage as $j){
                                        $idUsers = $j->getIdAgent();
                                        $users = Users::afficher("SELECT * FROM users WHERE id='$idUsers'");
                                        echo ' <li class="fw-bold">'.$users->getUsername().'</li>';
                                    }


                                }



                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" style="margin-left:5px">
                    <div class="card">
                        <div class="card-body">
                            <style>

                                .select2-container--default .select2-selection--single{
                                    padding:6px;
                                    height: 37px;
                                    width: 100%;
                                    font-size: 1.2em;
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
                            <h4 class="card-title">Formulaire d'affectation</h4>





                            <form action="data.html" method="post" >
                                <div class="mb-3">
                                    <label for="pieceSelect">Selectionnez un mecanicien</label>
                                    <select class="form-control form-control-lg js-example-tags right-align" name="agent" required id="pieceSelect" style="width: 100%">
                                        <option value="">Veuillez Selectionner un mecanicien</option>
                                        <?php
                                        $role = Users::key()->encrypt("Mecanicien");
                                        $mecanicien =  Users::afficher2("SELECT * FROM users WHERE status=1 AND role='$role'");
                                        if ($mecanicien){
                                            foreach ($mecanicien as $i)
                                            echo '<option value="'.$i->getId().'">'.$i->getUsername().'</option>';
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Date début</label>
                                    <input type="date" name="date_debut" class="form-control form-control-lg">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Heure début</label>
                                    <input type="time" name="h_debut" class="form-control form-control-lg">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Date fin</label>
                                    <input type="date" name="date_fin" class="form-control form-control-lg">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Heure fin</label>
                                    <input type="time" name="h_fin" class="form-control form-control-lg">
                                </div>


                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Selectionnez un niveau</label>
                                    <select class="form-control form-control-lg" name="niveau" id="exampleFormControlSelect1">
                                        <option value="0">Très urgent</option>
                                        <option value="1">Urgent</option>
                                        <option value="2">Normal</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <input value="<?=$id?>" name="idPanne" type="hidden">

                                </div>




                                    <button type="submit" name="btn_affecter_carte_panne" class="btn btn-primary mb-2 text-white">Valider</button>


                            </form>

                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>
    </div>

    <script>
        $(".js-example-tags").select2({
            tags: true
        });
    </script>


    <?php





}

else header("Location:index-index");

?>
