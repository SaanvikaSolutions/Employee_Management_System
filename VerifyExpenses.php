<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Expenses Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="CSS/VerifyExpenses.css"> 
    <link rel="stylesheet" href="CSS/Dashboard.css"> 
</head>
<body>
    <?php
    include('./Dashboard.php');
    ?>
    
    <div class="Verify_expense">
        <h2 class="Verify_expense_title">Verify Expenses</h2>
        
        <form action="/submit_expenses" method="POST" class="Verify_expense_form">
            <div class="Verify_expense_form_group">
                <label for="finalAmount" class="Verify_expense_label">Final Amount (to be paid): <span class="Verify_expense_required">*</span></label>
                <input type="number" id="finalAmount" name="finalAmount" class="Verify_expense_input" required>
            </div>

            <div class="Verify_expense_form_group">
                <label for="status" class="Verify_expense_label">Status: <span class="Verify_expense_required">*</span></label>
                <select id="status" name="status" class="Verify_expense_select" required>
                    <option value="open">Open</option>
                    <option value="close">Close</option>
                </select>
            </div>

            <div class="Verify_expense_form_group">
                <label for="financeManage" class="Verify_expense_label">Finance Manager: <span class="Verify_expense_required">*</span></label>
                <select id="financeManage" name="financeManage" class="Verify_expense_select" required>
                    <option value="manager1">Manager 1</option>
                    <option value="manager2">Manager 2</option>
                    <option value="manager3">Manager 3</option>
                </select>
            </div>

            <div class="Verify_expense_form_group">
                <label for="comment" class="Verify_expense_label">Comment:</label>
                <textarea id="comment" name="comment" class="Verify_expense_textarea" rows="4" cols="50"></textarea>
            </div>

            <input type="submit" value="Submit" class="Verify_expense_submit">
        </form>
    </div>

</body>
<script src="JS/Dashboard.js"></script>
</html>
