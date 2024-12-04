<?php
include('./backend/includes/dbconnect.php');

if (isset($_POST['projectType'])) {
    $project_type = mysqli_real_escape_string($conn, $_POST['projectType']);

    // Fetch project names based on the project type
    $sql = "SELECT `project_id`, `project_name` FROM `projects` WHERE `project_type` = '$project_type' ORDER BY `project_name`";
    
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        echo '<option value="">Select Project Name</option>';
        while ($row = mysqli_fetch_assoc($res)) {
            echo '<option value="' . htmlspecialchars($row['project_id']) . '">' . htmlspecialchars($row['project_name']) . '</option>';
        }
    } else {
        echo '<option value="">No projects found</option>';
    }
}
?>
