
let product = {
        name: 'Hamburger',
        price: 100,
        incart: 0,
}

const add_cart = document.getElementById('add-cart')

add_cart.addEventListener('click',() =>{
    cartNumber(product)
})


//Function to keep the number of item in the cart every time reload
function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers')

    if(productNumbers){
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

// Function to calculate the number of produts in the cart and add to local storage
function cartNumber(product) {
    console.log("The product is clicked", product)
    let productNumbers = localStorage.getItem('cartNumbers')
    productNumbers = parseInt(productNumbers)

    if(productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers + 1)
        document.querySelector('.cart span').textContent = productNumbers + 1
    }else{
        localStorage.setItem('cartNumbers', 1)
        document.querySelector('.cart span').textContent = 1
    }
    
    setItem(product)
    
}

function setItem(product){
    let cartProduct = JSON.parse(localStorage.getItem('productInCart'))
    console.log(cartProduct)

    if(cartProduct != null){
        cartProduct[product.name].incart += 1
    }else{
        product.incart = 1
        cartProduct = {
            [product.name]: product
        }

    }

    localStorage.setItem('productInCart',JSON.stringify(cartProduct))
}

onLoadCartNumbers()