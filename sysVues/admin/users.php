<div class="container mt-5">
    <h4>Liste des utilisateurs</h4>
    <a href="page-form" class="btn btn-primary" style="float: right;margin-bottom: 5px">Nouveau</a>
    <div class="mb-3">
        <input type="text" id="searchInput" class="form-control" placeholder="Rechercher un utilisateur...">
    </div>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Matricule</th>
            <th>Nom complet</th>
            <th>Fonction</th>
            <th>Date de création</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $j = 1;
        $users = Users::afficher2("SELECT * FROM users WHERE status=1");
        if ($users){
            foreach ($users as $i){ ?>
                <tr>
                    <td><?=$j++?></td>
                    <td><?=$i->getMatricule()?></td>
                    <td><?=$i->getUsername()?></td>
                    <td><?php
                        if ($i->getRole() == 'admin') echo 'Administrateur';
                        elseif ($i->getRole() == 'Chauffeur') echo 'Chauffeur';
                        elseif ($i->getRole() == 'CMTN') echo 'Chef Maintenance';
                        elseif ($i->getRole() == 'Mecanicien') echo 'Mécanicien';
                        elseif ($i->getRole() == 'CTRP') echo 'Chef Transport';


                        ?></td>
                    <td><?=$i->getDate()?></td>
                    <td>
                        <a href="pages-form-<?=$i->getId()?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="#" class="btn btn-danger btn-sm" onclick="showSwalDanger(<?=$i->getId()?>)">Supprimer</a>
                    </td>
                </tr>
          <?php  }
        }

        ?>



        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function showSwalDanger(val) {
        Swal.fire({
            title: 'Supprimer! ',
            text: 'Voulez-vous supprimer definitivement cet utilisateur?',
            icon: 'error',
            color: '#d33',
            confirmButtonText: 'Oui'
        }).then((result) => {
            if (result.isConfirmed) {
                // Action à effectuer lorsque l'utilisateur clique sur "OK"
                $.ajax({
                    url: 'data.html',
                    type: 'POST',
                    data: {
                        btn_send_users_delete: val
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr) {

                    }
                });

            }
        })

    }
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('table tbody tr');

        rows.forEach(function(row) {
            const cells = row.getElementsByTagName('td');
            const name = cells[1].textContent.toLowerCase();
            const email = cells[2].textContent.toLowerCase();

            if (name.includes(searchValue) || email.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

</script>