async function deleteGoodFromCart(evt) {
    const requestData = evt.target.dataset;
    const { status } = await sendPostRequest('/requests/deleteOrder.php', requestData);
    console.log(status);
    window.location.reload();
}

const deleteOrderButtons = document.querySelectorAll('.delete-order-button');
deleteOrderButtons.forEach(button => button.addEventListener('click', deleteGoodFromCart));
