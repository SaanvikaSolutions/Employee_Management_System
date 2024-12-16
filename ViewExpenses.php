<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Table</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/ViewExpenses.css">
    <link rel="stylesheet" href="CSS/Dashboard.css">
   
</head>

<body>
    <?php
    include('./Dashboard.php');
    include('./backend/includes/dbconnect.php');
    ?>

<div class="view-Expenses">
    <h1 class="view-ExpensesTitle">View Expenses</h1>
    <input type="text" id="searchBar" class="view-ExpensesTitleSearchBar"
        placeholder="Search by Expense Type, Project Name, or Category">
    <div class="view-ExpensesWrapper">
        <table class="view-ExpensesTable">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Emp ID</th>
                    <th>Expense Type</th>
                    <th>Expense Category</th>
                    <th>Please Specify</th>
                    <th>Project Type</th>
                    <th>Project Name</th>
                    <th>Date</th>
                    <th>Cost</th>
                    <th>Advance</th>
                    <th>Pending</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="expenseData">
                <?php
                $get_query = "SELECT * FROM `expenses`";
                $res = mysqli_query($conn, $get_query);
                if ($res) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $emp_id = $row['emp_id'];
                        $expense_type = $row['expenses_type'];
                        $expense_category = $row['expenses_category'];
                        $other = $row['other_expense'];
                        $project_type = $row['project_type'];
                        $project_id = $row['project_id'];
                        $date = $row['expenses_date'];
                        $cost = $row['cost'];
                        $advance = $row['Advance_amount'];
                        $pending = $row['Pending_amount'];

                        // Initialize project name
                        $project_name = "Other Expenses";

                        // Fetch project name
                        if (!empty($project_id)) {
                            $get_project_name = "SELECT `project_name` FROM `projects` WHERE `project_id` = '$project_id'";
                            $res_project = mysqli_query($conn, $get_project_name);
                            if ($res_project && mysqli_num_rows($res_project) > 0) {
                                $project_row = mysqli_fetch_assoc($res_project);
                                $project_name = $project_row['project_name'];
                            }
                        }

                        echo '<tr>
                            <td><button class="KSK KSK-open">Open</button></td>
                            <td>' . htmlspecialchars($emp_id) . '</td>
                            <td>' . htmlspecialchars($expense_type) . '</td>
                            <td>' . htmlspecialchars($expense_category) . '</td>
                            <td>' . htmlspecialchars($other) . '</td>
                            <td>' . htmlspecialchars($project_type) . '</td>
                            <td>' . htmlspecialchars($project_id) . ' [ ' . htmlspecialchars($project_name) . ' ]</td>
                            <td>' . htmlspecialchars($date) . '</td>
                            <td>' . htmlspecialchars($cost) . '</td>
                            <td>' . htmlspecialchars($advance) . '</td>
                            <td>' . htmlspecialchars($pending) . '</td>
                            <td class="action-buttons-Expenses">
                                <a href="VerifyExpenses.php">
                                    <i class="fa-solid fa-pen-to-square view-Expenses-Edit-button"></i>
                                </a>
                                <i class="fa-solid fa-trash view-Expenses-delete-button"></i>
                            </td>
                        </tr>';
                    }
                } else {
                    echo '<tr><td colspan="12">Error in fetching details: ' . mysqli_error($conn) . '</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
<script src="JS/ViewExpenses.js"></script>
<script src="JS/Dashboard.js"></script>
</html>
