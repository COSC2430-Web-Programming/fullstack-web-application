function handleOrder() {
  const currentUrl = window.location.href;
  const nextUrl = currentUrl.slice(0, 41) + "cartPage.php";

  // Replace the URL without reloading
  // window.history.replaceState({}, document.title, currentUrl + "orderPage.php?" + url);

  window.location.replace(nextUrl);
}

handleOrder();
