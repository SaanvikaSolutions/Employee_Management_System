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
        <form action="#" method="post" enctype="multipart/form-data">

            <div class="CreateTicket form-section">
                <h3 class="CreateTicket"> Create New Ticket </h3>
                <div class="CreateTicket side-by-side">
                    <div>
                        <label for="ticket_id" class="CreateTicket">Ticket ID:</label>
                        <input type="text" id="ticket_id" name="ticket_id" required class="CreateTicket">
                    </div>
                    <div>
                        <label for="title" class="CreateTicket">Client name:</label>
                        <input type="text" id="title" name="title" required class="CreateTicket">
                    </div>

                    <div>
                        <label for="title" class="CreateTicket">Title:</label>
                        <input type="text" id="title" name="title" required class="CreateTicket">
                    </div>

                </div>

                <div class="CreateTicket side-by-side">
                    <div>
                        <label for="issue_type" class="CreateTicket">Project Type:</label>
                        <select id="issue_type" name="issue_type" class="CreateTicket">
                            <option value="bug">Interior</option>
                            <option value="feature_request">Construction</option>
                        </select>
                    </div>
                    <div>
                        <label for="priority" class="CreateTicket">Project Name:</label>
                        <select id="priority" name="priority" class="CreateTicket">
                            <option value="low">Project A</option>
                            <option value="medium">Project B</option>

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
    </div>

</body>
<script src="JS/Dashboard.js"></script>
</html>