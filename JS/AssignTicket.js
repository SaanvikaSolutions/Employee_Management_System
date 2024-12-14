 // Add event listener for the Department dropdown
//  document.getElementById('department').addEventListener('change', function () {
//     const department = this.value;
//     const assignToWrapper = document.getElementById('assignToWrapper');
//     const assignToSelect = document.getElementById('assignTo');

//     // Clear previous options
//     assignToSelect.innerHTML = '';

//     if (department === 'Suresh') {
//         // Show assign-to dropdown and add options for Suresh
//         assignToWrapper.style.display = 'block';
//         assignToSelect.innerHTML = `
//             <option value="Suresh1">Employee A</option>
//             <option value="Suresh2">Employee B</option>
//         `;
//     } else if (department === 'Venkatesh') {
//         // Show assign-to dropdown and add options for Venkatesh
//         assignToWrapper.style.display = 'block';
//         assignToSelect.innerHTML = `
//             <option value="Venkatesh1">Employee C</option>
//             <option value="Venkatesh2">Employee D</option>
//         `;
//     } else if (department === 'Upendra') {
//         // Show assign-to dropdown and add options for Upendra
//         assignToWrapper.style.display = 'block';
//         assignToSelect.innerHTML = `
//             <option value="Upendra1">Employee E</option>
//             <option value="Upendra2">Employee F</option>
//         `;
//     } else {
//         // Hide the assign-to dropdown if no department is selected
//         assignToWrapper.style.display = 'none';
//     }
// });

// ---------------New Js Code-------------//

// JavaScript to handle department selection and fetch employees dynamically
document.getElementById("department").addEventListener("change", function () {
    var department = this.value;

    if (department) {
        console.log("Selected Department:", department);

        // Send AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "fetch_employees.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    console.log("Server Response:", xhr.responseText);

                    // Populate the Assign To dropdown
                    var assignToDropdown = document.getElementById("assignTo");
                    assignToDropdown.innerHTML = xhr.responseText;

                    // Show the dropdown if there are employees
                    var assignToWrapper = document.getElementById("assignToWrapper");
                    assignToWrapper.style.display = xhr.responseText.includes("<option") ? "block" : "none";
                } else {
                    console.error("AJAX request failed with status:", xhr.status);
                }
            }
        };

        xhr.send("department=" + encodeURIComponent(department));
    } else {
        // Clear and hide Assign To dropdown if no department is selected
        var assignToDropdown = document.getElementById("assignTo");
        assignToDropdown.innerHTML = "<option value=''>Select Employee</option>";
        document.getElementById("assignToWrapper").style.display = "none";
    }
});



