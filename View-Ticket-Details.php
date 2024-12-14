<?php
// Include database connection
include('./backend/includes/dbconnect.php'); 

// Fetch ticket ID from the URL
$ticket_id = isset($_GET['ticket_id']) ? $_GET['ticket_id'] : null;

if ($ticket_id) {
    // Query to fetch ticket details along with the project name
    $query = "
        SELECT t.*, p.project_name 
        FROM tickets t
        LEFT JOIN projects p ON t.project_id = p.project_id
        WHERE t.ticket_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $ticket_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the ticket data with the project name
        $ticket = $result->fetch_assoc();
    } else {
        echo "Ticket not found.";
        exit;
    }
} else {
    echo "No Ticket ID provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ticket Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/View-Ticket-Details.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>

<body>
    <?php include('./Dashboard.php'); ?>
    
    <div class="view-ticket-details-wrapper">
        <div class="view-ticket-details-container">
            <div class="view-ticket-details-header">
                <div class="name">Ticket Details</div>
            </div>

            <div class="view-ticket-details-grid">
                <!-- Ticket ID -->
                <div class="view-ticket-details-item">
                    <label for="ticketId">Ticket ID</label>
                    <input type="text" id="ticketId" value="<?php echo htmlspecialchars($ticket['ticket_id']); ?>" disabled>
                </div>

                <!-- Client Name -->
                <div class="view-ticket-details-item">
                    <label for="clientName">Client Name</label>
                    <input type="text" id="clientName" value="<?php echo htmlspecialchars($ticket['client_name']); ?>" disabled>
                </div>

                <!-- Title -->
                <div class="view-ticket-details-item">
                    <label for="title">Issue</label>
                    <input type="text" id="title" value="<?php echo htmlspecialchars($ticket['Issue']); ?>" disabled>
                </div>

                <!-- Project Type -->
                <div class="view-ticket-details-item">
                    <label for="projectType">Project Type</label>
                    <input type="text" id="projectType" value="<?php echo htmlspecialchars($ticket['project_type']); ?>" disabled>
                </div>

                <!-- Priority Level -->
                <div class="view-ticket-details-item">
                    <label for="priorityLevel">Priority Level</label>
                    <input type="text" id="priorityLevel" value="<?php echo htmlspecialchars($ticket['priority']); ?>" disabled class="priority-medium">
                </div>

                <!-- Project Name -->
                <div class="view-ticket-details-item">
                    <label for="projectName">Project Name</label>
                    <input type="text" id="projectName" value="<?php echo htmlspecialchars($ticket['project_name']); ?>" disabled>
                </div>

                <!-- Phone Number -->
                <div class="view-ticket-details-item">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" id="phoneNumber" value="<?php echo htmlspecialchars($ticket['phone']); ?>" disabled>
                </div>

                <!-- Address -->
                <div class="view-ticket-details-item">
                    <label for="address">Address</label>
                    <input type="text" id="address" value="<?php echo htmlspecialchars($ticket['address']); ?>" disabled class="full-width">
                </div>

                <!-- Attachments Button -->
                <div class="view-ticket-details-item">
                    <label for="attachments">Attachments</label>
                    <button class="view-ticket-details-attachments-btn">View Attachments</button>
                </div>

                <!-- Description -->
                <div class="view-ticket-details-description view-ticket-details-item">
                    <label for="description">Description</label>
                    <textarea id="description" disabled>
                    <?php echo htmlspecialchars($ticket['description']); ?>
                    </textarea>
                </div>
            </div>

            <div class="view-ticket-details-buttons">
                <a href="ViewTicket.php" class="view-ticket-details-close-btn">
                    <button>Close</button>
                </a>
            </div>
        </div>
    </div>
</body>
<script src="JS/Dashboard.js"></script>
</html>
