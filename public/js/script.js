// Get DOM elements
const menuToggle = document.getElementById('menuToggle');
const closeMenu = document.getElementById('closeMenu');
const sidebar = document.getElementById('sidebar');
const sidebarOverlay = document.getElementById('sidebarOverlay');
const body = document.body;

// Function to open sidebar
function openSidebar() {
    sidebar.classList.add('active');
    sidebarOverlay.classList.add('active');
    body.classList.add('sidebar-open');
}

// Function to close sidebar
function closeSidebar() {
    sidebar.classList.remove('active');
    sidebarOverlay.classList.remove('active');
    body.classList.remove('sidebar-open');
}

// Event listeners
menuToggle.addEventListener('click', openSidebar);
closeMenu.addEventListener('click', closeSidebar);
sidebarOverlay.addEventListener('click', closeSidebar);

// Close sidebar when clicking on a submenu item
const submenuItems = document.querySelectorAll('.submenu-item');
submenuItems.forEach(item => {
    item.addEventListener('click', closeSidebar);
});

// Handle menu button collapse icons
const menuButtons = document.querySelectorAll('.menu-button[data-bs-toggle="collapse"]');
menuButtons.forEach(button => {
    button.addEventListener('click', function() {
        const isExpanded = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', !isExpanded);
    });
});

// Close sidebar on escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape' && sidebar.classList.contains('active')) {
        closeSidebar();
    }
});

// Prevent body scroll when sidebar is open
sidebar.addEventListener('touchmove', function(event) {
    event.stopPropagation();
}, { passive: false });

// Handle window resize
let resizeTimer;
window.addEventListener('resize', function() {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
        if (window.innerWidth > 992 && sidebar.classList.contains('active')) {
            closeSidebar();
        }
    }, 250);
});