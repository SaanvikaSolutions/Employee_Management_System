<?php
include('./backend/includes/dbconnect.php'); 

header('Content-Type: application/json'); 

if (isset($_GET['type'])) {
    $project_type = mysqli_real_escape_string($conn, $_GET['type']);
    $query = "SELECT DISTINCT project_id, project_name 
              FROM projects 
              WHERE project_type = '$project_type'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        error_log("Database query failed: " . mysqli_error($conn));
        echo json_encode([]);
        exit;
    }

    $projects = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $projects[] = $row;
    }

    error_log(json_encode($projects)); // Debugging
    echo json_encode($projects);
} else {
    echo json_encode([]); // Return an empty array if no type is provided
}

?>
