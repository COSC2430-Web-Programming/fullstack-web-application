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
}