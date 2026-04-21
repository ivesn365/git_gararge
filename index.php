<?php
require_once ("header.php");
if ($_SESSION['csrf_tokenss'] && $_SESSION['roleSys']) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>IHS-GARAGE | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/img/logo.png" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!-- CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- jQuery + DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>


</head>
<body>
<div class="d-flex" id="wrapper">
    <?php
    if ($_SESSION['roleSys'] == 'admin'){
    ?>
    <!-- Sidebar -->
    <aside class="bg-dark text-white sidebar p-3" id="sidebar">
        <h4 class="text-center mb-4">🚀 IHS-GARAGE</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="page-accueil" class="nav-link text-white">
                    <i class="fas fa-tachometer-alt fa-2x text-primary"></i> Tableau de bord
                </a>
            </li>
            <li class="nav-item">
                <a href="page-users" class="nav-link text-white">
                    <i class="fas fa-users fa-2x text-success"></i> Utilisateurs
                </a>
            </li>
            <li class="nav-item">
                <a href="planing" class="nav-link text-white">
                    <i class="fas fa-calendar-alt fa-2x text-warning"></i> Planification
                </a>
            </li>
            <li class="nav-item">
                <a href="page-car" class="nav-link text-white">
                    <i class="fas fa-car fa-2x text-danger"></i> Véhicule
                </a>
            </li>
            <li class="nav-item">
                <a href="page-mtn" class="nav-link text-white">
                    <i class="fas fa-tools fa-2x text-primary"></i> Maintenance
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link text-white dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-file-alt fa-2x text-info"></i> Rapports
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="page-rapport">Rapport MTN</a></li>
                    <li><a class="dropdown-item" href="page-rapportTRP">Rapport Transport</a></li>
                </ul>
            </li>

            <li class="nav-item mt-auto">
                <a href="data.html?logout=true" class="nav-link text-danger">
                    <i class="fas fa-sign-out-alt fa-2x"></i> Déconnexion
                </a>
            </li>
        </ul>


    </aside>

    <!-- Contenu principal -->
    <div class="flex-grow-1">

        <!-- Header -->
        <header class="bg-white shadow-sm sticky-top px-4 py-3 d-flex justify-content-between align-items-center">
            <button class="btn btn-outline-secondary d-lg-none" id="menu-toggle">
                ☰
            </button>
            <h5 class="mb-0">Tableau de bord</h5>
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted d-none d-sm-inline"><?=$_SESSION['username']?></span>
                <img src="assets/img/avatar.svg" width="50" height="50" class="rounded-circle" alt="avatar" />
            </div>
        </header>

        <!-- Main -->
        <main class="p-4">
            <?php
            if (isset($_GET['index'])){
                if ($_GET['index'] == 'accueil') include_once ('sysVues/admin/accueil.php');
                elseif ($_GET['index'] == 'users') include_once ('sysVues/admin/users.php');
                elseif ($_GET['index'] == 'form') include_once ('sysVues/admin/formUsers.php');
                elseif ($_GET['index'] == 'car') include_once ('sysVues/admin/vehicule.php');
                elseif ($_GET['index'] == 'formVehicule') include_once ('sysVues/admin/formVehicule.php');
                elseif ($_GET['index'] == 'historiqueBus') include_once ('sysVues/admin/historique.php');
                elseif ($_GET['index'] == 'anomalie') include_once ('sysVues/MTN/anomalie.php');
                elseif ($_GET['index'] == 'panne') include_once ('sysVues/MTN/panneC.php');
                elseif ($_GET['index'] == 'car') include_once ('sysVues/admin/vehicule.php');
                elseif ($_GET['index'] == 'carteTravail') include_once ('sysVues/MTN/carteTravail.php');
                elseif ($_GET['index'] == 'historiqueBus') include_once ('sysVues/admin/historique.php');
                elseif ($_GET['index'] == 'formAnomalie') include_once ('sysVues/MTN/formAnomalie.php');
                elseif ($_GET['index'] == 'formInstruction') include_once ('sysVues/MTN/formInstruction.php');
                elseif ($_GET['index'] == 'formAffect') include_once ('sysVues/MTN/formAffectation.php');
                elseif ($_GET['index'] == 'ordreTravail') include_once ('sysVues/MTN/ordreTravail.php');
                elseif ($_GET['index'] == 'formCloture') include_once ('sysVues/MTN/formClotureTache.php');
                elseif ($_GET['index'] == 'rapport') include_once ('sysVues/MTN/rapport.php');
                elseif ($_GET['index'] == 'mtn') include_once ('sysVues/MTN/panne.php');
                elseif ($_GET['index'] == 'previsions') include_once ('sysVues/CTRP/prevision.php');
                elseif ($_GET['index'] == 'formPrevision') include_once ('sysVues/CTRP/formPrevision.php');
                elseif ($_GET['index'] == 'formRealiser') include_once ('sysVues/CTRP/form_coursRealise.php');
                elseif ($_GET['index'] == 'courses') include_once ('sysVues/CTRP/courses.php');
                elseif ($_GET['index'] == 'rapportTRP') include_once ('sysVues/CTRP/rapport.php');
            }else include_once ('sysVues/admin/accueil.php');
            ?>

        </main>
    </div>
        <?php }
    elseif ($_SESSION['roleSys'] == 'CTRP'){
    ?>
    <!-- Sidebar -->
    <aside class="bg-dark text-white sidebar p-3" id="sidebar">
        <h4 class="text-center mb-4">🚀 IHS-GARAGE</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="page-accueil" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-home fa-lg text-primary me-2"></i> Tableau de bord
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="page-previsions" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-calendar-alt fa-2x text-warning me-3"></i> Prévision course
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="page-courses" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-flag-checkered fa-2x text-success me-3"></i> Course réalisée
                </a>
            </li>
            <li class="nav-item mb-3">
                <a href="page-rapport" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-file-alt fa-2x text-info me-3"></i>
                    <span>Rapports</span>
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a href="data.html?logout=true" class="nav-link text-danger d-flex align-items-center">
                    <i class="fas fa-sign-out-alt fa-2x me-3"></i>
                    <span>Déconnexion</span>
                </a>
            </li>
        </ul>



    </aside>

    <!-- Contenu principal -->
    <div class="flex-grow-1">

        <!-- Header -->
        <header class="bg-white shadow-sm sticky-top px-4 py-3 d-flex justify-content-between align-items-center">
            <button class="btn btn-outline-secondary d-lg-none" id="menu-toggle">
                ☰
            </button>
            <h5 class="mb-0">Tableau de bord</h5>
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted d-none d-sm-inline"><?=$_SESSION['username']?></span>
                <img src="assets/img/avatar.svg" width="50" height="50" class="rounded-circle" alt="avatar" />
            </div>
        </header>

        <!-- Main -->
        <main class="p-4">
            <?php
            if (isset($_GET['index'])){
                if ($_GET['index'] == 'accueil') include_once ('sysVues/CTRP/accueil.php');
                elseif ($_GET['index'] == 'previsions') include_once ('sysVues/CTRP/prevision.php');
                elseif ($_GET['index'] == 'formPrevision') include_once ('sysVues/CTRP/formPrevision.php');
                elseif ($_GET['index'] == 'formRealiser') include_once ('sysVues/CTRP/form_coursRealise.php');
                elseif ($_GET['index'] == 'courses') include_once ('sysVues/CTRP/courses.php');
                elseif ($_GET['index'] == 'rapport') include_once ('sysVues/CTRP/rapport.php');

            }else include_once ('sysVues/admin/accueil.php');
            ?>

        </main>
    </div>
        <?php }
    elseif ($_SESSION['roleSys'] == 'CMTN'){

    ?>
    <!-- Sidebar -->
    <aside class="bg-dark text-white sidebar p-3" id="sidebar">
        <h4 class="text-center mb-4">🚀 IHS-GARAGE</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a href="page-accueil" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-tachometer-alt fa-2x text-primary me-3"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>

            <li class="nav-item mb-3">
                <a href="page-anomalie" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-exclamation-triangle fa-2x text-warning me-3"></i>
                    <span>Anomalie</span>
                </a>
            </li>

            <li class="nav-item mb-3">
                <a href="page-panne" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-tools fa-2x text-success me-3"></i>
                    <span>Carte Panne</span>
                </a>
            </li>

            <li class="nav-item mb-3">
                <a href="page-carteTravail" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-clipboard-list fa-2x text-success me-3"></i>
                    <span>Ordres de travail</span>
                </a>
            </li>

            <li class="nav-item mb-3">
                <a href="planing" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-calendar-alt fa-2x text-warning me-3"></i>
                    <span>Planification</span>
                </a>
            </li>

            <li class="nav-item mb-3">
                <a href="page-car" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-car fa-2x text-danger me-3"></i>
                    <span>Véhicule</span>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a href="page-inspection" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-car fa-2x text-danger me-3"></i>
                    <span>Inspections</span>
                </a>
            </li>

            <li class="nav-item mb-3">
                <a href="page-rapport" class="nav-link text-white d-flex align-items-center">
                    <i class="fas fa-file-alt fa-2x text-info me-3"></i>
                    <span>Rapports</span>
                </a>
            </li>

            <li class="nav-item mt-auto">
                <a href="data.html?logout=true" class="nav-link text-danger d-flex align-items-center">
                    <i class="fas fa-sign-out-alt fa-2x me-3"></i>
                    <span>Déconnexion</span>
                </a>
            </li>
        </ul>



    </aside>

    <!-- Contenu principal -->
    <div class="flex-grow-1">

        <!-- Header -->
        <header class="bg-white shadow-sm sticky-top px-4 py-3 d-flex justify-content-between align-items-center">
            <button class="btn btn-outline-secondary d-lg-none" id="menu-toggle">
                ☰
            </button>
            <h5 class="mb-0">Tableau de bord</h5>
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted d-none d-sm-inline"><?=$_SESSION['username']?></span>
                <img src="assets/img/avatar.svg" width="50" height="50" class="rounded-circle" alt="avatar" />
            </div>
        </header>

        <!-- Main -->
        <main class="p-4">
            <?php
            if (isset($_GET['index'])){
                if ($_GET['index'] == 'accueil') include_once ('sysVues/MTN/panne.php');
                elseif ($_GET['index'] == 'anomalie') include_once ('sysVues/MTN/anomalie.php');
                elseif ($_GET['index'] == 'panne') include_once ('sysVues/MTN/panneC.php');
                elseif ($_GET['index'] == 'car') include_once ('sysVues/admin/vehicule.php');
                elseif ($_GET['index'] == 'carteTravail') include_once ('sysVues/MTN/carteTravail.php');
                elseif ($_GET['index'] == 'historiqueBus') include_once ('sysVues/admin/historique.php');
                elseif ($_GET['index'] == 'formAnomalie') include_once ('sysVues/MTN/formAnomalie.php');
                elseif ($_GET['index'] == 'formInstruction') include_once ('sysVues/MTN/formInstruction.php');
                elseif ($_GET['index'] == 'formAffect') include_once ('sysVues/MTN/formAffectation.php');
                elseif ($_GET['index'] == 'ordreTravail') include_once ('sysVues/MTN/ordreTravail.php');
                elseif ($_GET['index'] == 'formCloture') include_once ('sysVues/MTN/formClotureTache.php');
                elseif ($_GET['index'] == 'rapport') include_once ('sysVues/MTN/rapport.php');
                elseif ($_GET['index'] == 'inspection') include_once ('sysVues/MTN/inspection.php');
                elseif ($_GET['index'] == 'formInspection') include_once ('sysVues/MTN/formInspection.php');
            }else include_once ('sysVues/MTN/panne.php');
            ?>

        </main>
    </div>
        <?php }else header("Location:page-connexion"); ?>
</div>
<!-- Overlay pour mobile -->
<div id="sidebar-overlay"></div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/js/script.js"></script>


</body>
</html>
<?php
}else header("Location:page-connexion");
    ?>