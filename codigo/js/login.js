// Obtenemos el formulario de inicio de sesión
const loginform = document.querySelector("#loginform");

// Agregamos un escucha de eventos al formulario para cuando se envíe
loginform.addEventListener("submit", (event) => {
    event.preventDefault(); // Prevenimos que el formulario se envíe por defecto

    // Obtenemos los valores de los campos de correo electrónico y contraseña
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;

    // Obtenemos la lista de usuarios almacenados en el almacenamiento local (localStorage)
    const users = JSON.parse(localStorage.getItem('users')) || [];

    // Buscamos si existe un usuario válido con el correo electrónico y contraseña proporcionados
    const validuser = users.find(user => user.email === email && user.password === password);

    // Si no se encuentra un usuario válido, mostramos una alerta al usuario y salimos de la función
    if (!validuser) {
        return alert('Usuario y/o contraseña incorrectos!');
    }

    // Si se encuentra un usuario válido, mostramos un mensaje de bienvenida y lo almacenamos en localStorage
    alert(`Bienvenido ${validuser.name}!`);
    localStorage.setItem('login_success', JSON.stringify(validuser))

    // Redireccionamos al usuario a la página principal (index.html)
    window.location.href = 'index.html';
});
