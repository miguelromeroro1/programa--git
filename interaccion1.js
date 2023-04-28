// Seleccionar el formulario y agregar un evento submit
const formulario = document.getElementById("registro-form");
formulario.addEventListener("submit", function(event) {
  // Prevenir que la página se recargue al enviar el formulario
  event.preventDefault();

  // Obtener los valores de los campos del formulario
  const nombre = document.getElementById("nombre").value;
  const cedula = document.getElementById("cedula").value;
  const telefono = document.getElementById("telefono").value;
  const email = document.getElementById("email").value;

  // Realizar las validaciones necesarias
  if (nombre.trim() === "") {
    alert("Por favor ingrese su nombre");
    return;
  }

  if (cedula.trim() === "") {
    alert("Por favor ingrese su cédula");
    return;
  }

  if (telefono.trim() === "") {
    alert("Por favor ingrese su teléfono");
    return;
  }

  if (email.trim() === "") {
    alert("Por favor ingrese su email");
    return;
  }

  // Si todas las validaciones son correctas, hacer algo con los datos del usuario
  alert(`¡Gracias por registrarse, ${nombre}!`);
});

