function cartShow(){
    let cartList = localStorage.getItem("productInCart")
    cartList = JSON.parse(cartList)
    let productContainer = document.querySelector(".products")
    let final_price = 0

    Object.values(cartList).map((item) => {
        final_price += (item.incart * item.price)
    })

    console.log(final_price)

    if(cartList && productContainer){
        productContainer.innerHTML = ''
        Object.values(cartList).map((item) => {
            productContainer.innerHTML += `
            <tr class='align-middle'>
                <td>
                    <img src="${item.image}" alt="product_img" class='cart-img'>
                    <span class='fw-bold'>${item.name}</span>                
                </td>
                <td>
                    ${item.incart}
                </td>
                <td>
                    ${item.price * item.incart}
                </td>
            </tr>
              
            `
        })
        productContainer.innerHTML += `
        <tfoot> 
            <tr>
                <td class='fw-bold'>
                    TOTAL              
                </td>
                <td>
                                   
                </td>
                <td class='fw-bold'>
                    ${final_price}             
                </td>
                

            </tr>
        </tfoot>
        `
    }
    console.log(cartList)
}

cartShow()