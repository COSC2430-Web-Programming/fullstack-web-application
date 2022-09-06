function orderProducts() {
    let cartList = localStorage.getItem("productInCart") // get data from local storage
    cartList = JSON.parse(cartList)
    var arrayOfProducts = Object.keys(cartList).map((key) => [(key), cartList[key]]); // convert object to array of object

    // Create a URL
    var url = "products=";

    // Add products data to the URL
    const products = [];
    for (let i = 0; i < arrayOfProducts.length; i++) {
        let product = arrayOfProducts[i][1];
        products.push(product);
    }

    products.forEach(function(e) {
        url += String(e.product_id) + "[" + String(e.incart) + "]" + ",";
    })

    url = url.slice(0, -1); // delete the last "," of the URL

    // Add price
    let totalPrice = localStorage.getItem("totalCost");
    url += "&total=" + totalPrice;

    // Delete the local storage in cart
    window.localStorage.clear();

    // Direct the use to the order page
    window.location.replace("http://localhost:2222/app/pages/customer/orderPage.php?" + url);

    return 0;
}