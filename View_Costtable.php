<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item Cost Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/View_costtable.css"> 
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>
<body>
    <?php
    include('./Dashboard.php');
    include('./backend/includes/dbconnect.php');
    ?>

    <div class="ViewProjectSection">
        <h1 class="ViewProjectTitle">View Item Costs</h1>
        <div class="ViewProjectTableWrapper">
            <table class="ViewProjectTable">
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
                    <?php
                    $get_items_query = "SELECT * FROM `cost_estimation` WHERE `room_type`='Bed Room'";
                    $get_items_query_res = mysqli_query($conn, $get_items_query);
                    if ($get_items_query_res) {
                        while ($row = mysqli_fetch_assoc($get_items_query_res)) {
                            $Item_id = $row['item_id'];
                            $Room_Type = $row['room_type'];
                            $Item_Name = $row['item_name'];
                            $Category = $row['category'];
                            $Area = $row['area_sqrt'];
                            $Quality_Type = $row['quality_type'];
                            $Price = $row['price_per_sqrt'];

                            echo "<tr>
                                <td>" . htmlspecialchars($Item_id) . "</td>
                                <td>" . htmlspecialchars($Room_Type) . "</td>
                                <td>" . htmlspecialchars($Item_Name) . "</td>
                                <td>" . htmlspecialchars($Category) . "</td>
                                <td>" . htmlspecialchars($Area) . "</td>
                                <td>" . htmlspecialchars($Quality_Type) . "</td>
                                <td>" . htmlspecialchars($Price) . "</td>
                                <td class='action-buttons'>
                                    <a href='edit-costtable.php?project_id=" . $Item_id . "' class='edit-button'>
                                        <i class='fa-solid fa-pen-to-square'></i>
                                    </a>
                                    <a href='#' onclick='confirmDelete(" . $Item_id . ")' class='delete-button'>
                                        <i class='fa-solid fa-trash'></i>
                                    </a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No Records Found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="JS/View-Project.js"></script>
    <script src="JS/Dashboard.js"></script>
</body>
</html>
