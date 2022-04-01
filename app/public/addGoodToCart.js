async function sendPostRequest(data) {
    const settings = {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data),
    }
    const response = await fetch('/addToCart.php', settings)
    return response.json();
}

async function addGoodToCart(evt) {
    const requestData = evt.target.dataset;
    console.log('goodId', requestData);
    const data = await sendPostRequest(requestData);
    console.log('response', data);
}

const buyButtons = document.querySelectorAll('.good__buy-button');
buyButtons.forEach(button => button.addEventListener('click', addGoodToCart));
console.log(buyButtons);
