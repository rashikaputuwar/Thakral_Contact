

document.addEventListener('DOMContentLoaded', function () {
    const employeeSelect = document.getElementById('employee_id');
    const userNameInput = document.getElementById('user_name');

    employeeSelect.addEventListener('change', function () {
        const selectedOption = employeeSelect.options[employeeSelect.selectedIndex];
        const email = selectedOption.getAttribute('data-email');
        userNameInput.value = email;
    });
});