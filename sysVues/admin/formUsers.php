<?php
if (isset($_GET['id'])){
    $id = intval(Query::securisation($_GET['id']));
    $users = Users::afficher("SELECT * FROM users WHERE id='$id'");
    ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
    <h4>Modifier un utilisateur</h4>
            <div id="loader" class="d-none text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Chargement...</span>
                </div>
                <p>Enregistrement en cours...</p>
            </div>

            <form id="userForm">
        <div class="mb-3">
            <label for="userMatricule" class="form-label">Matricule</label>
            <input type="text" value="<?=$users->getMatricule()?>" class="form-control" id="userMatricule" name="userMatricule" placeholder="Entrez le matricule" required>
        </div>
        <div class="mb-3">
            <label for="userName" class="form-label">Nom complet</label>
            <input type="text" class="form-control" value="<?=$users->getUsername()?>" id="userName" name="userName" placeholder="Entrez le nom complet" required>
            <input type="hidden" class="form-control" value="<?=$users->getId()?>" id="id" name="id" placeholder="Entrez le nom complet" required>
        </div>
        <div class="mb-3">
            <label for="userRole" class="form-label">Fonction</label>
            <select class="form-select" id="userRole" name="userRole" required>
                <option value="">Sélectionnez une fonction</option>
                <?php
                if ($users->getRole() == "admin"){ ?>
                    <option value="admin" selected>Administrateur</option>
                    <option value="Chauffeur">Chauffeur</option>
                    <option value="CMTN">Chef Maintenance</option>
                    <option value="CTRP">Chef Transport</option>
                    <option value="Mecanicien">Mécanicien</option>
                <?php }

                elseif ($users->getRole() == "Chauffeur"){ ?>
                    <option value="admin" >Administrateur</option>
                    <option value="Chauffeur" selected>Chauffeur</option>
                    <option value="CMTN">Chef Maintenance</option>
                    <option value="CTRP">Chef Transport</option>
                    <option value="Mecanicien">Mécanicien</option>
                <?php }
                 elseif ($users->getRole() == "CMTN"){ ?>
                <option value="admin" >Administrateur</option>
                <option value="Chauffeur" >Chauffeur</option>
                <option value="CMTN" selected>Chef Maintenance</option>
                <option value="CTRP">Chef Transport</option>
                <option value="Mecanicien">Mécanicien</option>
                <?php }
                  elseif ($users->getRole() == "CTRP"){ ?>
                <option value="admin" >Administrateur</option>
                <option value="Chauffeur" >Chauffeur</option>
                <option value="CMTN" >Chef Maintenance</option>
                <option value="CTRP" selected>Chef Transport</option>
                <option value="Mecanicien">Mécanicien</option>
                <?php }
                elseif ($users->getRole() == "Mecanicien"){ ?>
                <option value="admin" >Administrateur</option>
                <option value="Chauffeur" >Chauffeur</option>
                <option value="CMTN" >Chef Maintenance</option>
                <option value="CTRP" >Chef Transport</option>
                <option value="Mecanicien" selected>Mécanicien</option>
                <?php }

                else{ ?>
                <option value="admin" >Administrateur</option>
                <option value="Chauffeur" >Chauffeur</option>
                <option value="CMTN" >Chef Maintenance</option>
                <option value="CTRP" >Chef Transport</option>
                <option value="Mecanicien" >Mécanicien</option>
                <?php }
                ?>

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
            <div id="response"></div>
</div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#userForm').on('submit', function(e) {
            e.preventDefault();

            // Récupération des valeurs
            const name = $('#userName').val();
            const matricule = $('#userMatricule').val();
            const role = $('#userRole').val();

            // Vérification des champs
            if (!name || !matricule || !role) {
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
                    btn_send_users_update: document.getElementById("id").value,
                    name: name,
                    matricule: matricule,
                    role: role
                },
                success: function(response) {
                    $('#loader').addClass('d-none');
                    $('#response').html('<div class="alert alert-success">' + response + '</div>');
                    $('#userForm')[0].reset();
                },
                error: function(xhr) {
                    $('#loader').addClass('d-none');
                    $('#response').html('<div class="alert alert-danger">Erreur : ' + xhr.responseText + '</div>');
                }
            });
        });
    });

</script>
<?php }
else{ ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h4>Ajouter un utilisateur</h4>
                <div id="loader" class="d-none text-center">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Chargement...</span>
                    </div>
                    <p>Enregistrement en cours...</p>
                </div>

                <form id="userForm">
                    <div class="mb-3">
                        <label for="userMatricule" class="form-label">Matricule</label>
                        <input type="text" class="form-control" id="userMatricule" name="userMatricule" placeholder="Entrez le matricule" required>
                    </div>
                    <div class="mb-3">
                        <label for="userName" class="form-label">Nom complet</label>
                        <input type="text" class="form-control" id="userName" name="userName" placeholder="Entrez le nom complet" required>
                    </div>
                    <div class="mb-3">
                        <label for="userRole" class="form-label">Fonction</label>
                        <select class="form-select" id="userRole" name="userRole" required>
                            <option value="">Sélectionnez une fonction</option>
                            <option value="admin">Administrateur</option>
                            <option value="Chauffeur">Chauffeur</option>
                            <option value="CMTN">Chef Maintenance</option>
                            <option value="CTRP">Chef Transport</option>
                            <option value="Mecanicien">Mécanicien</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
                <div id="response"></div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userForm').on('submit', function(e) {
                e.preventDefault();

                // Récupération des valeurs
                const name = $('#userName').val();
                const matricule = $('#userMatricule').val();
                const role = $('#userRole').val();

                // Vérification des champs
                if (!name || !matricule || !role) {
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
                        btn_send_users: name,
                        name: name,
                        matricule: matricule,
                        role: role
                    },
                    success: function(response) {
                        $('#loader').addClass('d-none');
                        $('#response').html('<div class="alert alert-success">' + response + '</div>');
                        $('#userForm')[0].reset();
                    },
                    error: function(xhr) {
                        $('#loader').addClass('d-none');
                        $('#response').html('<div class="alert alert-danger">Erreur : ' + xhr.responseText + '</div>');
                    }
                });
            });
        });

    </script>
<?php }

?>