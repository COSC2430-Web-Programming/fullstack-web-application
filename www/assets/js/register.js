/* Register Validation For Client-side */
const username = document.getElementById('username')
const password = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')
const role = document.getElementById('userRole');

form.addEventListener('submit', (e) => {
    const usernameVal = username.value
    const passwordVal = password.value
    const roleVal = role.value;
    let errorMessages = []

    // Validate constraints
    // username is not null
    if (usernameVal == null || usernameVal === '') {
        errorMessages.push("> Please input username.")
    }

    // username contains only letters and digits
    const usernamePat = /^[a-zA-Z0-9]*$/
    if (!(usernamePat.test(usernameVal))) {
        errorMessages.push("> Please input the username which contains only letters and digits.")
    }

    // username's length from 8 to 15 chars
    if (!(8 <= usernameVal.length && usernameVal.length <= 15)) {
        errorMessages.push("> Username must have a length from 8 to 15 characters.")
    }

    // username is unique --> already checked in PHP

    // password: contains at least one upper case letter, 
    // at least one lower case letter, 
    // at least one digit, 
    // at least one special letter in the set !@#$%^&*, NO other kind of characters, 
    const passwordPat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,20})/
    if (!(passwordPat.test(passwordVal))) {
        if (!(/^(?=.*[a-z])/.test(passwordVal))) {
            errorMessages.push("> Password must contain at least one lower case letter.")
        }
        if (!(/^(?=.*[A-Z])/.test(passwordVal))) {
            errorMessages.push("> Password must contain at least one upper case letter.")
        }
        if (!(/^(?=.*[0-9])/.test(passwordVal))) {
            errorMessages.push("> Password must contain at least one digit.")
        }
        if (!(/^(?=.*[!@#\$%\^&\*])/.test(passwordVal))) {
            errorMessages.push("> Password must contain at least one special letter in the set !@#$%^&*.")
        }
        if (!(8 <= passwordVal.length && passwordVal.length <= 20)) {
            errorMessages.push("> Password must have a length from 8 to 20 characters.")
        }
    }

    // other fields
    // vendor
    if (roleVal === 'vendor') {
        const bussinessNameVal = document.getElementById('businessName').value
        const businessAddressVal = document.getElementById('businessAddress').value
        if (!(bussinessNameVal.length >= 5)) {
            errorMessages.push("> Business name must have a minimum length of 5 characters.")
        }
        if (!(businessAddressVal.length >= 5)) {
            errorMessages.push("> Business address must have a minimum length of 5 characters.")
        }
    }

    if (errorMessages.length > 0) {
        e.preventDefault()
        errorElement.innerText = errorMessages.join('\n')
    }

})