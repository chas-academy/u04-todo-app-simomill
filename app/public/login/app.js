// functionality to trigger login or sign up

// Get forms
    let loginForm = document.querySelector('#signin');
    let signupForm = document.querySelector('#signup');
    let passError = document.getElementById('pass_msg');
    let nameError = document.getElementById('user_msg');

// Get Form-links
    let loginLink = document.querySelector('#loginLink');
    let signupLink = document.querySelector('#signupLink');


    signupLink.addEventListener('click', () => {
        nameError.innerText = "";
        signupForm.style.display = "flex";
        loginForm.style.display = "";

    });

    loginLink.addEventListener('click', () => {
        nameError.innerText = "";
        loginForm.style.display = "flex";
        signupForm.style.display = "";
    });





// Functionality for password validation

// Password- and confirmation inputs
    let password = document.getElementById('pass_signup');
    let confirm_password = document.getElementById('pass_confirm');
    let submit = document.getElementById('signup_submit');
 

    function validatePassword() {
        if (password.value && confirm_password.value) {
            if (password.value != confirm_password.value) {
                submit.disabled = true;
                passError.innerText = "Passwords don't match!";
            } else {
                submit.disabled = false;
                passError.innerText = "";
            }
        }

    }

    signupForm.addEventListener("keyup", validatePassword);




