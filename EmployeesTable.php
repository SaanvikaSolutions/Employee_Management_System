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
include('./backend/includes/dbconnect.php')
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
                    <?php
                    //Fetch Employees Details From Database
                    $get_emp_details = "SELECT * FROM `employees`";
                    $get_emp_res = mysqli_query($conn,$get_emp_details);
                    //Check if the query execution is success or not
                    if($get_emp_res){
                        while($row = mysqli_fetch_assoc($get_emp_res)){
                            $id = $row['id'];
                            $emp_id  = $row['employee_id'];
                            $Name = $row['name'];
                            $Gender = $row['gender'];
                            $DOB = $row['dob'];
                            $phone_Number = $row['phone'];
                            $Alt_phoneNo = $row['alt_phone'];
                            $Email = $row['email'];
                            $Hired_date = $row['hired_date'];
                            $Role_type = $row['role_type'];
                            $Employee_type = $row['employee_type'];
                            $Assigned_to = $row['assigned_to'];
                            $Department = $row['department'];
                            $Address = $row['address'];
                            $City = $row['city'];
                            $Postcode = $row['postcode'];
                            $State = $row['state'];
                            $Country = $row['country'];
                            // Fetch the name of the assigned superior
                            $superior_name = "Not Assigned";
                            if (!empty($Assigned_to)) {
                                $get_superior_name = "SELECT name FROM `employees` WHERE employee_id = '$Assigned_to'";
                                $superior_res = mysqli_query($conn, $get_superior_name);
                                if ($superior_res && mysqli_num_rows($superior_res) > 0) {
                                    $superior_row = mysqli_fetch_assoc($superior_res);
                                    $superior_name = $superior_row['name'];
                                }
                            }

                            echo '<tr>
                                <td>' . htmlspecialchars($id) . '</td>
                                <td>' . htmlspecialchars($emp_id) . '</td>
                                <td>' . htmlspecialchars($Name) . '</td>
                                <td>' . htmlspecialchars($Employee_type) . '</td>
                                <td>' . htmlspecialchars($Assigned_to) .  ' [  ' .htmlspecialchars($superior_name) . ' ] ' . '</td>
                                <td><a href="View-Employee.php ?id= ' . htmlspecialchars($id) . '"><button class="EmployeeTable-view-button">View</button></a></td>
                            </tr>';
                        }
                    }else {
                            // Display an error message if the query failed
                            echo '<tr><td colspan="8">Error fetching data from the database.</td></tr>';
                        }
                        ?>
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    <script src="JS/EmployeesTable.js"></script>
    <script src="JS/Dashboard.js"></script>
</body>
</html>



