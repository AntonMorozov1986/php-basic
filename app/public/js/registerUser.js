async function registerUser(evt) {
    evt.preventDefault();
    const form = new FormData(evt.target);
    const hasUserData = form.get('login') !== '' && form.get('pass') !== '';
    if (!hasUserData) {
        alert('Логин и Пароль обязательны для заполнения');
        return;
    }
    const { status } = await sendFormRequest('/requests/registerUser.php', form);
    if (status === 'success') {
        window.location = '/catalog.php'
    } else {
        alert('возникла ошибка, попробуйте позже');
    }
}

const registrationForm = document.querySelector('#registration-form');
registrationForm.addEventListener('submit', registerUser);
