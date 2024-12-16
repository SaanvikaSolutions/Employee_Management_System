<?php
// Include the database connection file
include ('./backend/includes/dbconnect.php');

// Check if 'employeeType' is set in the request (for AJAX)
if (isset($_GET['employeeType'])) {
    // Get the employeeType from the AJAX request
    $employeeType = $_GET['employeeType'];

    // Initialize a variable to hold the options
    $options = '';

    // Prepare appropriate employee options based on employeeType
    $stmt = null;
    switch ($employeeType) {
        case 'ManagingDirector':
            $stmt = $conn->prepare("SELECT employee_id , name FROM employees WHERE employee_type = ?");
            $stmt->bind_param("s", $employeeType);
            break;
        case 'director':
            $employeeType = 'ManagingDirector';
            $stmt = $conn->prepare("SELECT employee_id , name FROM employees WHERE employee_type = ?");
            $stmt->bind_param("s", $employeeType);
            break;
        case 'manager':
            $employeeType = 'Director';
            $stmt = $conn->prepare("SELECT employee_id , name FROM employees WHERE employee_type = ?");
            $stmt->bind_param("s", $employeeType);
            break;
        case 'employee':
            $employeeType = 'Manager'; // Employees are assigned to managers
            $stmt = $conn->prepare("SELECT employee_id , name FROM employees WHERE employee_type = ?");
            $stmt->bind_param("s", $employeeType);
            break;
        default:
            echo '<option value="">Invalid employee type</option>';
            exit;
    }

    // Execute the query and fetch results
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $options .= '<option value="'.$row['employee_id'].'">'.$row['name'].'</option>';
        }
        echo $options;
    } else {
        echo '<option value="">Error retrieving options</option>';
    }
    $stmt->close();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Employee Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/CreateEmployee.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>
<body>

<?php 
include('./Dashboard.php');
?>


<form class="createEmployee-employee-profile-form" action ="" method = "POST" >
    <h2>Create Employee Profile</h2>

    <div class="createEmployee-form-section">
        <label for="employeeId">Employee ID<span>*</span></label>
        <input type="text" id="employeeId" name="emp_id" class="createEmployee-form-input" required>
    </div>

    <div class="createEmployee-form-section">
        <label for="fullName">Full Name<span>*</span></label>
        <input type="text" id="fullName" name="name" class="createEmployee-form-input" required>
    </div>

    <div class="createEmployee-flex">
        <div class="createEmployee-form-section">
            <label for="gender">Gender<span>*</span></label>
            <select id="gender" class="createEmployee-form-select" name="gender" required>
                <option value="">Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="non-binary">Non-Binary</option>
            </select>
        </div>

        <div class="createEmployee-form-section">
            <label for="dob">Date of Birth<span>*</span></label>
            <input type="date" id="dob" class="createEmployee-form-input" name="dob" required>
        </div>
    </div>

    <div class="createEmployee-flex">
        <div class="createEmployee-form-section">
            <label for="phone">Phone Number<span>*</span></label>
            <input type="tel" id="phone" class="createEmployee-form-input" name="phno" required>
        </div>

        <div class="createEmployee-form-section">
            <label for="emergencyContact">Second Number<span></span></label>
            <input type="tel" id="emergencyContact" class="createEmployee-form-input" name="altphno" >
        </div>
    </div>

    <div class="createEmployee-form-section">
        <label for="email">Email<span>*</span></label>
        <input type="email" id="email" class="createEmployee-form-input" name="email" required>
    </div>

    <div class="createEmployee-flex">
        <div class="createEmployee-form-section">
            <label for="dateOfHire">Date of Hire<span>*</span></label>
            <input type="date" id="dateOfHire" class="createEmployee-form-input" name="hiredate" required>
        </div>

        <div class="createEmployee-form-section">
            <label for="employmentType">Role Type<span>*</span></label>
            <select id="employmentType" class="createEmployee-form-select" name="roletype" required>
                <option value="">Select</option>
                <option value="full-time">Full-Time</option>
                <option value="part-time">Part-Time</option>
                <option value="contract">Contract</option>
                <option value="intern">Intern</option>
            </select>
        </div>
    </div>

    <div class="createEmployee-form-section">
        <label for="employeeType">Employee Type<span>*</span></label>
        <select id="employeeType" class="createEmployee-form-select" name="emptype" required onchange="showAssignedSection()">
            <option value="">Select</option>
            <option value="ManagingDirector">Managing Director</option>
            <option value="director">Director</option>
            <option value="manager">Manager</option>
            <option value="employee">Employee</option>
        </select>
    </div>
    
     <!-- Assigned To Section (Dropdown will be dynamically populated) -->
     <div id="assignedSection" class="createEmployee-form-section hidden">
        <label for="assignedTo">Assigned To:</label>
        <select id="assignedTo" class="createEmployee-form-select" name="assignedto">
            <option value="">Select Assigned To</option>
        </select>
    </div>

    <div id="departmentSection" class="createEmployee-form-section hidden">
        <label for="department">Department<span>*</span></label>
        <select id="department" class="createEmployee-form-select" name="department" >
            <option value="">Select</option>
            <option value="sales">Sales Manager</option>
            <option value="operations">Operation Manager</option>
            <option value="finance">Financial Manager</option>
            <option value="hr">HR</option>
            <option value="rnd">R&D</option>
        </select>
    </div>

    <div id="employeeDepartmentSection" class="createEmployee-form-section hidden">
        <label for="employeeDepartment">Department<span>*</span></label>
        <select id="employeeDepartment" class="createEmployee-form-select" name="department" >
            <option value="">Select</option>
            <option value="sales">Sales</option>
            <option value="operations">Operations</option>
            <option value="rnd">R&D</option>
        </select>
    </div>

    <div class="createEmployee-form-section">
        <label for="address">Permanent Address<span>*</span></label>
        <input type="text" id="address" class="createEmployee-form-input" name="address" required>
    </div>

    <div class="createEmployee-flex">
        <div class="createEmployee-form-section">
            <label for="postcode">Postcode<span>*</span></label>
            <input type="text" id="postcode" class="createEmployee-form-input" name="pincode" required>
        </div>

        <div class="createEmployee-form-section">
            <label for="city">City<span>*</span></label>
            <input type="text" id="city" class="createEmployee-form-input" name="city" required>
        </div>
    </div>

    <div class="createEmployee-flex">
        <div class="createEmployee-form-section">
            <label for="state">State<span>*</span></label>
            <input type="text" id="state" class="createEmployee-form-input" name="state" required>
        </div>

        <div class="createEmployee-form-section">
            <label for="country">Country<span>*</span></label>
            <select id="country" class="createEmployee-form-select" name="country" required>
                <option value="">Select</option>
                <!-- Countries will be populated here -->
            </select>
        </div>
    </div>
    <!-- Password Fields in Form -->
    <div class="createEmployee-flex">
        <div class="createEmployee-form-section">
            <label for="pwd">Password<span>*</span></label>
            <input type="password" id="pwd" class="createEmployee-form-input" name="password" required>
        </div>

        <div class="createEmployee-form-section">
            <label for="conf_pwd">Confirm Password<span>*</span></label>
            <input type="password" id="conf_pwd" class="createEmployee-form-input" name="confirm_password" required>
        </div>
    </div>

    <button type="submit" class="createEmployee-form-button" name="submit">Create Profile</button>
