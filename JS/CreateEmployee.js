function showAssignedSection() {
    var employeeType = document.getElementById('employeeType').value;
    var assignedSection = document.getElementById('assignedSection');
    var departmentSection = document.getElementById('departmentSection');
    var employeeDepartmentSection = document.getElementById('employeeDepartmentSection');
    
    // Reset visibility of all sections
    assignedSection.classList.add('hidden');
    departmentSection.classList.add('hidden');
    employeeDepartmentSection.classList.add('hidden');

    if (employeeType === 'director' || employeeType === 'manager' || employeeType === 'employee') {
        assignedSection.classList.remove('hidden');
        if (employeeType === 'manager' || employeeType === 'employee') {
            employeeDepartmentSection.classList.remove('hidden');
        } else {
            departmentSection.classList.remove('hidden');
        }

        // Make an AJAX request to populate the Assigned To dropdown
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'CreateEmployee.php?employeeType=' + employeeType, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById('assignedTo').innerHTML = xhr.responseText;
            } else {
                alert('Error fetching data.');
            }
        };
        xhr.send();
    }
}


// Populate country dropdown
const countries = [
    "United States", "Canada", "United Kingdom", "Australia", "Germany", "France",
    "India", "China", "Japan", "Brazil", "Mexico", "South Africa", "Italy",
    "Spain", "Russia", "Netherlands", "Turkey", "South Korea", "Saudi Arabia",
    "Sweden", "Norway", "Denmark", "Finland", "New Zealand", "Singapore", "Indonesia"
];

const countrySelect = document.getElementById('country');
countries.forEach(country => {
    const option = document.createElement('option');
    option.value = country.toLowerCase().replace(/\s+/g, '-'); 
    option.textContent = country;
    countrySelect.appendChild(option);
});
