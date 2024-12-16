<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ticket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/ViewTicket.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>

<body>
    <?php
    include('./Dashboard.php');
    include('./backend/includes/dbconnect.php');
    ?>

    <div class="View_ticket">
        <h1 class="View_ticketTitle">View Tickets</h1>
        <input type="text" id="searchBar" class="View_ticketTitleSearchBar" 
            placeholder="Search by Ticket ID, Client Name, Title, or Project Name" 
            onkeyup="filterTickets()">
        <div class="View_ticketWrapper">
            <table class="View_ticketTable">
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
                    <?php
                    // Fetch ticket data from the database
                    $query = "SELECT ticket_id, client_name, Issue, project_type, project_id, priority FROM tickets";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['ticket_id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['client_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Issue']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['project_type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['project_id']) . "</td>";
                            echo "<td class='priority-" . strtolower(htmlspecialchars($row['priority'])) . "'>" . ucfirst(htmlspecialchars($row['priority'])) . "</td>";
                            echo "<td class='action-buttons-view-ticket'>
                                    <a href='View-Ticket-Details.php?ticket_id=" . urlencode($row['ticket_id']) . "'>
                                        <button class='view-ticket-view-button'>View</button>
                                    </a>
                                    <a href='AssignTicket.php?ticket_id=" . urlencode($row['ticket_id']) . "'>
                                        <button class='view-ticket-assign-button'>Assign</button>
                                    </a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>No tickets found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- <script>
      
        function filterTickets() {
            const searchInput = document.getElementById('searchBar').value.toLowerCase();
            const rows = document.querySelectorAll('#ticketData tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                const match = Array.from(cells).some(cell =>
                    cell.textContent.toLowerCase().includes(searchInput)
                );
                row.style.display = match ? '' : 'none';
            });
        }
    </script> -->

</body>
<script src="js/ViewTicket.js"></script>
<script src="JS/Dashboard.js"></script>

</html>
