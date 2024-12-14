<?php
include('./backend/includes/dbconnect.php');

if (isset($_GET['project_id'])) {
    $project_id = $_GET['project_id'];

    // Prepare the DELETE query
    $delete_query = "DELETE FROM `projects` WHERE project_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $project_id);

    if ($stmt->execute()) {
        echo "<script>alert('Project deleted successfully.'); window.location.href='view-project.php';</script>";
    } else {
        echo "<script>alert('Error deleting project.'); window.location.href='view-project.php';</script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>alert('Invalid request.'); window.location.href='view-project.php';</script>";
}
?>
