<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assigned Ticket Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="CSS/View Assigned Ticket Details.css">
<link rel="stylesheet" href="CSS/Dashboard.css">
</head>

<body>
    <?php
    include('./Dashboard.php');
    include('./backend/includes/dbconnect.php');
    ?>


    <div class="ViewAssignedTicketDetails-wrapper">
        <div class="ViewAssignedTicketDetails-container">
            <div class="ViewAssignedTicketDetails-header">
                <div class="name">Ticket Details</div>
            </div>

            <div class="ViewAssignedTicketDetails-grid">
                <!-- Ticket ID -->
                <div class="ViewAssignedTicketDetails-item">
                    <label for="ticketId">Ticket ID</label>
                    <input type="text" id="ticketId" value="TKT-001" disabled>
                </div>

                <!-- Client Name -->
                <div class="ViewAssignedTicketDetails-item">
                    <label for="clientName">Client Name</label>
                    <input type="text" id="clientName" value="Jagadeesh" disabled>
                </div>

                <!-- Title -->
                <div class="ViewAssignedTicketDetails-item">
                    <label for="title">Title</label>
                    <input type="text" id="title" value="Issue with Plan" disabled>
                </div>

                <!-- Project Type -->
                <div class="ViewAssignedTicketDetails-item">
                    <label for="projectType">Project Type</label>
                    <input type="text" id="projectType" value="Interior" disabled>
                </div>

                <!-- Priority Level -->
                <div class="ViewAssignedTicketDetails-item">
                    <label for="priorityLevel">Priority Level</label>
                    <input type="text" id="priorityLevel" value="Medium" disabled
                        class="ViewAssignedTicketDetails-priority-medium">
                </div>

                <!-- Project Name -->
                <div class="ViewAssignedTicketDetails-item">
                    <label for="projectName">Project Name</label>
                    <input type="text" id="projectName" value="Sri Rama Villa" disabled>
                </div>

                <!-- Phone Number -->
                <div class="ViewAssignedTicketDetails-item">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="text" id="phoneNumber" value="(+91) 9999999999" disabled>
                </div>

                <!-- Address -->
                <div class="ViewAssignedTicketDetails-item">
                    <label for="address">Address</label>
                    <input type="text" id="address"
                        value="Sri Rama colony, Madhapur,500011, guttala begham pet Telangana" disabled
                        class="full-width">
                </div>

                <!-- Attachments Button -->
                <div class="ViewAssignedTicketDetails-item">
                    <label for="attachments">Attachments</label>
                    <button class="ViewAssignedTicketDetails-attachments-btn">View Attachments</button>
                </div>

                <!-- Description -->
                <div class="ViewAssignedTicketDetails-description ViewAssignedTicketDetails-item">
                    <label for="description">Description</label>
                    <textarea id="description" disabled>
Life is full of joy and challenges.
Life is full of moments of joy, pleasure, success, and comfort, but it also has misery, defeat, failures, and problems. Difficulties test a person's courage, patience, perseverance, and hard work. 
Hard work pays off.
If you work hard, it will pay off. History has shown that people who work hard are successful.
                    </textarea>
                </div>
            </div>

            <div class="ViewAssignedTicketDetails-buttons">
                <a href="ViewTicket.php" class="ViewAssignedTicketDetails-close-btn">
                    <button>Close</button>
                </a>
            </div>

        </div>
    </div>

</body>
<script src="JS/Dashboard.js"></script>
<script src="JS/Dashboard.js"></script>

</html>