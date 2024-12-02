 // Add event listener for the Department dropdown
 document.getElementById('department').addEventListener('change', function () {
    const department = this.value;
    const assignToWrapper = document.getElementById('assignToWrapper');
    const assignToSelect = document.getElementById('assignTo');

    // Clear previous options
    assignToSelect.innerHTML = '';

    if (department === 'Suresh') {
        // Show assign-to dropdown and add options for Suresh
        assignToWrapper.style.display = 'block';
        assignToSelect.innerHTML = `
            <option value="Suresh1">Employee A</option>
            <option value="Suresh2">Employee B</option>
        `;
    } else if (department === 'Venkatesh') {
        // Show assign-to dropdown and add options for Venkatesh
        assignToWrapper.style.display = 'block';
        assignToSelect.innerHTML = `
            <option value="Venkatesh1">Employee C</option>
            <option value="Venkatesh2">Employee D</option>
        `;
    } else if (department === 'Upendra') {
        // Show assign-to dropdown and add options for Upendra
        assignToWrapper.style.display = 'block';
        assignToSelect.innerHTML = `
            <option value="Upendra1">Employee E</option>
            <option value="Upendra2">Employee F</option>
        `;
    } else {
        // Hide the assign-to dropdown if no department is selected
        assignToWrapper.style.display = 'none';
    }
});