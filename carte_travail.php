<?php
require_once ('header.php');
if (isset($_GET['id'])){
    $idGarage = intval(Query::securisation($_GET['id']));
    $garage = Garage::afficher("SELECT * FROM garage WHERE id='$idGarage'");
    $idPanne = $garage->getIdpanne();
    $panne = Panne::afficher("SELECT * FROM panne WHERE id='$idPanne'");
    $idAgent = $garage->getIdAgent();
    $users = Users::afficher("SELECT * FROM users WHERE id='$idAgent'");
    $idVehicule = $panne->getIdvehicule();
    $vehicule = Vehicule::afficher("SELECT * FROM vehicule WHERE id='$idVehicule'");
    $instruction = Instructions::affichers("SELECT * FROM instructions WHERE id_anomalie='$idPanne'");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Carte de Travail Mécanicien</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      @media print {

          .btn-no {
              display: none;
          }
      }
    body { background-color: #f8f9fa; }
    .card-travail {
      max-width: 800px;
      margin: 30px auto;
      padding: 30px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .card-travail h2 { text-align: center; margin-bottom: 30px; }
    .table td { vertical-align: middle; }
    .signature { height: 100px; border-bottom: 1px solid #000; }
    .logo { max-height: 60px; }
    .entreprise-info {
      font-size: 0.9rem;
      text-align: center;
      margin-top: 10px;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<div class="card-travail">
  <div class="text-center mb-2">
    <img src="assets/img/logo.png" alt="Logo IHS-RDC" class="logo">
  </div>
  <div class="entreprise-info">
    <strong>IHS-GARAGE</strong><br>
    120 Avenue Poivrier, Kolwezi, RDC<br>
    Téléphone : +243 973 563 600 | Email : infos@ihs-rdc.com<br>
    Site web : www.ihs-rdc.com<br><br>
      <button class="btn btn-primary btn-no" onclick="printFacture()">Imprimer</button>
      <a href="page-accueil" class="btn btn-info btn-no">Tableau de bord</a>
  </div>


  <h2>Ordres de travail</h2>

  <div class="row mb-3">
    <div class="col-md-6">
      <strong>Nom du Mécanicien :</strong> <?=$users->getUsername()?><br>

      <strong>Date début :</strong> <?=$garage->getDateDebut()?>

          <strong>Heure début :</strong> <?=$garage->getDebut()?><br>

          <strong>Date fin :</strong> <?=$garage->getDateFin()?>

          <strong>Heure fin :</strong> <?=$garage->getFin()?>
      </div>
  </div>

  <div class="mb-3">
    <strong>Informations sur le véhicule :</strong>
    <ul>
      <li><strong>Marque :</strong> <?=$vehicule->getMarque()?></li>
      <li><strong>Modèle :</strong> <?=$vehicule->getType()?></li>
      <li><strong>Immatriculation :</strong> <?=$vehicule->getNumeroPlaque()?></li>
      <li class="text text-danger"><strong >Anomalie :</strong> <?=$panne->getBody()?></li>
    </ul>
  </div>

  <div class="mb-3">
    <strong>Tâches effectuées :</strong>
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>Description</th>
          <th>Commentaire Mécanicien</th>
        </tr>
      </thead>
      <tbody>
      <?php
      $j = 1;
      if ($instruction){
          foreach ($instruction as $item){ ?>
              <tr>
                  <td><?=$j++?></td>
                  <td><?=$item->getTexte()?></td>
                  <td></td>
              </tr>
         <?php }
      }
      ?>


      </tbody>
    </table>
  </div>

  <div class="row mt-4">
    <div class="col-md-6">
      <strong>Remarques :</strong>
    </div>
    <div class="col-md-6 text-center">
      <strong>Signature mécanicien:</strong>
      <div class="signature mt-2"></div>
    </div>
    <div class="col-md-6 text-center">
      <strong>Nom & signature du Responsable:</strong>
      <div class="signature mt-2"></div>
    </div>
  </div>
    <p class="text text-center">Produit par IHS-RDC</p>
</div>
<script>
    function printFacture() {
        window.print();
    }
</script>
</body>
</html>
<?php } ?>