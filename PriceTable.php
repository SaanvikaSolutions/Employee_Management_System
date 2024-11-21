<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Table </title>
    <!-- Link to Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"  href="CSS/PriceTable.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">

</head>

<body>

    <?php
    include('./Dashboard.php');
    ?>
    <div class="PriceTable">
        <h1 class="PriceTableTitle">View Items Cost</h1>
        <input type="text" id="searchBar" class="PriceTableTitleSearchBar"
            placeholder="Search by Room Type, Item Name, or Category">
        <div class="PriceTableWrapper">
            <table class="PriceTableEMS">
                <thead>
                    <tr>
                        <th>Item Id</th>
                        <th>Room Type</th>
                        <th>Item Name</th>
                        <th>Category</th>
                        <th>Area (in sqft)</th>
                        <th>Quality Type</th>
                        <th>Price (Per sqft)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="projectData">
                    <tr>
                        <td>1</td>
                        <td>Hall</td>
                        <td>Wardrobe laminate</td>
                        <td>Wardrobe</td>
                        <td>96</td>
                        <td>Basic</td>
                        <td>1800</td>
                        <td class="action-buttons-EMS">
                            <a href="https://your-link-here.com">
                                <i class="fa-solid fa-pen-to-square Price-Table-Edit-button"></i>
                            </a>
                            <i class="fa-solid fa-trash Price-Table-delete-button"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Bedroom</td>
                        <td>Wardrobe loft</td>
                        <td>Wardrobe</td>
                        <td>96</td>
                        <td>Basic</td>
                        <td>1800</td>
                        <td class="action-buttons-EMS">
                            <a href="https://your-link-here.com">
                                <i class="fa-solid fa-pen-to-square Price-Table-Edit-button"></i>
                            </a>
                            <i class="fa-solid fa-trash Price-Table-delete-button"></i>
                        </td>
                    </tr>

                    <!-- ------------------------------------------------ -->
        
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="JS/Dashboard.js"></script>
</html>