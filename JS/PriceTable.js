document.getElementById('searchBar').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#projectData tr');

    rows.forEach(row => {
        const roomType = row.cells[1].textContent.toLowerCase();
        const itemName = row.cells[2].textContent.toLowerCase();
        const category = row.cells[3].textContent.toLowerCase();

        if (roomType.includes(filter) || itemName.includes(filter) || category.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});