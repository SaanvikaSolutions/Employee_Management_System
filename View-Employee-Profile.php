<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Emp Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/View-Employee-Profile.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">

</head>

<body>
    <?php
    include('./Dashboard.php');
    include('./backend/includes/dbconnect.php');
    ?>


    <div class="viewDetailsProfile-wrapper">
        <div class="viewDetailsProfile-container">
            <div class="viewDetailsProfile-employee-header">
                <i class="fa-regular fa-user"></i>
                <div class="name">Suresh Kumar</div>
                <div class="viewDetailsProfile-Designation-name">Manager</div>
            </div>

            <div class="viewDetailsProfile-employee-details">
                <div class="viewDetailsProfile-detail">
                    <label for="employeeId">Employee ID</label>
                    <input type="text" id="employeeId" value="1234" disabled>
                </div>
                <div class="viewDetailsProfile-detail">
                    <label for="department">Department</label>
                    <input type="text" id="department" value="Sales" disabled>
                </div>
                <div class="viewDetailsProfile-detail">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="johndoe@example.com" disabled>
                </div>
                <div class="viewDetailsProfile-detail">
                    <label for="mobile">Mobile</label>
                    <input type="tel" id="mobile" value="1234567890" disabled>
                </div>
                <div class="viewDetailsProfile-detail">
                    <label for="employeeType">Employee Type</label>
                    <input type="text" id="employeeType" value="Full-Time" disabled>
                </div>
                <div class="viewDetailsProfile-detail">
                    <label for="status">Employee Status</label>
                    <input type="text" id="status" value="Active" disabled>
                </div>
                <div class="viewDetailsProfile-detail">
                    <label for="onBoarding">Date of Joining</label>
                    <input type="text" id="onBoarding" value="2021-05-01" disabled>
                </div>
                <div class="viewDetailsProfile-detail">
                    <label for="gender">Gender</label>
                    <input type="text" id="gender" value="Male" disabled>
                </div>
                <div class="viewDetailsProfile-detail">
                    <label for="dob">Date of Birth</label>
                    <input type="text" id="dob" value="1990-04-15" disabled>
                </div>
                <div class="viewDetailsProfile-detail">
                    <label for="emergencyContact">Second Number</label>
                    <input type="tel" id="emergencyContact" value="9876543210" disabled>
                </div>
                <div class="viewDetailsProfile-detail">
                    <label for="state">State</label>
                    <input type="text" id="state" value="Telangana" disabled>
                </div>

                <div class="viewDetailsProfile-detail">
                    <label for="country">Nationality</label>
                    <input type="text" id="country" value="Indian" disabled>
                </div>

                <div class="viewDetailsProfile-detail">
                    <label for="country">Password</label>
                    <input type="text" id="country" value="923.@A09" disabled>
                </div>

                <div class="viewDetailsProfile-detail">
                    <label for="address">Permanent Address</label>
                    <input type="text" id="address" value="Sri Rama colonuy, house no 121, Madhapur" disabled class="full-width">
                </div>
                
            </div>
            <div class="viewDetailsProfile-buttons">
                <button class="viewDetailsProfile-edit-btn" onclick="window.location.href='CreateEmployee.php';">Close</button>
            </div>
        </div>
    </div>
</body>
<script src="JS/Dashboard.js"></script>
</html>