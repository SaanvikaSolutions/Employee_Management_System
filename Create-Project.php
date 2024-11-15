<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="CSS/Create-Project.css">
   <link rel="stylesheet" href="CSS/Dashboard.css">
   <style>
        .EMS-createProject-select[multiple] {
        height: auto; /* Adjust the height as needed */
        overflow: auto; /* Enable scrolling if there are too many options */
        display: block; /* Ensure it is displayed correctly */
        }
    </style>
</head>
<body>

    <?php
    include('./Dashboard.php');
    include('./backend/includes/dbconnect.php')
    ?>

    <div class="EMS-createProject">
        <div class="EMS-createProject-header">Create New Project</div>
        <form action="Create-Project.php" method="POST" class="EMS-createProject-form">
      
            <div class="EMS-createProject-row">
                <div class="EMS-createProject-half">
                    <label for="project-name" class="EMS-createProject-label">Project Name</label>
                    <input type="text" id="project-name" name="projectName" class="EMS-createProject-input" placeholder="Enter project name" required>
                </div>
                <div class="EMS-createProject-half">
                    <label for="project-type" class="EMS-createProject-label">Project Type</label>
                    <select id="project-type" name="projectType" class="EMS-createProject-select" required>
                        <option value="" disabled selected>Select Project Type</option>
                        <option value="interior">Interior </option>
                        <option value="construction">Construction</option>
                        
                    </select>
                </div>
            </div>

        
            <div class="EMS-createProject-row">
                <div class="EMS-createProject-row">
                    <div class="EMS-createProject-half">
                        <label for="project-manager" class="EMS-createProject-label">Project Manager</label>
                        <select id="project-manager" name="projectManager" class="EMS-createProject-select" required>
                            <option value="" disabled selected>Select Project Manager</option>
                            <?php
                            // Fetching Managers From The Database
                            $get_manager_query = "SELECT * FROM `employees` WHERE employee_type = 'manager'";
                            $get_manager_res = mysqli_query($conn, $get_manager_query);
                            while ($row = mysqli_fetch_assoc($get_manager_res)) {
                                echo "<option value='" . $row['employee_id'] . "'>" . $row['name'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="EMS-createProject-half">
                    <label for="project-team" class="EMS-createProject-label">Project Team Members</label>
                    <select id="project-team" name="projectTeam[]" class="EMS-createProject-select" Multiple  required>
                        <option value="" disabled selected>Select Team Member</option>
                        <!-- <option value="sai">Sai</option> -->
                        <?php
                            //Fetching Managers From The Database
                            $get_manager_query = "SELECT * FROM `employees` WHERE employee_type = 'employee'";
                            $get_manager_res = mysqli_query($conn, $get_manager_query);
                            while ($row = mysqli_fetch_assoc($get_manager_res)) {
                                echo "<option value='" . $row['employee_id'] . "'>" . $row['name'] . "</option>";
                            }
                            ?>
                        
                    </select>
                </div>
            </div>

          
            <div class="EMS-createProject-row">
                <div class="EMS-createProject-half">
                    <label for="project-start-date" class="EMS-createProject-label">Start Date</label>
                    <input type="date" id="project-start-date" name="projectStartDate" class="EMS-createProject-date-input" required>
                </div>
                <div class="EMS-createProject-half">
                    <label for="project-end-date" class="EMS-createProject-label">End Date</label>
                    <input type="date" id="project-end-date" name="projectEndDate" class="EMS-createProject-date-input" required>
                </div>
                <div class="EMS-createProject-half">
                    <label for="project-budget" class="EMS-createProject-label">Budget (in Lakhs)</label>
                    <input type="number" id="project-budget" name="projectBudget" class="EMS-createProject-input" min="0" placeholder="Enter budget" required>
                </div>
            </div>

            <label for="project-description" class="EMS-createProject-label">Project Description</label>
            <textarea id="project-description" name="projectDescription" class="EMS-createProject-textarea" placeholder="Provide description about project" required></textarea>

            <button type="submit" class="EMS-createProject-submit-btn" name="createproject">Create Project</button>
        </form>
        <?php
        if (isset($_POST['createproject'])) {
            // Sanitize and retrieve form inputs
            $projectName = mysqli_real_escape_string($conn, $_POST['projectName']);
            $projectType = mysqli_real_escape_string($conn, $_POST['projectType']);
            $projectManager = mysqli_real_escape_string($conn, $_POST['projectManager']);
            $projectTeam = implode(',', $_POST['projectTeam']); // Convert team array to string
            $startDate = mysqli_real_escape_string($conn, $_POST['projectStartDate']);
            $endDate = mysqli_real_escape_string($conn, $_POST['projectEndDate']);
            $budget = mysqli_real_escape_string($conn, $_POST['projectBudget']);
            $projectDescription = mysqli_real_escape_string($conn, $_POST['projectDescription']);

            // Insert the project details into the database
            $query = "INSERT INTO projects (project_name, project_type, project_manager, project_team, start_date, end_date, budget, project_description)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssssssss", $projectName, $projectType, $projectManager, $projectTeam, $startDate, $endDate, $budget, $projectDescription);

            if ($stmt->execute()) {
                echo "<script>alert('Project created successfully!'); window.location.href='Create-Project.php';</script>";
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }
            $stmt->close();
        }
        ?>

    </div>
</body>
<script src="JS/Dashboard.js"></script>
</html>