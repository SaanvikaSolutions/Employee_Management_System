function showAssignedSection() {
    const employeeType = document.getElementById('employeeType').value;
    const assignedSection = document.getElementById('assignedSection');
    const assignedToSelect = document.getElementById('assignedTo');
    const departmentSection = document.getElementById('departmentSection');
    const employeeDepartmentSection = document.getElementById('employeeDepartmentSection');
    const genderSection = document.getElementById('gender');  // Gender will always be shown

    // Clear the current dropdown options in the 'Assigned To' section
    assignedToSelect.innerHTML = '<option value="">Select Assigned To</option>'; 
    departmentSection.classList.add('hidden'); // Hide department section by default
    employeeDepartmentSection.classList.add('hidden'); // Hide employee department section by default
    genderSection.classList.remove('hidden'); // Ensure gender section is visible

    if (employeeType === 'director' || employeeType === 'manager' || employeeType === 'employee') {
        assignedSection.classList.remove('hidden');

        // Make an AJAX request to fetch the options based on employee type
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `CreateEmployee.php?employeeType=${employeeType}`, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Populate the dropdown with the response from the server
                assignedToSelect.innerHTML = xhr.responseText;
               


            }
        };
        xhr.send();

        // Logic for specific employee types
        if (employeeType === 'manager') {
            departmentSection.classList.remove('hidden'); // Show department section for managers
        } else if (employeeType === 'employee') {
            employeeDepartmentSection.classList.remove('hidden'); // Show employee department section for employees
        }
        
        // Removed the condition that hides the gender section for director/manager roles
    } else {
        assignedSection.classList.add('hidden');
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
