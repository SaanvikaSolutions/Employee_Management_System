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
        <form id="assignTicketForm" Action="insertAssignedTicket.php" method="POST">
            <!-- Ticket ID, Client Name -->
            <div class="Assign_Form_Group">
                <div>
                    <label for="ticketId" class="Assign_Form_Group_Label">Ticket ID</label>
                    <input type="text" id="ticketId"  value="<?php echo htmlspecialchars($ticket['ticket_id']); ?>" name="ticketId"  required class="Assign_Form_Group_Input">
                    
                </div>
                <div>
                    <label for="clientName" class="Assign_Form_Group_Label">Client Name</label>
                    <input type="text" id="clientName" name="clientName" value="<?php echo htmlspecialchars($ticket['client_name']); ?>" required class="Assign_Form_Group_Input">
                </div>
            </div>

            <!-- Title, Project Type -->
            <div class="Assign_Form_Group">
                <div>
                    <label for="title" class="Assign_Form_Group_Label">Issue</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($ticket['Issue']); ?>" required class="Assign_Form_Group_Input">
                </div>
                <div>
                    <label for="projectType" class="Assign_Form_Group_Label">Project Type</label>
                    <input type="text" id="projectType" name="projectType" value="<?php echo htmlspecialchars($ticket['project_type']); ?>" required class="Assign_Form_Group_Input">
                </div>
            </div>

            <!-- Project Name, Priority Level -->
            <div class="Assign_Form_Group">
                <div>
                    <label for="projectName" class="Assign_Form_Group_Label">Project Name</label>
                    <input type="text" id="projectName" name="projectName" value="<?php echo htmlspecialchars($ticket['project_name']); ?>" required class="Assign_Form_Group_Input">
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
                    <?php
                    $fetch_department = " SELECT DISTINCT department FROM `employees`";
                    $fetch_dept_res = mysqli_query($conn,$fetch_department);
                    ?>
                    <label for="department" class="Assign_Form_Group_Label">Department</label>
                    <select id="department" name="department" required class="Assign_Form_Group_Select">
                        <option value="Suresh" selected>Select Department</option>
                        <!-- <option value="Suresh" >Suresh</option>
                        <option value="Venkatesh">Venkatesh</option>
                        <option value="Upendra">Upendra</option> -->
                        <?php
                        if($fetch_dept_res->num_rows > 0){
                            while ($row = $fetch_dept_res ->fetch_assoc()){
                            echo "<option value=' " .$row['department'] ." '>" . htmlspecialchars($row['department']) . "</option>";
                            }
                        }else{
                            echo "<option valuie=''>No Departments Found</option>";
                        }
              
                        ?>
                    </select>
                </div>
            </div>

            <!-- Assign To Dropdown (Hidden Initially) -->
            <div class="Assign_To_Wrapper" id="assignToWrapper" style="display: none;">
                <label for="assignTo" class="Assign_Form_Group_Label">Assign To</label>
                <select id="assignTo" name="assignTo" class="Assign_Form_Group_Full_Width">
                    <option value="">Select Employee</option>
                </select>
            </div>

            

            <!-- Submit Button -->
            <div class="Assign_Submit_Btn_Wrapper">
                <button type="submit" class="Assign_Button Assign_Button_Hover" name="Assign_Ticket">Assign Ticket</button>
            </div>
        </form>
        

    </div>

    
</body>
<script src="JS/AssignTicket.js"></script>
<script src="JS/Dashboard.js"></script>
</html>