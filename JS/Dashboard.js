function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    const parentLi = dropdown.parentNode;
    const arrow = parentLi.querySelector('.Dashboard-arrow');
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    parentLi.classList.toggle('active');
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

    body.classList.toggle('dark');
    topbar.classList.toggle('dark');
    sidebar.classList.toggle('dark');
    searchInput.classList.toggle('dark');

    // Change icon based on theme
    themeIcon.classList.toggle('fa-sun');
    themeIcon.classList.toggle('fa-moon');
}
