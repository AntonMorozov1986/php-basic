async function deleteGoodFromCart(evt) {
    const requestData = evt.target.dataset;
    const { status } = await sendPostRequest('/requests/deleteGoodFromCart.php', requestData);
    console.log(status);
    evt.target.parentElement.style.display = 'none';
    window.location.reload();
}

const deleteButtons = document.querySelectorAll('.good__delete-button');
deleteButtons.forEach(button => button.addEventListener('click', deleteGoodFromCart));
console.log(deleteButtons);
