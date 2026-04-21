const menuToggle = document.getElementById('menu-toggle');
const sidebar = document.getElementById('sidebar');
const content = document.querySelector('.flex-grow-1');
const overlay = document.getElementById('sidebar-overlay');

menuToggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
    content.classList.toggle('shifted');
    overlay.classList.toggle('active');
});

// Fermer la sidebar en cliquant sur l’overlay
overlay.addEventListener('click', () => {
    sidebar.classList.remove('active');
    content.classList.remove('shifted');
    overlay.classList.remove('active');
});




