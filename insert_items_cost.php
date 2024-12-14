<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Items Cost</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/CreateLead.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>

<body>
<?php
include('./Dashboard.php');
include('./backend/includes/dbconnect.php');
?>

    <form class="Create-Lead-lead-form" Action="insert_items_cost.php" method="POST">
        <h2>Insert Items Cost</h2>

        <div class="Create-Lead-form-Dropdown">
            <div class="Create-Lead-form-section">
                <label for="roomType">Room Type<span>*</span></label>
                <select id="roomType" class="Create-Lead-form-select" name="room_type" required>
                    <option value="">Select</option>
                    <option value="Bed Room">Bed Room</option>
                    <option value="Living Room">Living Room</option>
                    <option value="Pooja Room">Pooja Room</option>
                    <option value="Dining Room">Dining Room</option>
                    <option value="Kitchen">Kitchen</option>
                </select>
            </div>

            <div class="Create-Lead-form-section">
                <label for="itemName">Item Name<span>*</span></label>
                <input type="text" id="itemName" name="item_name" class="Create-Lead-form-input" required>
            </div>
        </div>

        <div class="Create-Lead-form-Dropdown">
            <div class="Create-Lead-form-section">
                <label for="itemcategory">Category Of Item</label>
                <input type="text" id="itemcategory" name="item_category" class="Create-Lead-form-input" >
            </div>

            <div class="Create-Lead-form-section">
                <label for="area">Area<span style="color:black;font-size:13px;"> (in Sqft)</span><span>*</span></label>
                <input type="text" id="area" name="area" class="Create-Lead-form-input" required>
            </div>
        </div>

        <div class="Create-Lead-form-Dropdown">
            <div class="Create-Lead-form-section">
                <label for="qualityType">Quality Type<span>*</span></label>
                <select id="qualityType" class="Create-Lead-form-select" name="quality_type" required>
                    <option value="">Select</option>
                    <option value="Basic">Basic</option>
                    <option value="Premium">Premium</option>
                    <option value="Luxury">Luxury</option>
                </select>
            </div>
            <div class="Create-Lead-form-section">
                <label for="price">Price<span style="color:black;font-size:13px;"> (per Sqft)</span><span>*</span></label>
                <input type="number" id="price" name="price_per_sqft" class="Create-Lead-form-input" required>
            </div>
        </div>
        <button type="submit" class="Create-Lead-form-buttonss" name="Insert_items">Insert Items</button>
    </form>
    <?php
    if(isset($_POST['Insert_items'])){
        $room_type = mysqli_real_escape_string($conn,$_POST['room_type']);
        $item_name = mysqli_real_escape_string($conn,$_POST['item_name']);
        $item_category = mysqli_real_escape_string($conn,$_POST['item_category']);
        $Area = mysqli_real_escape_string($conn,$_POST['area']);
        $Quality_type = mysqli_real_escape_string($conn,$_POST['quality_type']);
        $price = mysqli_real_escape_string($conn,$_POST['price_per_sqft']);

        $insert_query = "INSERT INTO `cost_estimation`(`room_type`, `item_name`, `category`, `area_sqrt`, `quality_type`, `price_per_sqrt`) VALUES ('$room_type','$item_name','$item_category','$Area','$Quality_type','$price')";
        $insert_query_res = mysqli_query($conn,$insert_query);

        if($insert_query_res){
            echo "<script>alert('Successfully inserted Item');window.location.href='insert_items_cost.php';</script>";
        }else{
            echo "Error :".mysqli_error($conn);
        }
    }
    ?>
    
    <!-- <script src="JS/CreateLead.js"></script> -->
</body>
<script src="JS/CreateLead.js"></script>
<script src="JS/Dashboard.js"></script>

</html>