document.getElementById('employeeType').addEventListener('change', function () {
    const value = this.value;
    document.getElementById('designerSpecialization').classList.toggle('employee-form-hidden', value !== 'director');
    document.getElementById('managerAssignment').classList.toggle('employee-form-hidden', value !== 'manager');
    document.getElementById('employeeAssignment').classList.toggle('employee-form-hidden', value !== 'employee');
});


