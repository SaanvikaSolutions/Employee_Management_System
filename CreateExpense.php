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
<?php
  include('./Dashboard.php');
  include('./backend/includes/dbconnect.php');

  ?>

<body>
  
  <!-- <h1 class="Crateexp">Expense Form</h1> -->

  <form class="Expenses-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
    <h1 class="Crateexp">Expense Form</h1>
      <!-- Employee Info Section -->
      <div class="Expenses-form-group">
        <div>
           <!-- Fetch Employee id's From Employees Table -->
            <?php
            $fetch_emp_id = "SELECT `id`, `employee_id`, `name`, `gender`, `dob`, `phone`, `alt_phone`, `email`, `hired_date`, `role_type`, `employee_type`, `assigned_to`, `department`, `address`, `city`, `postcode`, `state`, `country` FROM `employees`";
            $fetch_emp_res = mysqli_query($conn,$fetch_emp_id);
            
            ?>
          <label for="empID" class="Expenses-label">Emp ID:</label>
          <select id="empID" name="empID" class="Expenses-select" required>
              <option value="">Select Emp ID</option>
              <!-- <option value="EMP001">EMP001</option>
              <option value="EMP002">EMP002</option>
              <option value="EMP003">EMP003</option> -->
              <?php
              if($fetch_emp_res->num_rows > 0){
                while ($row = $fetch_emp_res ->fetch_assoc()){
                  echo "<option value=' " .$row['employee_id'] ." '>" . htmlspecialchars($row['employee_id']) . "</option>";
                }
              }else{
                  echo "<option valuie=''>No Employees Found</option>";
              }
              
              ?>
            </select>
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
            <select id="projectType" name="projectType" class="Expenses-select" onchange="getItem(this.value)">
              <option value="">Select Project Type</option>
              <option value="Interior">Interior</option>
              <option value="Construction">Construction</option>

              
            </select>
          </div>
        </div>
         <!-- Projects Dropdown (Values populated based on Project Type) -->
        <div class="Expenses-form-group" id="projectNameFields" >
          <div class="full-width">
            <label for="projectName" class="Expenses-label">Project Name:</label>
            <select id="projectName" name="projectName" class="Expenses-select">
                <option value="">Select Project Name</option>
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
          <input type="number" id="cost" name="cost" class="Expenses-input" oninput="calculatePending()" required>
        </div>
        <div>
          <label for="advance" class="Expenses-label">Advance:</label>
          <input type="number" id="advance" name="advance" class="Expenses-input" oninput="calculatePending()" required>
        </div>
        <div>
          <label for="pending" class="Expenses-label">Pending:</label>
          <input type="number" id="pending" name="pending" class="Expenses-input" readonly required>
        </div>
      </div>

      <button type="submit" class="Expenses-submit" name="submit">Submit</button>
  </form>
  <!-- Form DATA Inserting Code PHP -->
  <?php
  if(isset($_POST['submit'])){
    $emp_id = mysqli_real_escape_string($conn,$_POST['empID']);
    $date = mysqli_real_escape_string($conn,$_POST['date']);  
    $expense_type = mysqli_real_escape_string($conn,$_POST['expenseType']);
    $expense_category = mysqli_real_escape_string($conn,$_POST['expenseCategory']);
    $project_type = mysqli_real_escape_string($conn,$_POST['projectType']);
    $projectName = mysqli_real_escape_string($conn,$_POST['projectName']);
    $otherExpense = mysqli_real_escape_string($conn,$_POST['specifyCategory']);
    $cost = mysqli_real_escape_string($conn,$_POST['cost']);
    $advance = mysqli_real_escape_string($conn,$_POST['advance']);
    $pending = mysqli_real_escape_string($conn,$_POST['pending']);
    // Determine project_id for insertion if selected
    $project_id = ($expense_type === 'Project' && !empty($projectName)) ? $projectName : null;

    $insert_query = "INSERT INTO `expenses`(`emp_id`, `expenses_date`, `expenses_type`, `expenses_category`,`project_type`,`project_id`,`other_expense`, `cost`, `Advance_amount`, `Pending_amount`, `Created_at`) VALUES ('$emp_id','$date','$expense_type','$expense_category','$project_type','$project_id','$otherExpense','$cost','$advance','$pending',Now())";
    $res = mysqli_query($conn,$insert_query);
    if($res){
      echo "<script>alert('Success');window.location.href='createExpense.php';</script>";
    }else{
      echo "Error:".mysqli_error($conn);
    }
  }
  ?>

</body>
<script src="JS/CreateExpense.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="JS/Dashboard.js"></script>
</html>
