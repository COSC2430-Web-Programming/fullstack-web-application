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
                <td>
                    <button class='delete_btn' onClick="deleteItem('${item.product_id}')">X</button>
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


function deleteItem(name){
    let cartList = localStorage.getItem("productInCart")
    let final_price = 0
    let cartNumbers = 0
    cartList = JSON.parse(cartList)

    // Convert product object to array
    var result = Object.keys(cartList).map((key) => [(key), cartList[key]]);


    // Get the item and splice 
    let i= result.findIndex((item) => name === item[0])
    result.splice(i,1)

    // Convert back to object
    const obj = Object.fromEntries(result);

    Object.values(obj).map((item) => {
        final_price += (item.incart * item.price)
        cartNumbers += item.incart
    })

    //Update to local storage after delete
    localStorage.setItem('productInCart',JSON.stringify(obj))
    localStorage.setItem('totalCost', final_price)
    localStorage.setItem('cartNumbers', cartNumbers)
    cartShow()
}


cartShow()