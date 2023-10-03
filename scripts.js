document.getElementById('bioForm').addEventListener('submit', function(event) {
    event.preventDefault();  // Prevent the default form submission behavior

    // Validate name
    const nameInput = document.getElementById('name');
    if (nameInput.value.trim() === '') {
        alert('Name cannot be empty');
        nameInput.focus();
        return;
    }

    // Validate NIM (Assuming NIM is a 10-digit number)
    const nimInput = document.getElementById('nim');
    const nimPattern = /^\d{10}$/;
    if (!nimPattern.test(nimInput.value)) {
        alert('NIM should be a 10-digit number');
        nimInput.focus();
        return;
    }

    // If all validations pass, you can perform further actions like submitting the form
    alert('Form submitted successfully!\nName: ' + nameInput.value + '\nNIM: ' + nimInput.value);
});
