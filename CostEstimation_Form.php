<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Details Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>

<body>
<?php
    include('./Dashboard.php');
    ?>
    <div class="form-container">
        <h2 class="form-title">Client Details</h2>
        <form id="client-form" class="form" method="POST">
            <div class="form-group">
                <label for="company-name" class="form-label">Company Name</label>
                <input type="text" id="company-name" class="form-input" name="company_name" placeholder="Enter company name" required>
            </div>
            <div class="form-group">
                <label for="company-address" class="form-label">Company Address</label>
                <input type="text" id="company-address" class="form-input" name="company_address" placeholder="Enter company address" required>
            </div>
            <div class="form-group">
                <label for="email-id" class="form-label">Email ID</label>
                <input type="email" id="email-id" class="form-input" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="contact-person-name" class="form-label">Contact Person Name</label>
                <input type="text" id="contact-person-name" class="form-input" name="contact_person" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="phone-number" class="form-label">Phone Number</label>
                <input type="tel" id="phone-number" class="form-input" name="phone_number" placeholder="Enter your phone number" required>
            </div>
            <div class="form-check">
                <input type="checkbox" id="alternate-person-name">
                <label for="alternate-person-name" class="form-label">Alternate Person Name</label>
            </div>
            <div id="alternate-fields" class="alternate-fields" style="display: none;">
                <div class="form-group">
                    <label for="alternate-name" class="form-label">Alternate Name</label>
                    <input type="text" id="alternate-name" class="form-input" name="alternate_name" placeholder="Enter alternate name">
                </div>
                <div class="form-group">
                    <label for="alternate-phone" class="form-label">Alternate Phone Number</label>
                    <input type="tel" id="alternate-phone" class="form-input" name="alternate_phone" placeholder="Enter alternate phone number">
                </div>
                
            </div>  
            <div class="form-group" style="width:50%;border:1px solid #ccc;padding:10px;border-radius:5px;">
                <h2 class="form-label">Select Your Property Type</h2>
                <div class="property-types">
                    <label>
                        <input type="checkbox" name="property_type" value="Flat" class="property-input"> Flat
                    </label>
                    <label>
                        <input type="checkbox" name="property_type" value="Villa" class="property-input"> Villa
                    </label>
                    <label>
                        <input type="checkbox" name="property_type" value="Individual House" class="property-input"> Individual House
                    </label>
                    <label>
                        <input type="checkbox" name="property_type" value="Apartment" class="property-input"> Apartment
                    </label>
                    <label>
                        <input type="checkbox" name="property_type" value="Office" class="property-input"> Office
                    </label>
                </div>
            </div>

            <div class="form-group" style="width:50%;border:1px solid #ccc;padding:10px;border-radius:5px;">
                <h2 class="form-label">Choose the Project We Initiated</h2>
                <div class="project-selection-container">
                    <label>
                        <input type="checkbox" name="project_type" value="Construction" class="project-input"> Construction
                    </label>
                    <label>
                        <input type="checkbox" name="project_type" value="Interior" class="project-input"> Interior
                    </label>
                </div>
            </div>

            <div class="form-apartment-type" style="width:100%;">
                <div class="apartment-type-container">
                    <div class="form-group">
                        <label for="apartment-type" class="form-label">Select Apartment Type</label>
                        <select id="apartment-type" name="apartment_type" class="form-input">
                            <option value="1bhk">1 BHK</option>
                            <option value="2bhk">2 BHK</option>
                            <option value="3bhk">3 BHK</option>
                            <option value="4bhk">4 BHK</option>
                            <option value="5bhk">5 BHK</option>
                            <option value="6bhk">6 BHK</option>
                            <option value="7bhk">7 BHK</option>
                            <option value="8bhk">8 BHK</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button type="submit" name="submit" class="form-btn" style="width:20%;display:flex;margin:auto;align-items:center;justify-content:center;">Submit</button>
            </div>

        </form>

        <!-- Select Your Property Type Section -->
        <!-- <h2 class="form-title">Select Your Property Type</h2>
        <div class="property-types">
            <button type="button" class="property-btn">Flat</button>
            <button type="button" class="property-btn">Villa</button>
            <button type="button" class="property-btn">Individual House</button>
            <button type="button" class="property-btn">Apartment</button>
            <button type="button" class="property-btn">Office</button>
        </div> -->

      <!-- ----------------------------------------- -->
      <div class="EMSS EMSS-COST-container">
        <div id="containerWrapper">
            <h1>Select Room Type</h1>
        </div>
        <div id="buttonContainer">
            <button onclick="addRoom('Bedroom')"> Bedroom</button>
            <button onclick="addRoom('Kitchen')"> Kitchen</button>
            <button onclick="addRoom('Living Room')"> Living Room</button>
            <button onclick="addRoom('Pooja Room')"> Pooja Room</button>
            <button onclick="addRoom('Dining Room')"> Dining Room</button>
        </div>
    </div>
      <!-- ----------------------------------------- -->
      <button onclick="logSelections()" name="submit" class="form-btn" id="coste_submit_btn">Submit</button>
    </div>
</body>
<script src="JS/form.js"></script>
<script src="JS/Dashboard.js"></script>

</html>
