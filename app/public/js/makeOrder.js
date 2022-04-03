async function makeOrder() {
    const { status } = await sendPostRequest('/requests/makeOrder.php');
    console.log(status);
    if (status === 'success') {
        alert('Ваш заказ успешно оформлен, ожидайте подтверждения от менеджера');
        window.location = '/catalog.php'
    } else {
        alert('При оформлении заказа возникла ошибка. Попробуйте позже');
    }
}

const orderButton = document.querySelector('#order-button');
orderButton.addEventListener('click', makeOrder);
