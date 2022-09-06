function orderProducts() {
    // Get data from local storage
    let cartList = localStorage.getItem("productInCart")
    console.log('cL', cartList)
    cartList = JSON.parse(cartList)

    // Convert object to array of object
    var arrayOfProducts = Object.keys(cartList).map((key) => [(key), cartList[key]]);

    // Write data to the URL
    console.log('check array of products', arrayOfProducts);
    
    var url = "products=";
    const products = [];

    // Create an array as format to generate a URL
    for (let i = 0; i < arrayOfProducts.length; i++) {
        let product = arrayOfProducts[i][1];
        products.push(product);
    }

    products.forEach(function(e) {
        url += String(e.product_id) + "[" + String(e.incart) + "]" + ",";
    })

    url = url.slice(0, -1);
    console.log('url',url);

    // Delete the local storage in cart

    window.location.replace("http://localhost:2222/app/pages/customer/orderPage.php?" + url);

    return 0;
}