<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/Viewleads.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">

</head>
<body>

    <?php
include('./Dashboard.php');
?>

    <div class="EMSS-container">
        <h2 class="EMSS-heading">Upcoming Activity</h2>
        <div class="EMSS-task-card">
            <div class="EMSS-task-header" onclick="toggleTask(this)">
                <h3>
                    <i class="fas fa-angle-right EMSS-icon-right"></i>
                    <i class="fas fa-caret-down EMSS-icon-down"></i>
                    <p> Created by <span>Suraj Yadav</span></p>
                </h3>
                <span class="EMSS-due-date">Due: Today 12:00 AM</span>
            </div>
            <div class="EMSS-task-body">
                <p>Prepare quote for Venkatesh. He is interested in our new product. Just address our product prices. He will buy at least one product in our company, make sure to contact and discuss.</p>
                <div class="EMSS-task-options">
                    <select>
                        <option>Lead Ty</option>
                        <option>1 Day Before</option>
                        <option>2 Days Before</option>
                    </select>
                    <select>
                        <option>High</option>
                        <option>Medium</option>
                        <option>Low</option>
                    </select>
                    <select>
                        <option>K Mukesh (Sales Man)</option>
                        <option>John Doe (Manager)</option>
                        <option>Jane Smith (Executive)</option>
                    </select>
                </div>
                <div class="EMSS-buttons">
                    <button class="EMSS-cancel-btn">View</button>
                    <button class="EMSS-assign-btn">Assign</button>
                </div>
            </div>
        </div>

        <div class="EMSS-activity-history">
            <h2 class="EMSS-heading">Activity History</h2>
            <div class="EMSS-task-card">
                <div class="EMSS-task-header" onclick="toggleTask(this)">
                    <h3>
                        <i class="EMSS-check-icon fa-solid fa-circle-check"></i>
                        <p>Created by <span>Venkatesh</span></p>
                    </h3>
                    <span class="EMSS-AssignedTo">
                        Assigned to: <span class="EMSS-assigned-name">Suresh</span>
                    </span>
                    <span class="EMSS-due-date">Due: Today 12:00 AM</span>
                </div>
                <div class="EMSS-task-body EMSS-expandable">
                    <p>Prepare quote for Suresh: He is interested in our new product. Just address our product prices. He will buy at least one product in our company, make sure to contact and discuss.</p>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="JS/Viewleads.js"></script>
<script src="JS/Dashboard.js"></script>

</html>
