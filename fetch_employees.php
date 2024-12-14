<?php
include('./backend/includes/dbconnect.php');

if (isset($_POST['department']) && !empty($_POST['department'])) {
    $department = trim($_POST['department']); // Remove unnecessary spaces
    $fetch_employees = "SELECT employee_id, name, employee_type FROM employees WHERE department = ?";
    $stmt = $conn->prepare($fetch_employees);

    if ($stmt) {
        $stmt->bind_param("s", $department);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<option value=''>Select Employee</option>";
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . htmlspecialchars($row['employee_id']) . "'>" 
                     . htmlspecialchars($row['name']) . " (" . htmlspecialchars($row['employee_type']) . ")</option>";
            }
        } else {
            echo "<option value=''>No Employees Found</option>";
        }
    } else {
        error_log("SQL Error: " . $conn->error); // Debug SQL issues
        echo "<option value=''>SQL Error Occurred</option>";
    }
} else {
    echo "<option value=''>No Department Selected</option>";
}
?>
