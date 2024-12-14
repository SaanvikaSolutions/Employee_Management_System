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
    include('./backend/includes/dbconnect.php');
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
                        <th>Budget(in Lakhs)</th>
                        <th>StartDate</th>
                        <th>End Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="projectData">
                <?php
                    //Fetch Employees Details From Database
                    $get_project_details = "SELECT * FROM `projects`";
                    $get_project_res = mysqli_query($conn,$get_project_details);
                    //Check if the query execution is success or not
                    if($get_project_res){
                        while($row = mysqli_fetch_assoc($get_project_res)){
                            $project_id = $row['project_id'];
                            $Project_Name  = $row['project_name'];
                            $Project_Type = $row['project_type'];
                            $Project_Manager = $row['project_manager'];
                            $Project_Team = $row['project_team'];
                            $Budget = $row['budget'];
                            $Start_Date = $row['start_date'];
                            $End_Date = $row['end_date'];
                            

                            echo '<tr>
                                <td>' . htmlspecialchars($project_id) . '</td>
                                <td>' . htmlspecialchars($Project_Name) . '</td>
                                <td>' . htmlspecialchars($Project_Type) . '</td>
                                <td>' . htmlspecialchars($Project_Manager) . '</td>
                                <td>' . htmlspecialchars($Project_Team) . '</td>
                                <td>' .htmlspecialchars($Budget) . '</td>
                                <td>' . htmlspecialchars($Start_Date) . '</td>
                                <td>' . htmlspecialchars($End_Date) . '</td>
                                <td class="action-buttons">
                                    <a href="edit-project.php?project_id=' . $project_id . '" class="edit-button">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="#" onclick="confirmDelete(' . $project_id . ')" class="delete-button">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                 </td>
                                
                            </tr>';
                        }
                    }else {
                            // Display an error message if the query failed
                            echo '<tr><td colspan="8">Error fetching data from the database.</td></tr>';
                        }
                        ?>
                    
                </tbody>
            </table>
        </div>
    </div>
   
    
</body>
<script src="JS/View-Project.js"></script>
<script src="JS/Dashboard.js"></script>
</html>



<!-- <tr>
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


                    <!-- ---------------------------------------------- -->
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
                    <!-- ---------------------------------------------- -->
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="JS/View-Project.js"></script>
<script src="JS/Dashboard.js"></script>
</html>