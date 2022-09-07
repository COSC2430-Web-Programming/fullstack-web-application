function handleOrder() {
    const currentUrl = (window.location.href);
    const nextURL = currentUrl.slice(0, 55);

    // Replace the URL without reloading
    window.history.replaceState({}, document.title, nextURL);
}

handleOrder();