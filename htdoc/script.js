// JavaScript code for Higher Education in Abroad website

// Function to display a confirmation message when a form is submitted
function showConfirmationMessage(formId) {
    // Assuming each form has an id attribute
    var form = document.getElementById(formId);
    if (form) {
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the form from submitting normally
            // Display a confirmation message
            alert('Thank you! Your form has been submitted.');
            // Optionally, you can submit the form programmatically here
            // form.submit();
        });
    }
}

// Function to toggle the visibility of a password field
function togglePasswordVisibility(inputId, toggleId) {
    var passwordInput = document.getElementById(inputId);
    var toggleButton = document.getElementById(toggleId);

    if (passwordInput && toggleButton) {
        toggleButton.addEventListener('click', function() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleButton.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                toggleButton.textContent = 'Show';
            }
        });
    }
}

// Call the functions when the DOM content is loaded
document.addEventListener("DOMContentLoaded", function() {
    // Show confirmation message when register form is submitted
    showConfirmationMessage('registerForm');

    // Toggle password visibility for password input field
    togglePasswordVisibility('passwordInput', 'togglePasswordBtn');
});
