async function getCartAmount() {
    const response = await sendGetRequest('/requests/getGoodsAmountInCart.php');
    if (response) {
        return response.amount;
    } else {
        return 0;
    }
}

async function setCartAmount() {
    const cartAmount = await getCartAmount();
    const cartAmountEl = document.querySelector('#cart-amount');
    cartAmountEl.textContent = cartAmount;
}

setCartAmount();
