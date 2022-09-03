const productName = document.getElementById('productName')
const productPrice = document.getElementById('productPrice')
const productDescription = document.getElementById('productDescription')
const productImg = document.getElementById('productImg')
let product = {
        name: productName.innerHTML,
        price: Number(productPrice.innerHTML),
        image: productImg.src,
        incart: 0,
}

console.log("Image", productImg.src)

console.log("product", product)

const add_cart = document.getElementById('add-cart')

add_cart.addEventListener('click',() =>{
    cartNumber(product)
    totalCost(product)
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

        if(cartProduct[product.name] == undefined){
            cartProduct = {
                ...cartProduct,
                [product.name]: product
            }
        }
        cartProduct[product.name].incart += 1
    }else{
        product.incart = 1
        cartProduct = {
            [product.name]: product
        }

    }

    localStorage.setItem('productInCart',JSON.stringify(cartProduct))
}

function totalCost(product){
    // console.log("the product price is", product.price)
    let cartCost = localStorage.getItem('totalCost')

    if(cartCost != null){
        cartCost = parseInt(cartCost)
        localStorage.setItem('totalCost', cartCost + product.price);
    }else{
        localStorage.setItem("totalCost", product.price)
    }

}

function cartShow(){
    let cartList = localStorage.getItem("productInCart")
    cartList = JSON.parse(cartList)

    console.log(cartList)
}

onLoadCartNumbers()
cartShow()