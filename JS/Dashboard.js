
       function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    const parentLi = dropdown.parentNode;
    const link = parentLi.querySelector('a');

    // Toggle the dropdown visibility
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';

    // Toggle the active class on the parent li
    parentLi.classList.toggle('active');

    // Remove active class from other dropdowns
    const allDropdowns = document.querySelectorAll('.Dashboard-dropdown');
    allDropdowns.forEach((dropdownItem) => {
        const dropdownLink = dropdownItem.querySelector('a');
        if (dropdownItem !== parentLi) {
            dropdownItem.classList.remove('active');
            dropdownItem.querySelector('.Dashboard-submenu').style.display = 'none'; // Close other dropdowns
            dropdownLink.classList.remove('selected'); // Remove selected class from other links
        }
    });

    // Add selected class to the clicked link
    if (link) {
        link.classList.toggle('selected');
    }
}

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('active');
}

function toggleTheme() {
    const body = document.body;
    const topbar = document.querySelector('.Dashboard-topbar');
    const sidebar = document.querySelector('.Dashboard-sidebar');
    const searchInput = document.querySelector('.Dashboard-search-container input');
    const themeIcon = document.getElementById('theme-icon');

    // Toggle classes for dark mode
    body.classList.toggle('dark');
    topbar.classList.toggle('dark');
    sidebar.classList.toggle('dark');
    searchInput.classList.toggle('dark');

    // Change icon based on theme
    themeIcon.classList.toggle('fa-sun');
    themeIcon.classList.toggle('fa-moon');

    // Change links in the sidebar
    const links = sidebar.querySelectorAll('a');
    links.forEach(link => link.classList.toggle('dark')); // Toggle dark class on sidebar links
}
