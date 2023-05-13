const signupform = document.querySelector("#signupform");

// Manejador de eventos para el envío del formulario
signupform.addEventListener("submit", (event) => {
    event.preventDefault();

    // Obtener valores de los campos del formulario
    const nameInput = document.querySelector('#name') 
    const emailInput = document.querySelector('#email') 
    const passwordInput = document.querySelector('#password') 

    // Obtener usuarios del almacenamiento local o establecer un array vacío si no hay usuarios
    const users = JSON.parse(localStorage.getItem('users')) || [];

    // Verificar si el correo electrónico ya está registrado
    const searchEmail = emailInput.value;
    const isUserRegistered = users.find(user => user.email === searchEmail);

    // Si el correo electrónico ya está registrado, mostrar una alerta
    if (isUserRegistered) {
        alert('El usuario ya está registrado.');
    } else {
        // Si el correo electrónico no está registrado, agregar el nuevo usuario al array y actualizar el almacenamiento local
        const nameValue = nameInput.value;
        const passwordValue = passwordInput.value;

        users.push({name: nameValue, email: searchEmail, password: passwordValue});
        localStorage.setItem('users', JSON.stringify(users));
        alert('Registro exitoso.');
    }

    // Redirigir a la página de inicio de sesión después de registrar un nuevo usuario
    window.location.href= 'login.html'
})
