<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Ticket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/AssignTicket.css">
    <link rel="stylesheet" href="CSS/Dashboard.css"> 
</head>

<body>

    <?php
    include('./Dashboard.php');
    ?>

    <div class="Assign_Ticket_Container">
        <h1 class="Assign_Ticket_Header">Assign Ticket</h1>
        <form id="assignTicketForm">
            <!-- Ticket ID, Client Name -->
            <div class="Assign_Form_Group">
                <div>
                    <label for="ticketId" class="Assign_Form_Group_Label">Ticket ID</label>
                    <input type="text" id="ticketId" name="ticketId" value="TKT-001" required class="Assign_Form_Group_Input">
                </div>
                <div>
                    <label for="clientName" class="Assign_Form_Group_Label">Client Name</label>
                    <input type="text" id="clientName" name="clientName" value="Jagadeesh" required class="Assign_Form_Group_Input">
                </div>
            </div>

            <!-- Title, Project Type -->
            <div class="Assign_Form_Group">
                <div>
                    <label for="title" class="Assign_Form_Group_Label">Title</label>
                    <input type="text" id="title" name="title" value="Issue with Plan" required class="Assign_Form_Group_Input">
                </div>
                <div>
                    <label for="projectType" class="Assign_Form_Group_Label">Project Type</label>
                    <input type="text" id="projectType" name="projectType" value="Interior" required class="Assign_Form_Group_Input">
                </div>
            </div>

            <!-- Project Name, Priority Level -->
            <div class="Assign_Form_Group">
                <div>
                    <label for="projectName" class="Assign_Form_Group_Label">Project Name</label>
                    <input type="text" id="projectName" name="projectName" value="Sri Rama Villa" required class="Assign_Form_Group_Input">
                </div>
                <div>
                    <label for="priorityLevel" class="Assign_Form_Group_Label">Priority Level</label>
                    <select id="priorityLevel" name="priorityLevel" required class="Assign_Form_Group_Select">
                        <option value="Low" selected>Select priority Level</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                    </select>
                </div>
            </div>

            <!-- Department -->
            <div class="Assign_Form_Group">
                <div>
                    <label for="department" class="Assign_Form_Group_Label">Department</label>
                    <select id="department" name="department" required class="Assign_Form_Group_Select">
                        <option value="Suresh" selected>Select Department</option>
                        <option value="Suresh" >Suresh</option>
                        <option value="Venkatesh">Venkatesh</option>
                        <option value="Upendra">Upendra</option>
                    </select>
                </div>
            </div>

            <!-- Assign To Dropdown (Hidden Initially) -->
            <div class="Assign_To_Wrapper" id="assignToWrapper">
                <label for="assignTo" class="Assign_Form_Group_Label">Assign To</label>
                <select id="assignTo" name="assignTo" class="Assign_Form_Group_Full_Width">
                    <option value="Suresh1">Person 1</option>
                    <option value="Suresh2">Person 2</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="Assign_Submit_Btn_Wrapper">
                <button type="submit" class="Assign_Button Assign_Button_Hover">Assign Ticket</button>
            </div>
        </form>
    </div>

    
</body>
<script src="JS/AssignTicket.js"></script>
<script src="JS/Dashboard.js"></script>
</html>