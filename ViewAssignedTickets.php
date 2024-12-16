<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assigned Ticket details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   <link rel="stylesheet" href="CSS/ViewAssignedTickets.css">
   <link rel="stylesheet" href="CSS/Dashboard.css">
</head>

<body>
<?php 
include('./Dashboard.php');
?>

    <div class="View_Assigned_Ticket_details">
        <h1 class="View_Assigned_Ticket_detailsTitle">View Ticket Details</h1>
        <input type="text" id="searchBar" class="View_Assigned_Ticket_detailsTitleSearchBar"
            placeholder="Search by Ticket ID, Client Name, Title, Project Name, or Priority">
        <div class="View_Assigned_Ticket_detailsWrapper">
            <table class="View_Assigned_Ticket_detailsTable">
                <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Client Name</th>
                        <th>Title</th>
                        <th>Project Type</th>
                        <th>Project Name</th>
                        <th>Priority Level</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="ticketData">
                    <tr>
                        <td>1001</td>
                        <td>ABC Corp</td>
                        <td>Office Renovation</td>
                        <td>Renovation</td>
                        <td>Main Office</td>
                        <td class="priority-level-medium">Medium</td>
                        <td class="action-buttons-view-assigned-ticket-details">
                            <a href="View Assigned Ticket Details.php">
                                <button class="view-assigned-ticket-details-view-button">View Ticket Details</button>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <td>1002</td>
                        <td>XYZ Ltd</td>
                        <td>Building Construction</td>
                        <td>New Construction</td>
                        <td>Corporate Tower</td>
                        <td class="priority-level-high">High</td>
                        <td class="action-buttons-view-assigned-ticket-details">
                            <a href="View Assigned Ticket Details.php">
                                <button class="view-assigned-ticket-details-view-button">View Ticket Details</button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>1003</td>
                        <td>Tech Innovations</td>
                        <td>Software Development</td>
                        <td>IT</td>
                        <td>Mobile App</td>
                        <td class="priority-level-low">Low</td>
                        <td class="action-buttons-view-assigned-ticket-details">
                            <a href="View Assigned Ticket Details.php">
                                <button class="view-assigned-ticket-details-view-button">View Ticket Details</button>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="JS/View AssignedTickets.js"></script>
<script src="JS/Dashboard.js"></script>
</html>
