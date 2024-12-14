<?php
// Include your database connection
include('./backend/includes/dbconnect.php');

// Check if a project ID is provided in the URL
if (isset($_GET['project_id'])) {
    $project_id = mysqli_real_escape_string($conn, $_GET['project_id']);
    
    // Fetch the existing project details from the database
    $query = "SELECT * FROM projects WHERE project_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $project = $result->fetch_assoc();

    if (!$project) {
        echo "<script>alert('Project not found.'); window.location.href='Create-Project.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('No project ID provided.'); window.location.href='Create-Project.php';</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/Create-Project.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>
<body>

    <?php include('./Dashboard.php'); ?>

    <div class="EMS-createProject">
        <div class="EMS-createProject-header">Edit Project</div>
        <form action="edit-project.php?project_id=<?php echo $project_id; ?>" method="POST" class="EMS-createProject-form">

            <div class="EMS-createProject-row">
                <div class="EMS-createProject-half">
                    <label for="project-name" class="EMS-createProject-label">Project Name</label>
                    <input type="text" id="project-name" name="projectName" class="EMS-createProject-input" value="<?php echo htmlspecialchars($project['project_name']); ?>" required>
                </div>
                <div class="EMS-createProject-half">
                    <label for="project-type" class="EMS-createProject-label">Project Type</label>
                    <select id="project-type" name="projectType" class="EMS-createProject-select" required>
                        <option value="interior" <?php if ($project['project_type'] == 'interior') echo 'selected'; ?>>Interior</option>
                        <option value="construction" <?php if ($project['project_type'] == 'construction') echo 'selected'; ?>>Construction</option>
                    </select>
                </div>
            </div>

            <div class="EMS-createProject-row">
                <div class="EMS-createProject-half">
                    <label for="project-manager" class="EMS-createProject-label">Project Manager</label>
                    <select id="project-manager" name="projectManager" class="EMS-createProject-select" required>
                        <?php
                        // Fetching Managers from the database
                        $get_manager_query = "SELECT * FROM employees WHERE employee_type = 'manager'";
                        $get_manager_res = mysqli_query($conn, $get_manager_query);
                        while ($row = mysqli_fetch_assoc($get_manager_res)) {
                            $selected = ($row['employee_id'] == $project['project_manager']) ? 'selected' : '';
                            echo "<option value='" . $row['employee_id'] . "' $selected>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="EMS-createProject-half">
                    <label for="project-team" class="EMS-createProject-label">Project Team Members</label>
                    <select id="project-team" name="projectTeam[]" class="EMS-createProject-select" multiple required>
                        <?php
                        // Fetching Employees from the database
                        $get_team_query = "SELECT * FROM employees WHERE employee_type = 'employee'";
                        $get_team_res = mysqli_query($conn, $get_team_query);
                        $selected_team_members = explode(',', $project['project_team']);

                        while ($row = mysqli_fetch_assoc($get_team_res)) {
                            $selected = in_array($row['employee_id'], $selected_team_members) ? 'selected' : '';
                            echo "<option value='" . $row['employee_id'] . "' $selected>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="EMS-createProject-row">
                <div class="EMS-createProject-half">
                    <label for="project-start-date" class="EMS-createProject-label">Start Date</label>
                    <input type="date" id="project-start-date" name="projectStartDate" class="EMS-createProject-date-input" value="<?php echo htmlspecialchars($project['start_date']); ?>" required>
                </div>
                <div class="EMS-createProject-half">
                    <label for="project-end-date" class="EMS-createProject-label">End Date</label>
                    <input type="date" id="project-end-date" name="projectEndDate" class="EMS-createProject-date-input" value="<?php echo htmlspecialchars($project['end_date']); ?>" required>
                </div>
                <div class="EMS-createProject-half">
                    <label for="project-budget" class="EMS-createProject-label">Budget (in Lakhs)</label>
                    <input type="number" id="project-budget" name="projectBudget" class="EMS-createProject-input" min="0" value="<?php echo htmlspecialchars($project['budget']); ?>" required>
                </div>
            </div>

            <label for="project-description" class="EMS-createProject-label">Project Description</label>
            <textarea id="project-description" name="projectDescription" class="EMS-createProject-textarea" required><?php echo htmlspecialchars($project['project_description']); ?></textarea>

            <button type="submit" class="EMS-createProject-submit-btn" name="updateproject">Update Project</button>
        </form>

        <?php
        if (isset($_POST['updateproject'])) {
            // Sanitize and retrieve form inputs
            $projectName = mysqli_real_escape_string($conn, $_POST['projectName']);
            $projectType = mysqli_real_escape_string($conn, $_POST['projectType']);
            $projectManager = mysqli_real_escape_string($conn, $_POST['projectManager']);
            $projectTeam = implode(',', $_POST['projectTeam']); // Convert team array to string
            $startDate = mysqli_real_escape_string($conn, $_POST['projectStartDate']);
            $endDate = mysqli_real_escape_string($conn, $_POST['projectEndDate']);
            $budget = mysqli_real_escape_string($conn, $_POST['projectBudget']);
            $projectDescription = mysqli_real_escape_string($conn, $_POST['projectDescription']);

            // Update the project details in the database
            $update_query = "UPDATE projects SET project_name = ?, project_type = ?, project_manager = ?, project_team = ?, start_date = ?, end_date = ?, budget = ?, project_description = ? WHERE project_id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("sssssssss", $projectName, $projectType, $projectManager, $projectTeam, $startDate, $endDate, $budget, $projectDescription, $project_id);

            if ($stmt->execute()) {
                echo "<script>alert('Project updated successfully!'); window.location.href='Create-Project.php';</script>";
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
