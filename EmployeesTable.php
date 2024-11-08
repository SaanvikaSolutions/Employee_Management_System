<?php
include('./backend/includes/dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees Table</title>
    <link rel="stylesheet" href="CSS/EmployeesTable.css">
</head>
<body>
    <div class="EmployeeTable-container">
        <h1 class="EmployeeTable-title">View Employees</h1>
        <input type="text" id="searchBar" class="EmployeeTable-search-bar" placeholder="Search by ID, Name, or Role">
        
        <div class="EmployeeTable-table-container">
            <table class="EmployeeTable-employees-table">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Assigned To</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="employeeData">
                    <?php
                    // Query to fetch employees and their assigned manager/superior's name
                    $get_query = "
                        SELECT e1.employee_id, e1.name AS emp_name, e1.employee_type, e1.assigned_to, e2.name AS assigned_to_name
                        FROM employees e1
                        LEFT JOIN employees e2 ON e1.assigned_to = e2.employee_id
                    ";
                    $result = mysqli_query($conn, $get_query);
                    $sno = 1;  // Initialize serial number
                    
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $emp_id = $row['employee_id'];
                            $Name = $row['emp_name'];  
                            $Role = $row['employee_type'];  
                            $Assigned_to = $row['assigned_to'];
                            $Assigned_to_name = $row['assigned_to_name'];  // Get the name of the assigned employee

                            echo '<tr>
                                <td>' . $sno++ . '</td>
                                <td>' . $emp_id . '</td>
                                <td>' . $Name . '</td>
                                <td>' . $Role . '</td>
                                <td>' . ($Assigned_to_name ? $Assigned_to_name : 'None') . ' (ID: ' . $Assigned_to . ')</td>
                                <td>
                                    <button class="EmployeeTable-view-button" onclick="window.location.href=\'View-Employee.php?employee_id=' . $emp_id . '\'">View</button>
                                </td>
                            </tr>';
                        }
                    } else {
                        echo "<tr><td colspan='6'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="JS/EmployeesTable.js"></script>
</body>
</html>
