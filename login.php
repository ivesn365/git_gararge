<?php
require_once ("header.php");

if(empty($_SESSION['csrf_tokenss'])){
    $_SESSION['csrf_tokenss'] = generateToken();
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/logo.png" />

  <style>
    body {
      background: linear-gradient(135deg, #007bff, #6610f2);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .login-box {
      background-color: white;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 0 20px rgba(0,0,0,0.1);
      width: 100%;
      max-width: 400px;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #6610f2;
    }

    .btn-primary {
      background-color: #6610f2;
      border: none;
    }

    .btn-primary:hover {
      background-color: #520dc2;
    }

    .logo {
      width: 70px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

<div class="login-box text-center">
  <img src="assets/img/logo.png" class="logo" alt="Logo">
  <h4 class="mb-4">Connexion à votre compte</h4>
    <div id="resultat"></div>
  <form id="form">
    <div class="mb-3 text-start">
      <label for="matricule" class="form-label">Matricule</label>
      <input type="text" name="matricule" id="matricule" class="form-control" placeholder="Matricule" required>
    </div>
    <div class="mb-3 text-start">
      <label for="password" class="form-label">Mot de passe</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" required>
        <input type="hidden" name="csrf_token" id="csrf_token" value="<?php
        if(!empty($_SESSION['csrf_tokenss'])){
            echo $_SESSION['csrf_tokenss'];
        }
        ?>">
    </div>

      <button type="button"  id="btn_connexion" name="btn_connexion" onclick="requestData()" class="btn btn-primary">Se connecter</button>
      <button class="btn btn-success" id="btn_load" hidden>
          <i class="fa fa-spinner fa-spin"></i> Veuillez patienter svp
      </button>
  </form>
    <p class="text text-center">Produit par IHS-RDC</p>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    const form = document.getElementById("form");
    form.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Empêcher la soumission du formulaire
            requestData()
        }
    });
    function requestData() {
        let login = document.getElementById("matricule").value;
        let password = document.getElementById("password").value;
        let csrf_token = document.querySelector("input[type=hidden]").value;
        let btn_load = document.getElementById("btn_load");
        let btn_connexion = document.getElementById("btn_connexion");
        let resultat = document.getElementById("resultat");

        if (login && password) {

            btn_load.hidden = false;
            btn_connexion.hidden = true;
            resultat.innerHTML = "<div class='alert alert-info'>Connexion en cours...</div>";

            // Simuler un temps de chargement (2 secondes)
            setTimeout(() => {
                $.ajax({
                    url: 'data.html',  // Assurez-vous que le fichier est correct
                    method: 'POST',
                    data: { btn_connexion: true, login: login, password: password, csrf_token: csrf_token },
                    success: function (response) {
                        btn_load.hidden = true;
                        btn_connexion.hidden = false;
                        if (response === "success") {
                            resultat.innerHTML = "<div class='alert alert-success'>Connexion réussie !</div>";
                            setTimeout(() => {
                                window.location.href = "page-accueil";  // Redirection après connexion
                            }, 1000); // Attendre 1 seconde avant la redirection
                        }
                        else if (response === "mot") {
                            resultat.innerHTML = "<div class='alert alert-success'>Connexion réussie !</div>";
                            setTimeout(() => {
                                window.location.href = "clogin.php";  // Redirection après connexion
                            }, 1000);
                        }
                        else {
                            console.log(response)
                            resultat.innerHTML = "<div class='alert alert-danger'>Veuillez vérifier votre nom d'utilisateur ou mot de passe.</div>";
                        }
                    },
                    error: function () {
                        btn_load.hidden = true;
                        btn_connexion.hidden = false;
                        resultat.innerHTML = "<div class='alert alert-danger'>Erreur de connexion au serveur.</div>";
                    }
                });
            }, 2000); // Temps de chargement simulé (2 secondes)
        } else {
            resultat.innerHTML = "<div class='alert alert-danger'>Veuillez remplir les champs vides.</div>";
        }
    }

    function chargement(){

    }

</script>
</body>

</html>
<?php

function generateToken($longue = 32){
    return bin2hex(random_bytes($longue));
}
?>
</body>
</html>
