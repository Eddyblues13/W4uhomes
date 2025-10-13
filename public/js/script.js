// js/script.js
document.addEventListener('DOMContentLoaded', function() {
    // Get DOM elements
    const hamburger = document.getElementById('hamburger');
    const closeBtn = document.getElementById('closeBtn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const menuToggles = document.querySelectorAll('.menu-toggle');

    // Function to open sidebar
    function openSidebar() {
        sidebar.classList.add('active');
        overlay.classList.add('active');
        hamburger.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // Function to close sidebar
    function closeSidebar() {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
        hamburger.classList.remove('active');
        document.body.style.overflow = '';
        
        // Close all submenus when closing sidebar
        document.querySelectorAll('.submenu').forEach(submenu => {
            submenu.classList.remove('active');
        });
        
        // Reset arrows
        document.querySelectorAll('.arrow').forEach(arrow => {
            arrow.style.transform = 'rotate(0deg)';
        });
    }

    // Toggle submenus
    function toggleSubmenu(button) {
        const submenu = button.nextElementSibling;
        const arrow = button.querySelector('.arrow');
        
        if (submenu && submenu.classList.contains('submenu')) {
            const isActive = submenu.classList.contains('active');
            
            // Close all other submenus
            document.querySelectorAll('.submenu').forEach(menu => {
                menu.classList.remove('active');
            });
            
            // Reset all arrows
            document.querySelectorAll('.arrow').forEach(arr => {
                arr.style.transform = 'rotate(0deg)';
            });
            
            // Toggle current submenu
            if (!isActive) {
                submenu.classList.add('active');
                arrow.style.transform = 'rotate(90deg)';
            }
        }
    }

    // Event listeners
    if (hamburger) {
        hamburger.addEventListener('click', openSidebar);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeSidebar);
    }

    if (overlay) {
        overlay.addEventListener('click', closeSidebar);
    }

    // Menu toggle event listeners
    menuToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            // If it's a link, don't prevent default
            if (this.getAttribute('href')) {
                return;
            }
            e.preventDefault();
            toggleSubmenu(this);
        });
    });

    // Close sidebar on escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && sidebar.classList.contains('active')) {
            closeSidebar();
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 991) {
            closeSidebar();
        }
    });

    // Close sidebar when clicking on links (for mobile)
    document.querySelectorAll('.sidebar a').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 991) {
                closeSidebar();
            }
        });
    });
});