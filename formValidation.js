document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
  
    const firstNameInput = form.querySelector("input[name='firstName']");
    const lastNameInput = form.querySelector("input[name='lastName']");
    const emailInput = form.querySelector("input[name='email']");
    const passwordInput = form.querySelector("input[name='password']");
    const confirmPasswordInput = form.querySelector("input[name='confirm_password']");
    const phoneInput = form.querySelector("input[name='phone']");
  
    const errorMessages = {
        firstName: "First name is required.",
        lastName: "Last name is required.",
        email: "Please enter a valid email address.",
        password: "Password must be at least 6 characters.",
        confirmPassword: "Passwords do not match.",
        phone: "Please enter a valid 10-digit phone number."
    };
  
    firstNameInput.addEventListener("input", function () {
        validateField(firstNameInput, "firstName");
    });
  
    lastNameInput.addEventListener("input", function () {
        validateField(lastNameInput, "lastName");
    });
  
    emailInput.addEventListener("input", function () {
        validateField(emailInput, "email");
    });
  
    passwordInput.addEventListener("input", function () {
        validateField(passwordInput, "password");
    });
  
    confirmPasswordInput.addEventListener("input", function () {
        validateField(confirmPasswordInput, "confirmPassword");
    });
  
    phoneInput.addEventListener("input", function () {
        validateField(phoneInput, "phone");
    });
  
    function validateField(input, fieldName) {
        const value = input.value.trim();
        let errorMessage = "";
  
        function validatePhoneNumber(phone) {
            const phoneRegex = /^\d{10}$/;
            return phoneRegex.test(phone);
        }
  
        if (fieldName === "firstName" || fieldName === "lastName") {
            if (value === "") {
                errorMessage = errorMessages[fieldName];
            }
        }
  
        if (fieldName === "email") {
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (value === "") {
                errorMessage = errorMessages.email;
            } else if (!emailPattern.test(value)) {
                errorMessage = "Invalid email address.";
            }
        }
  
        if (fieldName === "password") {
            if (value.length < 6) {
                errorMessage = errorMessages.password;
            }
        }
  
        if (fieldName === "confirmPassword") {
            if (value !== passwordInput.value) {
                errorMessage = errorMessages.confirmPassword;
            }
        }
  
        if (fieldName === "phone") {
            if (!validatePhoneNumber(value)) {
                errorMessage = errorMessages.phone;
            }
        }
  
        if (errorMessage) {
            input.style.borderColor = "red";
        } else {
            input.style.borderColor = "initial";
        }
    }
  });
  