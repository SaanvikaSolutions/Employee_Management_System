function fetchProjectNames() {
    const projectTypeDropdown = document.getElementById("project_type");
    const projectNameDropdown = document.getElementById("project_name");

    const projectType = projectTypeDropdown.value;

    // Clear existing options
    projectNameDropdown.innerHTML = "<option value=''>Select Project Name</option>";
    
    if (projectType) {
        fetch(`fetch_project_names.php?type=${encodeURIComponent(projectType)}`)
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then((data) => {
                console.log("Fetched project names:", data); // Debugging

                const uniqueProjects = new Set();

                if (data.length > 0) {
                    data.forEach((project) => {
                        if (!uniqueProjects.has(project.project_id)) {
                            uniqueProjects.add(project.project_id);

                            const option = document.createElement("option");
                            option.value = project.project_id;
                            option.textContent = project.project_name;
                            projectNameDropdown.appendChild(option);
                        }
                    });
                } else {
                    projectNameDropdown.innerHTML = "<option value=''>No projects available</option>";
                }
            })
            .catch((error) => {
                console.error("Error fetching project names:", error);
                alert("Failed to fetch project names. Please try again later.");
            });
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const projectTypeDropdown = document.getElementById("project_type");
    projectTypeDropdown.addEventListener("change", fetchProjectNames);
});
