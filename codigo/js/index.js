const user =  JSON.parse(localStorage.getItem('login_success')) || false
if(!user){
    window.location.href = 'login.html'
}
const logout = document.querySelector("#logout");

logout.addEventListener('click', ()=>{
    alert('bienvenido a nolonecesito.com')
    localStorage.removeItem('login_succes')
    window.location.href = 'login.html'
})