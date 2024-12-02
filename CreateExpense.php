<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Expense Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="CSS/CreateExpense.css">
  <link rel="stylesheet" href="CSS/Dashboard.css">

</head>

<body>

  <?php
  include('./Dashboard.php');
  ?>

  
  <!-- <h1 class="Crateexp">Expense Form</h1> -->

  <form class="Expenses-form" action="" method="POST">
    <h1 class="Crateexp">Expense Form</h1>
      <!-- Employee Info Section -->
      <div class="Expenses-form-group">
        <div>
          <label for="empID" class="Expenses-label">Emp ID:</label>
          <input type="text" id="empID" name="empID" class="Expenses-input" required>
        </div>
        <div>
          <label for="date" class="Expenses-label">Date:</label>
          <input type="date" id="date" name="date" class="Expenses-input" required>
        </div>
      </div>

      <!-- Expense Type Section -->
      <div class="Expenses-form-group">
        <div>
          <label for="expenseType" class="Expenses-label">Expense Type:</label>
          <select id="expenseType" name="expenseType" class="Expenses-select" onchange="toggleExpenseFields()" required>
            <option value="">Select Expense Type</option>
            <option value="Office">Office</option>
            <option value="Project">Project</option>
          </select>
        </div>
      </div>

      <!-- Office Fields Section -->
      <div id="officeFields" class="Expenses-hidden-fields">
        <label for="expenseCategory" class="Expenses-label">Expense Category:</label>
        <select id="expenseCategory" name="expenseCategory" class="Expenses-select" onchange="toggleSpecifyCategory()">
          <option value="">Select Expense Category</option>
          <option value="Inventory">Inventory Purchase</option>
          <option value="Travel">Travel</option>
          <option value="Event">Event</option>
          <option value="Gifts">Gifts</option>
          <option value="Other">Other</option>
        </select>
        <div id="specifyCategoryTextbox" style="display:none; margin-top: 10px;">
          <label for="specifyCategory" class="Expenses-label">Please Specify:</label>
          <input type="text" id="specifyCategory" name="specifyCategory" class="Expenses-input">
        </div>
      </div>

      <!-- Project Fields Section -->
      <div id="projectFields" class="Expenses-hidden-fields">
        <div class="Expenses-form-group">
          <div class="full-width">
            <label for="projectType" class="Expenses-label">Project Type:</label>
            <select id="projectType" name="projectType" class="Expenses-select" onchange="toggleProjectName()">
              <option value="">Select Project Type</option>
              <option value="Interior">Interior</option>
              <option value="Construction">Construction</option>
            </select>
          </div>
        </div>

        <div class="Expenses-form-group" id="projectNameFields" style="display:none;">
          <div class="full-width">
            <label for="projectName" class="Expenses-label">Project Name:</label>
            <select id="projectName" name="projectName" class="Expenses-select">
              <option value="">Select Project Name</option>
              <option value="Project A">Project A</option>
              <option value="Project B">Project B</option>
              <option value="Project C">Project C</option>
              <option value="Other">Other</option>
            </select>
          </div>
        </div>

        <div id="otherProjectNameTextbox" style="display:none;">
          <label for="otherProjectName" class="Expenses-label">Please Specify Project Name:</label>
          <input type="text" id="otherProjectName" name="otherProjectName" class="Expenses-input">
        </div>
      </div>

      <!-- Cost, Advance, Pending Section -->
      <div class="Expenses-form-group">
        <div>
          <label for="cost" class="Expenses-label">Cost:</label>
          <input type="number" id="cost" name="cost" class="Expenses-input" required>
        </div>
        <div>
          <label for="advance" class="Expenses-label">Advance:</label>
          <input type="number" id="advance" name="advance" class="Expenses-input" required>
        </div>
        <div>
          <label for="pending" class="Expenses-label">Pending:</label>
          <input type="number" id="pending" name="pending" class="Expenses-input" required>
        </div>
      </div>

      <button type="submit" class="Expenses-submit">Submit</button>
  </form>

</body>
<script src="JS/CreateExpense.js"></script>
<script src="JS/Dashboard.js"></script>
</html>
