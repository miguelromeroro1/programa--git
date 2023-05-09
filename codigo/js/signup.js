const signupform = document.querySelector("#signupform");
signupform.addEventListener("submit", (event) => {
    event.preventDefault();
    const name= document.querySelector('#name') 
    const emailInput = document.querySelector('#email') 
    const password= document.querySelector('#password') 

    const users = JSON.parse(localStorage.getItem('users')) || [];

    const searchEmail = emailInput.value;
    const isUserRegistered = users.find(user => user.email === searchEmail);

    if (isUserRegistered) {
        alert('El usuario ya está registrado.');
    } else {
        const nameValue = name.value;
        const passwordValue = password.value;

        users.push({name: nameValue, email: searchEmail, password: passwordValue});
        localStorage.setItem('users', JSON.stringify(users));
        alert('Registro exitoso.');
    }window.location.href= 'login.html'
})