</form>
<?php
// Handle form submission
if (isset($_POST['submit'])) {
    // Sanitize and retrieve form inputs
    $emp_id = trim($_POST['emp_id']);
    $name = trim($_POST['name']);
    $gender = trim($_POST['gender']);
    $dob = trim($_POST['dob']);
    $phno = trim($_POST['phno']);
    $altphno = trim($_POST['altphno']);
    $email = trim($_POST['email']);
    $hiredate = trim($_POST['hiredate']);
    $roletype = trim($_POST['roletype']);
    $emptype = trim($_POST['emptype']);
    $assignedto = trim($_POST['assignedto']);
    $department = trim($_POST['department']);
    $address = trim($_POST['address']);
    $city = trim($_POST['city']);
    $postcode = trim($_POST['pincode']);
    $state = trim($_POST['state']);
    $country = trim($_POST['country']);
    $password = trim($_POST['password']);
    $conf_password = trim($_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $conf_password) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
        exit;
    }
    // Check for duplicate employee ID
    $stmt_check = $conn->prepare("SELECT employee_id FROM employees WHERE employee_id = ?");
    $stmt_check->bind_param("s", $emp_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    if ($result_check->num_rows > 0) {
        echo "<script>alert('Employee ID already exists. Please use a unique ID.');</script>";
        exit;
    }
    $stmt_check->close();
    // Check for duplicate employee ID
    $stmt_check = $conn->prepare("SELECT employee_id FROM employees WHERE employee_id = ?");
    $stmt_check->bind_param("s", $emp_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();
    if ($result_check->num_rows > 0) {
        echo "<script>alert('Employee ID already exists. Please use a unique ID.');</script>";
        exit;
    }
    $stmt_check->close();

    // Prepared statement for inserting into the database
    $stmt = $conn->prepare("INSERT INTO `employees`(`employee_id`, `name`, `gender`, `dob`, `phone`, `alt_phone`, `email`, `hired_date`, `role_type`, `employee_type`, `assigned_to`, `department`, `address`, `city`, `postcode`, `state`, `country`,`password`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssssss", $emp_id, $name, $gender, $dob, $phno, $altphno, $email, $hiredate, $roletype, $emptype, $assignedto, $department, $address, $city, $postcode, $state, $country,$password);

    if ($stmt->execute()) {
        echo "<script>alert('Employee profile created successfully!');</script>";
    } else {
        echo "<script>alert('Error: Could not save employee profile.');</script>";
    }
    $stmt->close();
}
?>
<script src="JS/CreateEmployee.js"></script>
<script src="JS/Dashboard.js"></script>
</body>
</html>
