function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("active");
}

function toggleTheme() {
    const body = document.body;
    const icon = document.getElementById("theme-icon");
    body.classList.toggle("dark");
    icon.classList.toggle("fa-moon");
    icon.classList.toggle("fa-sun");
}

function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
}