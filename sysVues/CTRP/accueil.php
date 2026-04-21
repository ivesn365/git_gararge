<h2 class="mb-4 fw-bold">Bienvenue 👋</h2>

<div class="row g-4">
    <div class="col-12 col-md-4">
        <div class="card border-0 shadow-sm bg-primary text-white hover-zoom">
            <a href="page-previsions" class="btn">
                <div class="card-body text-center">
                    <i class="fas fa-calendar-alt fa-2x mb-3"></i>
                    <h5 class="card-title">Prévision des courses</h5>
                    <p class="card-text fs-4 fw-semibold"><?=Query::CRUD("SELECT * FROM course WHERE status=1")->rowCount()?></p>
                </div>
            </a>
        </div>
    </div>
    <div class="col-12 col-md-4">
        <div class="card border-0 shadow-sm bg-success text-white hover-zoom">
            <a href="page-courses" class="btn">
                <div class="card-body text-center">
                    <i class="fas fa-flag-checkered fa-2x mb-3"></i>
                    <h5 class="card-title">Réalisation des courses</h5>
                    <p class="card-text fs-4 fw-semibold"><?=Query::CRUD("SELECT * FROM course WHERE status=2")->rowCount()?></p>
                </div>
            </a>
        </div>
    </div>

</div>

<!-- Graphique -->


<!-- Graphique des tâches -->
<section class="mt-5">
    <h4 class="fw-bold">Statistiques - Prévision des courses</h4>
    <canvas id="panneChart" height="100"></canvas>
</section>

<section class="mt-5">
    <h4 class="fw-bold">Statistiques - Réalisation des courses</h4>
    <canvas id="travailChart" height="100"></canvas>
</section>




<!-- Scripts Chart.js -->
<script>
    const panneCtx = document.getElementById('panneChart').getContext('2d');
    new Chart(panneCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin','Juil','Aout','Sept','Oct','Nov','Déc'],
            datasets: [{
                label: 'Pannes détectées',
                data: [<?=Course::countPanne(date("Y")."-01",1)?>, <?=Course::countPanne(date("Y")."-02",1)?>, <?=Course::countPanne(date("Y")."-03",1)?>, <?=Course::countPanne(date("Y")."-04",1)?>, <?=Course::countPanne(date("Y")."-05",1)?>, <?=Course::countPanne(date("Y")."-06",1)?>, <?=Course::countPanne(date("Y")."-07",1)?>,<?=Course::countPanne(date("Y")."-08",1)?>,<?=Course::countPanne(date("Y")."-09",1)?>,<?=Course::countPanne(date("Y")."-10",1)?>,<?=Course::countPanne(date("Y")."-11",1)?>, <?=Course::countPanne(date("Y")."-12",1)?>],
                backgroundColor: 'rgba(13, 110, 253, 0.7)',
                borderRadius: 10,
                borderWidth: 1,
                barThickness: 30
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    const travailCtx = document.getElementById('travailChart').getContext('2d');
    new Chart(travailCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fév', 'Mars', 'Avr', 'Mai', 'Juin','Juil','Aout','Sept','Oct','Nov','Déc'],
            datasets: [{
                label: 'Travaux clôturés',
                data: [<?=Course::countPanne(date("Y")."-01",2)?>, <?=Course::countPanne(date("Y")."-02",2)?>, <?=Course::countPanne(date("Y")."-03",2)?>, <?=Course::countPanne(date("Y")."-04",2)?>, <?=Course::countPanne(date("Y")."-05",2)?>, <?=Course::countPanne(date("Y")."-06",2)?>, <?=Course::countPanne(date("Y")."-07",2)?>, <?=Course::countPanne(date("Y")."-08",2)?>,<?=Course::countPanne(date("Y")."-09",2)?>,<?=Course::countPanne(date("Y")."-10",2)?>,<?=Course::countPanne(date("Y")."-11",2)?>,<?=Course::countPanne(date("Y")."-12",2)?>],
                backgroundColor: 'rgba(25, 135, 84, 0.7)',
                borderRadius: 10,
                borderWidth: 1,
                barThickness: 30
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

</script>


<!-- Font Awesome (à inclure si pas encore dans le projet) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
