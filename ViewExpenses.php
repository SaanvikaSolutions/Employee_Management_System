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
    ?>


    <div class="view-Expenses">
        <h1 class="view-ExpensesTitle">View Expenses</h1>
        <input type="text" id="searchBar" class="view-ExpensesTitleSearchBar"
            placeholder="Search by Expense Type, Project Name, or Category">
        <div class="view-ExpensesWrapper">
            <table class="view-ExpensesTable">
                <thead>
                    <tr>
                        <th>Status</th> <!-- Added the Status column -->
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
                    <tr>
                        <td>
                            <!-- Status button with new class name 'KSK' -->
                            <button class="KSK KSK-open">Open</button>
                        </td>
                        <td>1001</td>
                        <td>Travel</td>
                        <td>Transportation</td>
                        <td>Flight</td>
                        <td>New Construction</td>
                        <td>Office Building</td>
                        <td>2024-12-01</td>
                        <td>2000</td>
                        <td>500</td>
                        <td>1500</td>
                        <td class="action-buttons-Expenses">
                            <a href="VerifyExpenses.php">
                                <i class="fa-solid fa-pen-to-square view-Expenses-Edit-button"></i>
                            </a>
                            <i class="fa-solid fa-trash view-Expenses-delete-button"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- Status button with new class name 'KSK' -->
                            <button class="KSK KSK-approved">Approved</button>
                        </td>
                        <td>2</td>
                        <td>Materials</td>
                        <td>Cement</td>
                        <td>Construction Material</td>
                        <td>Renovation</td>
                        <td>Apartment Complex</td>
                        <td>2024-12-03</td>
                        <td>3000</td>
                        <td>1000</td>
                        <td>2000</td>
                        <td class="action-buttons-Expenses">
                            <a href="VerifyExpenses.php">
                                <i class="fa-solid fa-pen-to-square view-Expenses-Edit-button"></i>
                            </a>
                            <i class="fa-solid fa-trash view-Expenses-delete-button"></i>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="JS/ViewExpenses.js"></script>
<script src="JS/Dashboard.js"></script>
</html>
