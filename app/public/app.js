// functionality to trigger login or sign up

// Get forms
    let loginForm = document.querySelector('#signin');
    let signupForm = document.querySelector('#signup');
    let passError = document.getElementById('pass_msg');
    let nameError = document.getElementById('error_msg');
    let signupSuccess = document.getElementById('success_msg');

// Get Form-links
    let loginLink = document.querySelector('#loginLink');
    let signupLink = document.querySelector('#signupLink');

if (signupLink != null) {
    signupLink.addEventListener('click', () => {
        nameError.innerText = "";
        signupSuccess.innerText = "";
        signupForm.style.display = "flex";
        loginForm.style.display = "";
        nameError.style.display = "none";
        signupSuccess.style.display = "none";
        passError.style.display = "none";


    });
}

if (loginLink != null) {
    loginLink.addEventListener('click', () => {
        nameError.innerText = "";
        signupSuccess.innerText = "";
        loginForm.style.display = "flex";
        signupForm.style.display = "";
        nameError.style.display = "none";
        signupSuccess.style.display = "none";
        passError.style.display = "none";
    });
}




// Functionality for password validation

// Password- and confirmation inputs
    let password = document.getElementById('pass_signup');
    let confirm_password = document.getElementById('pass_confirm');
    let submit = document.getElementById('signup_submit');
 

    function validatePassword() {
        if (password.value && confirm_password.value) {
            if (password.value != confirm_password.value) {
                submit.disabled = true;
                passError.style.display = "block";
                passError.innerText = "Passwords don't match!";
            } else {
                submit.disabled = false;
                passError.style.display = "none";
                passError.innerText = "";
            }
        }

    }

    if (password != null && confirm_password != null) {
        signupForm.addEventListener("keyup", validatePassword);
    }

