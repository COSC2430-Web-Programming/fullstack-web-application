/* Register Validation For Client-side */
const form = document.getElementById('form');
const username = document.getElementById('form');
const password = document.getElementById('form');
// Other fiels are required and have a minimum length of 5 characters

form.addEventListener('submit', (e) => {
    e.preventDefault();

    checkInputs();
});

function checkInputs() {
    // get the input values
    const usernameValue = username.value.trim();
    const passwordValue = password.value.trim();

    if (usernameValue === '') {
        // display error and add error class
        setErrorFor(username, 'Username cannot be blank');
    } else {
        setSuccessFor(username);
    }
}

function setErrorFor(input, message) {
    const formControl = input.parentElement; // this is the .form-control class
    const small = formControl.querySelector('small');

    // display error message inside small
    small.innerText = message;

    // add error class
    formControl.className = 'form-control-error';
}