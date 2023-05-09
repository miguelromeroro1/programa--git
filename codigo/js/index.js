// Verificar si el usuario está autenticado
const user =  JSON.parse(localStorage.getItem('login_success')) || false;

// Redirigir al usuario a la página de inicio de sesión si no está autenticado
if(!user){
    window.location.href = 'login.html';
}

// Obtener el botón de cierre de sesión
const logout = document.querySelector("#logout");

// Agregar un controlador de eventos al botón de cierre de sesión para borrar la sesión del usuario
logout.addEventListener('click', ()=>{
    alert('bienvenido a nolonecesito.com');
    localStorage.removeItem('login_success');
    window.location.href = 'login.html';
});
