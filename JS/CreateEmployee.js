function showAssignedSection() {
    const employeeType = document.getElementById('employeeType').value;
    const assignedSection = document.getElementById('assignedSection');
    const assignedToSelect = document.getElementById('assignedTo');
    const departmentSection = document.getElementById('departmentSection');
    const employeeDepartmentSection = document.getElementById('employeeDepartmentSection');

    assignedToSelect.innerHTML = ''; // Clear existing options
    departmentSection.classList.add('hidden'); // Hide department section
    employeeDepartmentSection.classList.add('hidden'); // Hide employee department section

    if (employeeType === 'director') {
        assignedSection.classList.remove('hidden');
        assignedToSelect.innerHTML = `
                <option value="managingDirector1">Managing Director 1</option>
                <option value="managingDirector2">Managing Director 2</option>
                <option value="managingDirector3">Managing Director 3</option>
            `;
    } else if (employeeType === 'manager') {
        assignedSection.classList.remove('hidden');
        assignedToSelect.innerHTML = `
                <option value="director1">Director 1</option>
                <option value="director2">Director 2</option>
                <option value="director3">Director 3</option>
            `;
        departmentSection.classList.remove('hidden'); // Show department section for managers
    } else if (employeeType === 'employee') {
        assignedSection.classList.remove('hidden');
        assignedToSelect.innerHTML = `
                <option value="manager1">Manager 1</option>
                <option value="manager2">Manager 2</option>
                <option value="manager3">Manager 3</option>
            `;
        employeeDepartmentSection.classList.remove('hidden'); // Show employee department section
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
