//regs
var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords do not match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    confirm_password.onkeyup = validatePassword;
