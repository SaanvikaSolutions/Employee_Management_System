<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Employee</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/View-Employee.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>

<body>
    <?php
    include('./Dashboard.php');
    include('./backend/includes/dbconnect.php');

    if (isset($_GET['id'])) {
        // Retrieve the employee ID and sanitize it
        $employee_id = intval($_GET['id']); // Convert to an integer to ensure safety
    } else {
        die("Invalid employee ID."); // If no ID is provided, show an error message
    }

    // Fetch the employee details from the database
    $sql = "SELECT * FROM employees WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $employee_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    } else {
        die("Employee not found."); // If no employee is found, show an error message
    }
    ?>

    <div class="page-wrapper">
        <div class="View-Employee-container">
            <div class="View-Employee-employee-header">
                <i class="fa-regular fa-user"></i>
                <div class="name"><?php echo htmlspecialchars($employee['name']); ?></div>
                <div class="View-Employee-Designation-name"><?php echo htmlspecialchars($employee['employee_type']); ?></div>
            </div>

            <div class="View-Employee-employee-details">
                <div class="View-Employee-detail">
                    <label for="employeeId">Employee ID</label>
                    <input type="text" id="employeeId" value="<?php echo htmlspecialchars($employee['employee_id']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="department">Department</label>
                    <input type="text" id="department" value="<?php echo htmlspecialchars($employee['department']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="<?php echo htmlspecialchars($employee['email']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="mobile">Mobile</label>
                    <input type="tel" id="mobile" value="<?php echo htmlspecialchars($employee['phone']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="employeeType">Employee Type</label>
                    <input type="text" id="employeeType" value="<?php echo htmlspecialchars($employee['role_type']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="status">Employee Status</label>
                    <input type="text" id="status" value="Active" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="onBoarding">On Boarding</label>
                    <input type="text" id="onBoarding" value="<?php echo htmlspecialchars($employee['hired_date']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="gender">Gender</label>
                    <input type="text" id="gender" value="<?php echo htmlspecialchars($employee['gender']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="dob">Date of Birth</label>
                    <input type="text" id="dob" value="<?php echo htmlspecialchars($employee['dob']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="emergencyContact">Second Number</label>
                    <input type="tel" id="emergencyContact" value="<?php echo htmlspecialchars($employee['alt_phone']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="state">State</label>
                    <input type="text" id="state" value="<?php echo htmlspecialchars($employee['state']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="country">Nationality</label>
                    <input type="text" id="country" value="<?php echo htmlspecialchars($employee['country']); ?>" disabled>
                </div>
                <div class="View-Employee-detail">
                    <label for="address">Permanent Address</label>
                    <input type="text" id="address" value="<?php echo htmlspecialchars($employee['address']); ?>" disabled class="full-width">
                </div>
            </div>
            <div class="View-Employee-buttons">
                <!-- Delete Button: Wrapped in a form to submit a delete request -->
                <form method="POST" action="">
                    <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">
                    <button type="submit" name="delete" class="View-Employee-cancel-btn">Delete</button>
                </form>
                <?php 
                // Check if the delete button was clicked
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
                    $employee_id_to_delete = intval($_POST['employee_id']); // Sanitize the employee ID

                    // Prepare the SQL statement to delete the employee
                    $sql_delete = "DELETE FROM employees WHERE id = ?";
                    $stmt_delete = $conn->prepare($sql_delete);
                    $stmt_delete->bind_param("i", $employee_id_to_delete);

                    if ($stmt_delete->execute()) {
                        // If the deletion is successful, redirect to the employee list page
                        echo "<script>
                            alert('Deletion successful!');
                            window.location.href = 'EmployeesTable.php';
                        </script>";
                        
                    } else {
                        echo "Error deleting employee: " . $conn->error;
                    }

                    // Close the statement
                    $stmt_delete->close();
                }

                // Close the database connection
                $conn->close();
                ?>
                
                <button class="View-Employee-edit-btn" onclick="window.location.href='EmployeesTable.php';">Close</button>
            </div>
        </div>
        
    </div>
    

</body>
<script src="JS/Dashboard.js"></script>
</html>
