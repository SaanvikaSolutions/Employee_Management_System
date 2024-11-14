<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="CSS/Create-Project.css">
   <link rel="stylesheet" href="CSS/Dashboard.css">
</head>
<body>

    <?php
    include('./Dashboard.php');
    ?>

    <div class="EMS-createProject">
        <div class="EMS-createProject-header">Create New Project</div>
        <form action="#" method="POST" class="EMS-createProject-form">
      
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
                <div class="EMS-createProject-half">
                    <label for="project-manager" class="EMS-createProject-label">Project Manager</label>
                    <select id="project-manager" name="projectManager" class="EMS-createProject-select" required>
                        <option value="" disabled selected>Select Project Manager</option>
                        <option value="suresh">Suresh</option>
                        <option value="venkatesh">Venkatesh</option>
                        <option value="upendra">Upendra</option>
                    </select>
                </div>
                <div class="EMS-createProject-half">
                    <label for="project-team" class="EMS-createProject-label">Project Team Members</label>
                    <select id="project-team" name="projectTeam" class="EMS-createProject-select" required>
                        <option value="" disabled selected>Select Team Member</option>
                        <option value="sai">Sai</option>
                        <option value="ram">Ram</option>
                        <option value="vamshee">Vamshee</option>
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
                    <label for="project-budget" class="EMS-createProject-label">Budget</label>
                    <input type="number" id="project-budget" name="projectBudget" class="EMS-createProject-input" min="0" placeholder="Enter budget" required>
                </div>
            </div>

            <label for="project-description" class="EMS-createProject-label">Project Description</label>
            <textarea id="project-description" name="projectDescription" class="EMS-createProject-textarea" placeholder="Provide description about project" required></textarea>

            <button type="submit" class="EMS-createProject-submit-btn">Create Project</button>
        </form>
    </div>
</body>
<script src="JS/Dashboard.js"></script>
</html>