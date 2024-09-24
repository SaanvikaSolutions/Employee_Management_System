document.getElementById('searchBar').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#employeeData tr');

    rows.forEach(row => {
        const id = row.cells[1].textContent.toLowerCase();
        const name = row.cells[2].textContent.toLowerCase();
        const role = row.cells[3].textContent.toLowerCase();

        if (id.includes(filter) || name.includes(filter) || role.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
