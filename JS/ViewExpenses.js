document.getElementById('searchBar').addEventListener('keyup', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#expenseData tr');

    rows.forEach(row => {
        // Get the text content of each column (Emp ID, Expense Type, Expense Category, etc.)
        const empId = row.cells[0].textContent.toLowerCase();
        const expenseType = row.cells[1].textContent.toLowerCase();
        const expenseCategory = row.cells[2].textContent.toLowerCase();
        const projectType = row.cells[4].textContent.toLowerCase();
        const projectName = row.cells[5].textContent.toLowerCase();
        const date = row.cells[6].textContent.toLowerCase();

        // Check if any of the columns include the filter value
        if (empId.includes(filter) || 
            expenseType.includes(filter) || 
            expenseCategory.includes(filter) || 
            projectType.includes(filter) || 
            projectName.includes(filter) || 
            date.includes(filter)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});
