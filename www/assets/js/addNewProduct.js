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
    const productNameError = document.getElementById('productNameError')
    const productPriceError = document.getElementById('productPriceError')
    const productDescriptionError = document.getElementById('productDescriptionError')
    const success_message = document.getElementById('add_success')

    let productNameErrorMessage = []
    let productPriceErrorMessage = []
    let productDescriptionErrorMessage = []
    let errorCount = 0
    console.log(productNameError)


    if(productNameVal.length < 10 || productNameVal.length >20 ){
        productNameErrorMessage.push('The product name must have length from 10 to 20 characters')
        errorCount++;
    }
    if(productPriceVal < 0 ){
        productPriceErrorMessage.push("The product price must be positive")
        errorCount++;
    }

    if (productDescriptionVal.length > 500){
        productDescriptionErrorMessage.push("The product description length must be smaller than 500 characters")
        errorCount++;
    }

    if (errorCount > 0){
        e.preventDefault()
        productNameError.innerText = productNameErrorMessage.join('\n')
        productPriceError.innerText = productPriceErrorMessage.join('\n')
        productDescriptionError.innerText = productPriceErrorMessage.join('\n')
    }else if(errorCount == 0){
        success_message.innerText = "Add Product Successfully"
    }
}
)