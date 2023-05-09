const loginform = document.querySelector("#loginform");
loginform.addEventListener("submit", (event) => {
    event.preventDefault();
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;
    const users = JSON.parse(localStorage.getItem('users')) || [];
    const validuser = users.find(user => user.email === email && user.password === password);

    if (!validuser) {
        return alert('Usuario y/o contraseña incorrectos!');
    }
    alert(`Bienvenido ${validuser.name}!`);
    localStorage.setItem('login_success', JSON.stringify(validuser))
    window.location.href = 'index.html';
});
