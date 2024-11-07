
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employees Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/EmployeesTable.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>
<body>

<?php
include('./Dashboard.php');
?>
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
                        <th>View</th>
                    </tr>
                </thead>
                <tbody id="employeeData">
                    <tr>
                        <td>1</td>
                        <td>E001</td>
                        <td>Suresh</td>
                        <td>Developer</td>
                        <td>CEO</td>
                        <td>
                            <button class="EmployeeTable-view-button" onclick="window.location.href='View-Employee.html'">View</button>
                        </td>
                    </tr>
                    
                    
                    <tr>
                        <td>2</td>
                        <td>E002</td>
                        <td>Venkatesh</td>
                        <td>Designer</td>
                        <td>CEO</td>
                        <td> <button class="EmployeeTable-view-button" onclick="window.location.href='View-Employee.html'">View</button></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="JS/EmployeesTable.js"></script>
    <script src="JS/Dashboard.js"></script>
</body>
</html>
