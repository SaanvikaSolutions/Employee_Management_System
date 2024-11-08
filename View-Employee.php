<?php
include('./backend/includes/dbconnect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/View-Employee.css">
</head>
<body>
<?php
    // Check if employee_id is passed via URL
    if (isset($_GET['employee_id'])) {
        $employee_id = $_GET['employee_id'];
        
        // Fetch employee details by employee_id
        $get_query = "SELECT * FROM `employees` WHERE `employee_id` = ?";
        $stmt = $conn->prepare($get_query);
        $stmt->bind_param("s", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $emp_id = $row['employee_id'];
            $Name = $row['name'];
            $Role = $row['employee_type'];
            $Gender = $row['gender'];
            $Dob = $row['dob'];
            $Phone = $row['phone'];
            $Email = $row['email'];
            $HiredDate = $row['hired_date'];
            $EmployeeType = $row['role_type'];
            $Department = $row['department'];
            $Address = $row['address'];
            $City = $row['city'];
            $Postcode = $row['postcode'];
            $State = $row['state'];
            $Country = $row['country'];
            $AssignedTo = $row['assigned_to'];
            
            // Fetch the name of the person the employee is assigned to
            $assigned_to_query = "SELECT `name` FROM `employees` WHERE `employee_id` = ?";
            $stmt_assigned = $conn->prepare($assigned_to_query);
            $stmt_assigned->bind_param("s", $AssignedTo);
            $stmt_assigned->execute();
            $assigned_to_result = $stmt_assigned->get_result();
            $AssignedToName = ($assigned_to_result && $assigned_to_result->num_rows > 0) ? $assigned_to_result->fetch_assoc()['name'] : 'None';
        } else {
            echo "Employee not found!";
            exit;
        }
    } else {
        echo "No employee ID provided!";
        exit;
    }
    ?>
   
    <div class="View-Employee-container">
        <div class="View-Employee-employee-header">
            <i class="fa-regular fa-user"></i>
            <div class="name"><?php echo $Name ?></div>
            <div class="View-Employee-Designation-name"><?php echo  '(' . $Role . ')'?></div>
        </div>

        <div class="View-Employee-employee-details">
            <div class="View-Employee-detail">
                <label for="employeeId">Employee ID</label>
                <input type="text" id="employeeId" value="<?php echo $emp_id ?>" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="department">Department</label>
                <input type="text" id="department" value="<?php echo $Department ?>" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="email">Email</label>
                <input type="email" id="email" value="<?php echo $Email ?>" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="mobile">Mobile</label>
                <input type="tel" id="mobile" value="<?php echo '+91 ' . $Phone ?>" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="employeeType">Employee Type</label>
                <input type="text" id="employeeType" value="<?php echo $EmployeeType ?>" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="status">Employee Status</label>
                <input type="text" id="status" value="Active" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="onBoarding">On Boarding</label>
                <input type="text" id="onBoarding" value="<?php echo $HiredDate ?>" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="gender">Gender</label>
                <input type="text" id="gender" value="<?php echo $Gender ?>" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="dob">Date of Birth</label>
                <input type="text" id="dob" value="<?php echo $Dob ?>" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="emergencyContact">Second Number</label>
                <input type="tel" id="emergencyContact" value="(+91) 89898998989" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="state">State</label>
                <input type="text" id="state" value="Andhra Pradesh" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="country">Nationality</label>
                <input type="text" id="country" value="Indian" disabled>
            </div>
            <div class="View-Employee-detail">
                <label for="address">Permanent Address</label>
                <input type="text" id="address" value="Sri Rama colony, Madhapur,500011, guttala begham pet Telangana" disabled class="full-width">
            </div>
        </div>

        <div class="View-Employee-buttons">
            <button class="View-Employee-cancel-btn">Delete</button>
            <button class="View-Employee-edit-btn">close</button>
        </div>
    </div>

</body>
</html>
