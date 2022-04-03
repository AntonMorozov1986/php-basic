async function addGoodToCart(evt) {
    const requestData = evt.target.dataset;
    await sendPostRequest('/requests/addGoodToCart.php', requestData);
    setCartAmount();
}

const buyButtons = document.querySelectorAll('.good__buy-button');
buyButtons.forEach(button => button.addEventListener('click', addGoodToCart));
console.log(buyButtons);
