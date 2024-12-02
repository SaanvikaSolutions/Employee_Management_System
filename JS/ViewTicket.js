document.getElementById('searchBar').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#ticketData tr');

    rows.forEach(row => {
        // Get the text content of each column (Ticket ID, Client Name, etc.)
        const ticketId = row.cells[0].textContent.toLowerCase();
        const clientName = row.cells[1].textContent.toLowerCase();
        const title = row.cells[2].textContent.toLowerCase();
        const projectType = row.cells[3].textContent.toLowerCase();
        const projectName = row.cells[4].textContent.toLowerCase();
        const priorityLevel = row.cells[5].textContent.toLowerCase();

        // Check if any of the columns include the filter value
        if (ticketId.includes(filter) ||
            clientName.includes(filter) ||
            title.includes(filter) ||
            projectType.includes(filter) ||
            projectName.includes(filter) ||
            priorityLevel.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});