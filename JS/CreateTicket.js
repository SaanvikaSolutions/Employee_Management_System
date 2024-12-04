 // JavaScript to dynamically change project names based on project type selection
 document.addEventListener('DOMContentLoaded', function() {
    const projectTypeSelect = document.getElementById('project_type');
    const projectNameSelect = document.getElementById('project_name');

    // Function to update project names
    function updateProjectNames() {
        const projectType = projectTypeSelect.value;
        projectNameSelect.innerHTML = ''; // Clear existing options

        let options = [];
        if (projectType === 'interior') {
            options = ['Interior i1', 'Interior i2'];
        } else if (projectType === 'construction') {
            options = ['Construction c1', 'Construction c2'];
        }

        // Add new options to the project name select element
        options.forEach(function(optionText) {
            const option = document.createElement('option');
            option.value = optionText.toLowerCase().replace(' ', '_'); // Set value as a simplified version
            option.textContent = optionText;
            projectNameSelect.appendChild(option);
        });
    }

    // Add event listener to update project names when project type changes
    projectTypeSelect.addEventListener('change', updateProjectNames);

    // Initialize the project names when the page loads
    updateProjectNames();
});