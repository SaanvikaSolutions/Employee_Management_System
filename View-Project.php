<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Projects Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/View-Project.css"> 
    <link rel="stylesheet" href="CSS/Dashboard.css">
</head>
<body>    
    <?php
    include('./Dashboard.php');
    ?>

    <div class="ViewProjectSection">
        <h1 class="ViewProjectTitle">View Projects</h1>
        <input type="text" id="searchBar" class="ViewProjectSearchBar"
            placeholder="Search by Project Name, Type, or Manager">
        <div class="ViewProjectTableWrapper">
            <table class="ViewProjectTable">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Project Name</th>
                        <th>Project Type</th>
                        <th>Project Manager</th>
                        <th>Team Members</th>
                        <th>Budget</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="projectData">
                    <tr>
                        <td>1</td>
                        <td>Amazon</td>
                        <td>Interior</td>
                        <td>Suresh</td>
                        <td>Pavan, Sai</td>
                        <td>10,00,000</td>
                        <td>2024-01-01</td>
                        <td>2024-06-30</td>
                        <td class="action-buttons">
                            <a href="https://your-link-here.com">
                                <i class="fa-solid fa-pen-to-square edit-button"></i>
                            </a>

                            <i class="fa-solid fa-trash delete-button"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Zepto</td>
                        <td>Construction</td>
                        <td>Venky</td>
                        <td>Govind, Mani</td>
                        <td>50,00,000</td>
                        <td>2024-02-15</td>
                        <td>2025-03-30</td>
                        <td class="action-buttons">
                            <a href="https://your-link-here.com">
                                <i class="fa-solid fa-pen-to-square edit-button"></i>
                            </a>
                            <i class="fa-solid fa-trash delete-button"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="JS/View-Project.js"></script>
<script src="JS/Dashboard.js"></script>
</html>