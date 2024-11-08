<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property and Room Selection</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="CSS/CostEstimation.css">
<link rel="stylesheet" href="CSS/Dashboard.css">

</head>
<body>
<?php
include('./Dashboard.php');
?>

    <div class="Total-cost-estimation-">

    <div class="cost-estimation-property-selection-container">
        <h2 class="cost-estimation-h2">Step 2: Select your Property Type</h2>
        <div class="cost-estimation-property-options">
            <div class="cost-estimation-property-option" onclick="selectProperty(this, 'residential')" aria-label="Select Flat">
                <img src="img/house.png" alt="Flat">
                <span>Flat</span>
            </div>  
            <div class="cost-estimation-property-option" onclick="selectProperty(this, 'residential')" aria-label="Select Villa">
                <img src="img/modern-house.png" alt="Villa">
                <span>Villa</span>
            </div>
            <div class="cost-estimation-property-option" onclick="selectProperty(this, 'residential')" aria-label="Select Apartment">
                <img src="img/apartment (1).png" alt="Apartment">
                <span>Apartment</span>
            </div>
            <div class="cost-estimation-property-option" onclick="selectProperty(this, 'residential')" aria-label="Select Individual House">
                <img src="img/house.png" alt="Individual House">
                <span>Individual House</span>
            </div>
            <div class="cost-estimation-property-option" onclick="selectProperty(this, 'office')" aria-label="Select Office">
                <img src="img/workplace.png" alt="Office">
                <span>Office</span>
            </div>
        </div>
    </div>

    <div class="cost-estimation-project-type-container">
        <h3 class="cost-estimation-h3">Select Project Type</h3>
        <div class="cost-estimation-project-options">
            <div class="cost-estimation-project-option" onclick="showDynamicOptions('Interior', this)" aria-label="Select Interior">
                <img src="img/staircase.png" alt="Interior">
                <span>Interior</span>
            </div>
            <div class="cost-estimation-project-option" onclick="showDynamicOptions('Construction', this)" aria-label="Select Construction">
                <img src="img/hook.png" alt="Construction">
                <span>Construction</span>
            </div>
        </div>
    </div>

    <div class="cost-estimation-options-container" id="dynamic-options-container">
        <!-- Dynamic options will be inserted here -->
    </div>

    <div class="room-selection-container" id="room-selection-container">
        <h3>Select Rooms</h3>
        <div class="room-options" id="room-options">
            <!-- Room options will be populated here -->
        </div>
        <!-- <button class="continue-button" onclick="continueSelection()">Continue</button> -->
        <!-- <a href="2NDcontinution.html" class="continue-button">Continue</a> -->

    </div>


    <!-- --------------------   2nd code ------------------------------- -->

    <div class="EMS-room-selection-container">
        <!-- <div class="ems-back-button-container">
            <button class="ems-back-btn">Back</button>
        </div> -->
        <h2>Choose Your Design Service</h2>
        <div class="EMS-room-options">
            <div class="EMS-room-options">
                <div class="EMS-room-option" onclick="selectOption(this, 'onlyInterior')">
                    <img src="img/interior-design.png" alt="Only Interior">
                    <span>Only Interior</span>
                </div>
                <div class="EMS-room-option" onclick="selectOption(this, 'onlyExterior')">
                    <img src="img/house (1).png" alt="Only Exterior">
                    <span>Only Exterior</span>
                </div>
                <div class="EMS-room-option" onclick="selectOption(this, 'fullDesign')">
                    <img src="img/plan.png" alt="Full Design">
                    <span>Full Design</span>
                </div>
                <div class="EMS-room-option" onclick="selectOption(this, 'woodwork')">
                    <img src="img/saw.png" alt="Woodwork">
                    <span>Woodwork</span>
                </div>
                <div class="EMS-room-option" onclick="selectOption(this, 'ceiling')">
                    <img src="img/ceiling.png" alt="Ceiling">
                    <span>Ceiling</span>
                </div>
                <div class="EMS-room-option" onclick="selectOption(this, 'flooring')">
                    <img src="img/tile.png" alt="Flooring">
                    <span>Flooring</span>
                </div>
                <div class="EMS-room-option" onclick="selectOption(this, 'furniture')">
                    <img src="img/sofa (1).png" alt="Furniture">
                    <span>Furniture</span>
                </div>
                <div class="EMS-room-option" onclick="selectOption(this, 'decor')">
                    <img src="img/modern.png" alt="Decor">
                    <span>Decor</span>
                </div>
                <div class="EMS-room-option" onclick="selectOption(this, 'designPainting')">
                    <img src="img/canvas.png" alt="Design Painting">
                    <span>Design Painting</span>
                </div>
            </div>
            
            <!-- Add other room options as needed -->
        </div>
        <div class="additional-options" id="additionalOptions">
            <div class="EMS-additional-options" id="additionalContent"></div>
        </div>

        <div id="roomSizeOptions" class="room-size-container">
            <h3>Room Size Options</h3>
            <div class="room-size-buttons">
                <div class="room-size-button" onclick="selectRoomSize(this, 'Basic')">
                    <img src="img/icon-basic.png" alt="Basic" class="room-size-icon">
                    Basic
                </div>
                <div class="room-size-button" onclick="selectRoomSize(this, 'Premium')">
                    <img src="img/icon-premium.png" alt="Premium" class="room-size-icon">
                    Premium
                </div>
                <div class="room-size-button" onclick="selectRoomSize(this, 'Luxury')">
                    <img src="img/icon-luxury.png" alt="Luxury" class="room-size-icon">
                    Luxury
                </div>
            </div>
        </div>
        
        

        <div id="dimensionCalculator">
            <h3>Enter Dimensions</h3>
            <div class="inputs-container">
                <div>
                    <label for="widthInput">Width (ft):</label>
                    <input type="number" id="widthInput" placeholder="Enter width in feet" onchange="calculateArea()">
                </div>
                <div>
                    <label for="heightInput">Height (ft):</label>
                    <input type="number" id="heightInput" placeholder="Enter height in feet" onchange="calculateArea()">
                </div>
            </div>

            <div class="total-area-box">
                <strong>Total Area (sq. ft.):</strong> <span id="totalArea">0</span>
            </div>
        </div>

        <!-- <div class="button-container">
            <button class="EMS-customize-button">Customize Your Design</button>
            <button class="EMS-continue-button">Continue</button>
        </div> -->
    </div>

    <!-- --------------------   3rd code ------------------------------- -->


    
    <div class="Final-room-selection-container">

        <!-- <div class="final-back-button-container">
            <a href="Cost-Estimation-1.html" class="final-back-link">
                <button class="final-back-btn">Back</button>
            </a>
        </div> -->
        
        <div class="Final-room-selection-heading">Choose Your Room Design</div>
        <div class="Final-room-options">
            <div class="Final-room-option" onclick="toggleSelection(this, 'kitchen')">
                <img src="img/kitchen.png" alt="Kitchen">
                <span>Kitchen</span>
            </div>
            <div class="Final-room-option" onclick="toggleSelection(this, 'livingRoom')">
                <img src="img/living-room.png" alt="Living Room">
                <span>Living Room</span>
            </div>
            <div class="Final-room-option" onclick="toggleSelection(this, 'bedroom')">
                <img src="img/bedroom.png" alt="Bedroom">
                <span>Bedroom</span>
            </div>
            <div class="Final-room-option" onclick="toggleSelection(this, 'bathroom')">
                <img src="img/bathroom.png" alt="Bathroom">
                <span>Bathroom</span>
            </div>
            <div class="Final-room-option" onclick="toggleSelection(this, 'studyRoom')">
                <img src="img/study-room.png" alt="Study Room">
                <span>Study Room</span>
            </div>
            <div class="Final-room-option" onclick="toggleSelection(this, 'homeTheater')">
                <img src="img/home-theater.png" alt="Home Theater">
                <span>Home Theater</span>
            </div>
        </div>

        <!-- Final Room Size Options -->
        <div id="Final-roomSizeOptions" class="Final-room-size-container">
            <div class="Final-room-size-heading">Room Size Options</div>
            <div class="Final-room-size-buttons">
                <div class="Final-room-size-button" onclick="selectRoomSize(this, 'Basic')">
                    <img src="img/icon-basic.png" alt="Basic" class="Final-room-size-icon">
                    Basic
                </div>
                <div class="Final-room-size-button" onclick="selectRoomSize(this, 'Premium')">
                    <img src="img/icon-premium.png" alt="Premium" class="Final-room-size-icon">
                    Premium
                </div>
                <div class="Final-room-size-button" onclick="selectRoomSize(this, 'Luxury')">
                    <img src="img/icon-luxury.png" alt="Luxury" class="Final-room-size-icon">
                    Luxury
                </div>
            </div>
        </div>

        <div class="Final-additional-options" id="Final-additionalOptions">
            <div class="Final-EMS-additional-options" id="Final-additionalContent"></div>
        </div>

        <div class="Final-buttons-container">
            <button class="Final-customize-button">Customize Your Design</button>
            <button class="Final-generate-quotation-button" onclick="generateQuotation()">Generate Quotation</button>
        </div>
    </div>
</div>

</body>
<script src="JS/CostEstimation.js"></script>
<script src="JS/Dashboard.js"></script>

</html>