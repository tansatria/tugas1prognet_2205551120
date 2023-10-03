document.getElementById('bioForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent the default form submission behavior

    // Validate name
    const nameInput = document.getElementById('name');
    if (nameInput.value.trim() === '') {
        alert('Name cannot be empty');
        nameInput.focus();
        return;
    }

    // Validate email using a simple regex pattern
    const emailInput = document.getElementById('email');
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(emailInput.value)) {
        alert('Invalid email address');
        emailInput.focus();
        return;
    }

    // If all validations pass, you can perform further actions like submitting the form
    alert('Form submitted successfully!');
});
