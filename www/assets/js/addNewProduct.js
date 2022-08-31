/*Add Product Validation for the Client-side */
const productName = document.getElementById('productName')
const productPrice = document.getElementById('price')
const productDescription = document.getElementById('description')
const errorElement = document.querySelector('.error')
const form = document.getElementById('form')

form.addEventListener('submit', (e) =>{
    // Get the values from the inputs
    const productNameVal = productName.value.trim();
    const productPriceVal = productPrice.value.trim();
    const productDescriptionVal = productDescription.value.trim();

    if(productNameVal.length < 10 || productNameVal.length >20 ){
        setErrorFor(productName,'The product name must have length from 10 to 20 characters')
    }else{
        setSuccessFor(productName)
    }

    if(productPriceVal < 0 ){
        errorMessages.push("The product price must be positive")
    }

    if (productDescriptionVal.length > 500){
        errorMessages.pushI("The product description length must be smaller than 500 characters")
    }

    if (errorMessages.length > 0){
        e.preventDefault()
        errorElement.innerText = errorMessages.join('\n')
    }
}
)

