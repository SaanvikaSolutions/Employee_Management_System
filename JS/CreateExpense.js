function toggleExpenseFields() {
  var expenseType = document.getElementById("expenseType").value;

  document.getElementById("officeFields").style.display = "none";
  document.getElementById("projectFields").style.display = "none";

  if (expenseType === "Office") {
    document.getElementById("officeFields").style.display = "block";
  } else if (expenseType === "Project") {
    document.getElementById("projectFields").style.display = "block";
  }
}

function toggleSpecifyCategory() {
  var expenseCategory = document.getElementById("expenseCategory").value;
  var specifyTextbox = document.getElementById("specifyCategoryTextbox");

  if (expenseCategory === "Other") {
    specifyTextbox.style.display = "block";
  } else {
    specifyTextbox.style.display = "none";
  }
}
//--------Commenting Prev Code----------//
// function toggleProjectName() {
//   var projectType = document.getElementById("projectType").value;
//   var projectNameFields = document.getElementById("projectNameFields");
//   var otherProjectNameTextbox = document.getElementById("otherProjectNameTextbox");

//   otherProjectNameTextbox.style.display = "none";

//   if (projectType === "Interior" || projectType === "Construction") {
//     projectNameFields.style.display = "block";
//   } else {
//     projectNameFields.style.display = "none";
//   }
// }

// document.addEventListener("DOMContentLoaded", function () {
//   document.getElementById("projectName").addEventListener('change', function () {
//     var otherProjectNameTextbox = document.getElementById("otherProjectNameTextbox");
//     if (this.value === "Other") {
//       otherProjectNameTextbox.style.display = "block";
//     } else {
//       otherProjectNameTextbox.style.display = "none";
//     }
//   });
// });
// ---------------------------------------------------------------//

function getItem(projectType) {
  if (projectType !== "") {
      $.ajax({
          type: "POST",
          url: "fetchprojects.php",
          data: { projectType: projectType },
          success: function (response) {
              $("#projectName").html(response); // Populate only the <select> options
          },
      });
  } else {
      // Clear the dropdown
      $("#projectName").html('<option value="">Select Project Name</option>');
  }
}
//Cost Calculation Js 
function calculatePending(){
  const cost = parseFloat(document.getElementById('cost').value)||0;
  const advance = parseFloat(document.getElementById('advance').value)||0;
  const pending = cost-advance;
  document.getElementById('pending').value = pending >= 0 ? pending : 0;
}