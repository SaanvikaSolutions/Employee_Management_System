<?php
// Include database connection
include('./backend/includes/dbconnect.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $ticket_id = $_POST['ticketId'];
    $client_name = $_POST['clientName'];
    $issue = $_POST['title'];
    $project_type = $_POST['projectType'];
    $project_name = $_POST['projectName'];
    $priority_level = $_POST['priorityLevel'];
    $department = $_POST['department'];
    $assigned_to = $_POST['assignTo']; // Employee ID

    // Insert data into the 'ticket_assignments' table
    $query = "
        INSERT INTO ticket_assignments 
        (ticket_id, client_name, issue, project_type, project_name, priority_level, department, assigned_to, assigned_date)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $stmt = $conn->prepare($query);
    $stmt->bind_param(
        "ssssssss",
        $ticket_id,
        $client_name,
        $issue,
        $project_type,
        $project_name,
        $priority_level,
        $department,
        $assigned_to
    );

    if ($stmt->execute()) {
        echo "<script>alert('Ticket successfully assigned!');href='insertAssignTicket.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
