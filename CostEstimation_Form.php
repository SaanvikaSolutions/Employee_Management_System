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

    <div class="COSTE-form-container">
        <h2 class="COSTE-title">Client Details</h2>
        <form id="client-form" class="COSTE-form">  
            <div class="COSTE-form-group">
                <label for="company-name" class="COSTE-label">Company Name</label>
                <input type="text" id="company-name" class="COSTE-input" placeholder="Enter company name" required>
            </div>
            <div class="COSTE-form-group">
                <label for="company-address" class="COSTE-label">Company Address</label>
                <input type="text" id="company-address" class="COSTE-input" placeholder="Enter company address"
                    required>
            </div>
            <div class="COSTE-form-group">
                <label for="email-id" class="COSTE-label">Email ID</label>
                <input type="email" id="email-id" class="COSTE-input" placeholder="Enter your email" required>
            </div>
            <div class="COSTE-form-group">
                <label for="contact-person-name" class="COSTE-label">Contact Person Name</label>
                <input type="text" id="contact-person-name" class="COSTE-input" placeholder="Enter your name" required>
            </div>
            <div class="COSTE-form-group">
                <label for="phone-number" class="COSTE-label">Phone Number</label>
                <input type="tel" id="phone-number" class="COSTE-input" placeholder="Enter your phone number" required>
            </div>
            <div class="COSTE-form-check">
                <input type="checkbox" id="alternate-person-name">
                <label for="alternate-person-name" class="COSTE-label">Alternate Person Name</label>
            </div>
            <div id="alternate-fields" style="display: none;">
                <div class="COSTE-form-group">
                    <label for="alternate-name" class="COSTE-label">Alternate Name</label>
                    <input type="text" id="alternate-name" class="COSTE-input" placeholder="Enter alternate name">
                </div>
                <div class="COSTE-form-group">
                    <label for="alternate-phone" class="COSTE-label">Alternate Phone Number</label>
                    <input type="tel" id="alternate-phone" class="COSTE-input"
                        placeholder="Enter alternate phone number">
                </div>
            </div>
            <!-- <button type="submit" class="COSTE-btn">Submit</button> -->
        </form>
        <button type="submit" class="COSTE-btn">Submit</button>

        <h2 class="COSTE-title">Select Your Property Type</h2>
        <div class="COSTE-property-types">
            <button class="COSTE-property-btn">Flat</button>
            <button class="COSTE-property-btn">Villa</button>
            <button class="COSTE-property-btn">Individual House</button>
            <button class="COSTE-property-btn">Apartment</button>
            <button class="COSTE-property-btn">Office</button>
        </div>

        <h2 class="COSTE-title">Choose the Project We Initiated</h2>
        <div class="COSTE-project-selection">
            <div class="COSTE-project-option">
                <button class="COSTE-project-btn">Construction</button>
            </div>
            <div class="COSTE-project-option">
                <button class="COSTE-project-btn">Interior</button>
            </div>
            <div class="COSTE-apartment-type">
                <label for="apartment-type" class="COSTE-label">Select Apartment Type</label>
                <select id="apartment-type" class="COSTE-select">
                    <option value="1bhk">1 BHK</option>
                    <option value="2bhk">2 BHK</option>
                    <option value="3bhk">3 BHK</option>
                    <option value="4bhk">4 BHK</option>
                    <option value="5bhk">5 BHK</option>
                    <option value="6bhk">6 BHK</option>
                    <option value="7bhk">7 BHK</option>
                    <option value="8bhk">8 BHK</option>
                    <option value="9bhk">9 BHK</option>
                </select>
            </div>
        </div>
        <!-- ===================   Add button ================== -->
        <div class="EMSS EMSS-COST-container">
            <div id="containerWrapper">
                <h1>Select Room Type</h1>
            </div>
            <button onclick="addRoom('Bedroom')"> Bedroom</button>
            <button onclick="addRoom('Kitchen')"> Kitchen</button>
            <button onclick="addRoom('Living Room')"> Living Room</button>
            <button onclick="addRoom('Pooja Room')"> Pooja Room</button>
            <button onclick="addRoom('Dining Room')"> Dining Room</button>
        </div>
        <!-- ===================   Add button ================== -->
    </div>
</body>
<script src="JS/form.js"></script>
<script src="JS/Dashboard.js"></script>
</html>