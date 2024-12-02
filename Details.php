<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/Details.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
 
</head>
<body>

    <?php
include('./Dashboard.php');
?>
    <div class="EMS-form-container">
    <h2 class="form-heading">Fill Customer Details</h2>
        <form>
            <div class="EMS-form-row">
                
                <div class="EMS-form-group">
                    <label for="company-name" class="EMS-form-label">Company Name</label>
                    <input type="text" id="company-name" class="EMS-form-input" placeholder="Enter Your company name">
                </div>
                <div class="EMS-form-group">
                    <label for="client-name" class="EMS-form-label">Client Name</label>
                    <input type="text" id="client-name" class="EMS-form-input" placeholder="Enter Your name">
                </div>
            </div>
            <div class="EMS-form-row">
                <div class="EMS-form-group">
                    <label for="email" class="EMS-form-label">Email</label>
                    <input type="email" id="email" class="EMS-form-input" placeholder="Enter Your email">
                </div>
                <div class="EMS-form-group">
                    <label for="contact-number" class="EMS-form-label">Contact No</label>
                    <input type="text" id="contact-number" class="EMS-form-input" placeholder="Enter Your number">
                </div>
            </div>
            <div class="EMS-form-row">
                <div class="EMS-form-group EMS-full-width">
                    <label for="address" class="EMS-form-label">Address</label>
                    <input type="text" id="address" class="EMS-form-input" placeholder="Enter Your address">
                </div>
            </div>
            <div class="EMS-form-row">
                <a href="CostEstimation.php">
                    <button type="button" class="EMS-submit-btn">Submit</button>
                </a>
            </div> 
            
            
        </form>  
    </div>
</body>
<script src="JS/Dashboard.js"></script>
</html>
 