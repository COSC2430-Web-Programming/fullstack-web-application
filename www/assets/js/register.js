/* Register Validation For Client-side */
const username = document.getElementById('username')
const password = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')
const role = document.getElementById('userRole');
const usernameErrorElement = document.getElementById('usernameError')
const passwordErrorElement = document.getElementById('passwordError')

form.addEventListener('submit', (e) => {
    const usernameVal = username.value
    const passwordVal = password.value
    const roleVal = role.value

    let errorCount = 0
    let usernameErrorMessages = []
    let passwordErrorMessages = []
    // vendor
    let businessNameErrorMessages = []
    let businessAddressErrorMessages = []
    // customer
    let customerNameErrorMessages = []
    let customerAddressErrorMessages = []

    // Validate constraints
    // username is not null
    if (usernameVal == null || usernameVal === '') {
        usernameErrorMessages.push("Username must not be null.")
        errorCount++;
    }

    // username contains only letters and digits
    const usernamePat = /^[a-zA-Z0-9]*$/
    if (!(usernamePat.test(usernameVal))) {
        usernameErrorMessages.push("Username must contain only letters and digits.")
        errorCount++;
    }

    // username's length from 8 to 15 chars
    if (!(8 <= usernameVal.length && usernameVal.length <= 15)) {
        usernameErrorMessages.push("Username must have a length from 8 to 15 characters.")
        errorCount++;
    }

    // username is unique --> already checked in PHP

    // password: contains at least one upper case letter, 
    // at least one lower case letter, 
    // at least one digit, 
    // at least one special letter in the set !@#$%^&*, NO other kind of characters
    const passwordPat = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,20})/
    if (!(passwordPat.test(passwordVal))) {
        if (!(/^(?=.*[a-z])/.test(passwordVal))) {
            passwordErrorMessages.push("Password must contain at least one lower case letter.")
        }
        if (!(/^(?=.*[A-Z])/.test(passwordVal))) {
            passwordErrorMessages.push("Password must contain at least one upper case letter.")
        }
        if (!(/^(?=.*[0-9])/.test(passwordVal))) {
            passwordErrorMessages.push("Password must contain at least one digit.")
        }
        if (!(/^(?=.*[!@#\$%\^&\*])/.test(passwordVal))) {
            passwordErrorMessages.push("Password must contain at least one special letter in the set !@#$%^&*.")
        }
        errorCount++;
    }
    if (!(8 <= passwordVal.length && passwordVal.length <= 20)) {
        passwordErrorMessages.push("Password must have a length from 8 to 20 characters.")
        errorCount++;
    }

    // other fields
    // vendor
    if (roleVal === 'vendor') {
        const bussinessNameVal = document.getElementById('businessName').value
        const businessAddressVal = document.getElementById('businessAddress').value
        if (!(bussinessNameVal.length >= 5)) {
            businessNameErrorMessages.push("Business name must have a minimum length of 5 characters.")
            errorCount++;
        }
        if (!(businessAddressVal.length >= 5)) {
            businessAddressErrorMessages.push("Business address must have a minimum length of 5 characters.")
            errorCount++;
        }
    }

    // customer
    if (roleVal === 'customer') {
        const customerNameVal =  document.getElementById('customerName').value
        const customerAddressVal = document.getElementById('address').value

        if (!(customerNameVal.length >= 5)) {
            customerNameErrorMessages.push("Your name must have a minimum length of 5 characters.")
            errorCount++;
        }
        if (!(customerAddressVal.length >= 5)) {
            customerAddressErrorMessages.push("Your address must have a minimum length of 5 characters.")
            errorCount++;
        } 
    }

    if (errorCount > 0) {
        e.preventDefault()
        usernameErrorElement.innerText = usernameErrorMessages.join('\n')
        passwordErrorElement.innerText = passwordErrorMessages.join('\n')

        if (roleVal === 'vendor') {
            const businessNameErrorElement = document.getElementById('businessNameError')
            const businessAddressErrorElement = document.getElementById('businessAddressError')
            businessNameErrorElement.innerText = businessNameErrorMessages.join('\n')
            businessAddressErrorElement.innerText = businessAddressErrorMessages.join('\n')
        }

        if (roleVal === 'customer') {
            const customerNameErrorElement = document.getElementById('customerNameError')
            const customerAddressErrorElement = document.getElementById('customerAddressError')
            customerNameErrorElement.innerText = customerNameErrorMessages.join('\n')
            customerAddressErrorElement.innerText = customerAddressErrorMessages.join('\n')
        }
    }

})

console.log('hello')