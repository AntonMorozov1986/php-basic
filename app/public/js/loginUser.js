async function loginUser(evt) {
    evt.preventDefault();
    console.log(evt)
    const form = new FormData(evt.target);
    const hasUserData = form.get('login') !== '' && form.get('pass') !== '';
    console.log(hasUserData);
    console.log(form.get('login'));
    console.log(form.get('pass'));
    if (!hasUserData) {
        alert('Логин и Пароль обязательны для заполнения');
        return;
    }
    const { status } = await sendFormRequest('/requests/loginUser.php', form);
    if (status === 'success') {
        window.location = '/catalog.php'
    } else {
        alert('Неверный логин или пароль')
    }
}

const loginForm = document.querySelector('#login-form');
loginForm.addEventListener('submit', loginUser);
