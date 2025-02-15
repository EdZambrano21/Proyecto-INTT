document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
  });
  
  function validarFormulario(evento){

    var emailInput = document.getElementById('email');
    var emailValue = emailInput.value.trim();

    // Verificar si el campo de correo electrónico no está vacío
    if (emailValue === '') {
        alert('Por favor, ingresa tu correo electrónico.');
        evento.preventDefault(); // Evitar que el formulario se envíe
        return;
    }

    // Verificar si el campo de correo electrónico contiene "@" y ".com"
    if (!emailValue.includes('@') || !emailValue.includes('.com')) {
        alert('Verifica que el correo electrónico que contenga el "@" o ".com".');
        evento.preventDefault(); // Evitar que el formulario se envíe
        return;
    }
  
    var password = document.getElementById('password').value;
    if(password.length == ''){
        alert('No ha ingresado contraseña');
        evento.preventDefault(); // Evitar que el formulario se envíe
        return;
    } 
    if(password.length > 16){
        alert('Contraseña maximo de 16 caracteres');
        evento.preventDefault(); // Evitar que el formulario se envíe
    }
    this.submit();
  }
  
const showPasswordCheckbox1 = document.querySelector("#vercon");
const passwordInput1 = document.querySelector("#password");

showPasswordCheckbox1.addEventListener("change", () => {
  passwordInput1.type = showPasswordCheckbox1.checked ? "text" : "password";
});