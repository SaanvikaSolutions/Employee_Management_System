<?php
// Include database connection
include('./backend/includes/dbconnect.php');

// Assume the logged-in employee ID is stored in a session
session_start();
$employee_id = $_SESSION['employee_id'];

// Fetch assigned tickets for the logged-in employee
$query = "
    SELECT ta.ticket_id, ta.client_name, ta.issue, ta.project_name, ta.priority_level, ta.assigned_date, p.project_type
    FROM ticket_assignments ta
    LEFT JOIN projects p ON ta.project_name = p.project_name
    WHERE ta.assigned_to = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("s", $employee_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigned Tickets</title>
    <link rel="stylesheet" href="CSS/Tickets.css">
</head>
<body>
    <h1>Assigned Tickets</h1>
    <table >
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Client Name</th>
                <th>Issue</th>
                <th>Project Name</th>
                <th>Priority</th>
                <th>Assigned Date</th>
                <th>Project Type</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['ticket_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['client_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['issue']); ?></td>
                        <td><?php echo htmlspecialchars($row['project_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['priority_level']); ?></td>
                        <td><?php echo htmlspecialchars($row['assigned_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['project_type']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No tickets assigned to you.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
