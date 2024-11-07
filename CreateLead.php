<?php
include_once('./Dashboard.php');
include('./backend/includes/dbconnect.php')
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Lead Form</title>
    <link rel="stylesheet" href="CSS/CreateLead.css">
</head>

<body> -->

    <form class="Create-Lead-lead-form" Action="" method="POST">
        <h2>Create Lead</h2>

        <div class="Create-Lead-form-Dropdown">
            <div class="Create-Lead-form-section">
                <label for="employeeId">Emp ID<span>*</span></label>
                <input type="text" id="employeeId" name="emp_id"  class="Create-Lead-form-input" required>
            </div>

            <div class="Create-Lead-form-section">
                <label for="leadName">Lead's Name<span>*</span></label>
                <input type="text" id="leadName" name="lead_name" class="Create-Lead-form-input" required>
            </div>
        </div>

        <div class="Create-Lead-form-Dropdown">
            <div class="Create-Lead-form-section">
                <label for="mobileNumber">Mobile<span>*</span></label>
                <input type="tel" id="mobileNumber" name="lead_ph_no" class="Create-Lead-form-input" required>
            </div>

            <div class="Create-Lead-form-section">
                <label for="email">Email<span>*</span></label>
                <input type="email" id="email" name="lead_email" class="Create-Lead-form-input" required>
            </div>
        </div>

        <div class="Create-Lead-form-Dropdown">
            <div class="Create-Lead-form-section">
                <label for="dateOfLead">Created On<span>*</span></label>
                <input type="date" id="dateOfLead" name="lead_created_on" class="Create-Lead-form-input" required>
            </div>

            <div class="Create-Lead-form-section">
                <label for="leadType">Lead Type<span>*</span></label>
                <select id="leadType" class="Create-Lead-form-select" name="lead_type" required>
                    <option value="">Select</option>
                    <option value="interior">Interior</option>
                    <option value="homes">Homes</option>
                </select>
            </div>
        </div>

        <div class="Create-Lead-form-Dropdown">
            <div class="Create-Lead-form-section">
                <label for="state">State<span>*</span></label>
                <select id="state" class="Create-Lead-form-select" name="state" required onchange="populateCities()">
                    <option value="">Select</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="West Bengal">West Bengal</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Assam">Assam</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Puducherry">Puducherry</option>
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                    <option value="Daman and Diu">Daman and Diu</option>
                </select>
            </div>

            <div class="Create-Lead-form-section">
                <label for="city">City<span>*</span></label>
                <select id="city" class="Create-Lead-form-select" name="city" required>
                    <option value="">Select</option>
                    <!-- Options will be populated based on selected state -->
                </select>
            </div>
        </div>

        <div class="Create-Lead-form-Dropdown">
            <div class="Create-Lead-form-section">
                <label for="pincode">Pincode<span>*</span></label>
                <input type="text" id="pincode" name="pincode" class="Create-Lead-form-input" required>
            </div>

            <div class="Create-Lead-form-section">
                <label for="projectType">Project Type<span>*</span></label>
                <select id="projectType" class="Create-Lead-form-select" name="lead_project_type" required>
                    <option value="">Select</option>
                    <option value="residential">Villa</option>
                    <option value="commercial">Apartment</option>
                    <option value="commercial">Individual</option>
                </select>
            </div>
        </div>

        <div class="Create-Lead-form-Dropdown">
            <div class="Create-Lead-form-section">
                <label for="status">Status<span>*</span></label>
                <select id="status" class="Create-Lead-form-select" name="lead_status" required>
                    <option value="">Select</option>
                    <option value="new">New</option>
                    <option value="contacted">Contacted</option>
                    <option value="interested">Interested</option>
                    <option value="not_interested">Not Interested</option>
                    <option value="closed">Closed</option>
                </select>
            </div>

            <div class="Create-Lead-form-section">
                <label for="meetingDate">Meeting Date<span>*</span></label>
                <input type="date" id="meetingDate" class="Create-Lead-form-input" name="meeting_date" required>
            </div>
        </div>
        <div class="Create-Lead-form-section"></div>
        <label for="address">Address<span></span></label>
        <textarea id="address" class="Create-Lead-form-input" name="address" rows="4"></textarea>
        </div>

        <button type="submit" class="Create-Lead-form-button" name="create_lead">Create Lead</button>
    </form>
    <?php
    if(isset($_POST['create_lead'])){
        $Emp_id = $_POST['emp_id'];
        $Lead_name = $_POST['lead_name'];
        $Lead_phno = $_POST['lead_ph_no'];
        $Lead_email = $_POST['lead_email'];
        $Lead_created = $_POST['lead_created_on'];
        $Lead_type = $_POST['lead_type'];
        $State = $_POST['state'];
        $City = $_POST['city'];
        $Pincode = $_POST['pincode'];
        $Lead_project_type = $_POST['lead_project_type'];
        $Lead_Status = $_POST['lead_status'];
        $Meeting_date = $_POST['meeting_date'];
        $Address = $_POST['address'];

        $query="INSERT INTO `leads`(`emp_id`, `Lead_Name`, `Lead_ph.no`, `Lead_email`, `Lead_createdOn`, `Lead_Type`, `State`, `City`, `Pincode`, `Lead_project_type`, `Lead_Status`, `Meeting_Date`, `Address`) VALUES ('$Emp_id','$Lead_name','$Lead_phno','$Lead_email','$Lead_created','$Lead_type','$State',' $City','$Pincode','$Lead_project_type','$Lead_Status','$Meeting_date','$Address')";

        $sql = mysqli_query($conn,$query);
        if($sql){
            // echo "Lead Created Successfully";
            echo "<script>alert('Lead Created Successfully!');</script>";
        }else{
            echo "Not Success";
        }
    }
    ?>
    <script src="JS/CreateLead.js"></script>
</body>

</html>