<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Ticket Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/CreateTicket.css"></link>
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>

<body class="CreateTicket">

    <?php
    include('./Dashboard.php');
    ?>


    <h2 class="CreateTicket">Create Ticket Form</h2>
    <div class="CreateTicket form-container">
        <form action="#" method="POST" enctype="multipart/form-data">

            <div class="CreateTicket form-section">
                <h3 class="CreateTicket"> Create New Ticket </h3>
                <div class="CreateTicket side-by-side">
                    <!-- <div>
                        <label for="ticket_id" class="CreateTicket">Ticket ID:</label>
                        <input type="text" id="ticket_id" name="ticket_id" required class="CreateTicket">
                    </div> -->
                    <div>
                        <label for="client_name" class="CreateTicket">Client name:</label>
                        <input type="text" id="client_name" name="cname" required class="CreateTicket">
                    </div>

                    <div>
                        <label for="title" class="CreateTicket">Issue:</label>
                        <input type="text" id="title" name="title" required class="CreateTicket">
                    </div>

                </div>

                <div class="CreateTicket side-by-side">
                    <div>
                        <label for="project_type" class="CreateTicket">Project Type:</label>
                        <select id="project_type" name="project_type" class="CreateTicket" onchange="fetchProjectNames()">
                            <option value="">Select project Type</option>
                            <?php
                            include('./backend/includes/dbconnect.php');
                            $query = "SELECT DISTINCT project_type FROM projects";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . htmlspecialchars($row['project_type']) . "'>" . htmlspecialchars($row['project_type']) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label for="project_name" class="CreateTicket">Project Name:</label>
                        <select id="project_name" name="project_name" class="CreateTicket">
                            <option value="">Select Project Name</option>
                        </select>
                    </div>

                    <div>
                        <label for="priority" class="CreateTicket">Priority Level:</label>
                        <select id="priority" name="priority" class="CreateTicket">
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>
                </div>

                <label for="description" class="CreateTicket">Description:</label>
                <textarea id="description" name="description" rows="4" required class="CreateTicket"></textarea>
            </div>

            <!-- Contact Info -->
            <div class="CreateTicket form-section">
                <h3 class="CreateTicket">Contact Info</h3>
                <div class="CreateTicket side-by-side">
                    <div>
                        <label for="name" class="CreateTicket">Name:</label>
                        <input type="text" id="name" name="name" required class="CreateTicket">
                    </div>
                    <div>
                        <label for="phone" class="CreateTicket">Phone Number:</label>
                        <input type="text" id="phone" name="phone" required class="CreateTicket">
                    </div>
                </div>

                <div class="CreateTicket side-by-side">
                    <div>
                        <label for="date_of_issue" class="CreateTicket">Date of Issue:</label>
                        <input type="date" id="date_of_issue" name="date_of_issue" required class="CreateTicket">
                    </div>
                    <div class="CreateTicket full-width">
                        <label for="address" class="CreateTicket">Address:</label>
                        <textarea id="address" name="address" rows="4" class="CreateTicket"></textarea>
                    </div>
                </div>

                <label for="attachments" class="CreateTicket">Attachments (Optional):</label>
                <input type="file" id="attachments" name="attachments" class="CreateTicket">
            </div>

            <button type="submit" class="CreateTicket submit-btn">Submit Ticket</button>

        </form>
        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Generate Unique Ticket ID
            $ticket_id = "TKT-" . strtoupper(bin2hex(random_bytes(4)));

            // Capture Form Data
            $client_name = mysqli_real_escape_string($conn, $_POST['cname']);
            $Issue = mysqli_real_escape_string($conn, $_POST['title']);
            $project_type = mysqli_real_escape_string($conn, $_POST['project_type']);
            $project_name = mysqli_real_escape_string($conn, $_POST['project_name']);
            $priority = mysqli_real_escape_string($conn, $_POST['priority']);
            $description = mysqli_real_escape_string($conn, $_POST['description']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $date_of_issue = mysqli_real_escape_string($conn, $_POST['date_of_issue']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);

            // Handle File Upload
            $attachments = null;
            if (!empty($_FILES['attachments']['name'])) {
                $target_dir = "./uploads/";
                $target_file = $target_dir . basename($_FILES['attachments']['name']);
                if (move_uploaded_file($_FILES['attachments']['tmp_name'], $target_file)) {
                    $attachments = $target_file;
                }
            }

            // Insert into Database
            $query = "INSERT INTO tickets (ticket_id, Issue, client_name, project_type, project_id, priority, description, name, phone, date_of_issue, address, attachments) 
                    VALUES ('$ticket_id', '$Issue', '$client_name', '$project_type', '$project_name', '$priority', '$description', '$name', '$phone', '$date_of_issue', '$address', '$attachments')";

            if (mysqli_query($conn, $query)) {
                echo "Ticket created successfully with Ticket ID: $ticket_id";
                echo "<script>alert('$ticket_id Ticket Created Successfully');window.location.href='createTicket.php';</script>";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        ?>

    </div>
</body>

<script src="JS/CreateTicket.js"></script>
<script src="JS/Dashboard.js"></script>
</html>
