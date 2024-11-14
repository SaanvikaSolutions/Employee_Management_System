document.getElementById('searchBar').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#projectData tr');

    rows.forEach(row => {
        const name = row.cells[1].textContent.toLowerCase();
        const type = row.cells[2].textContent.toLowerCase();
        const manager = row.cells[3].textContent.toLowerCase();

        if (name.includes(filter) || type.includes(filter) || manager.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
