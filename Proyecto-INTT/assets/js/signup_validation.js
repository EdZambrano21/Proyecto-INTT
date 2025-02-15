document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
});

function validarFormulario(evento) {

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
    if (password.length > 16) {
      alert('La clave no puede contener más de 16 carácteres');
      evento.preventDefault();
      return;
    }
    var password2 = document.getElementById('password2').value;
    if (password.length > 16) {
        alert('La clave no puede contener más de 16 carácteres');
        evento.preventDefault();
        return;
    }
    if (password2 != password){
        alert('Las claves deben ser iguales');
        evento.preventDefault();
        return;
    }
    this.submit();
}

const showPasswordCheckbox1 = document.querySelector("#show-password-1");
const passwordInput1 = document.querySelector("#password");

showPasswordCheckbox1.addEventListener("change", () => {
  passwordInput1.type = showPasswordCheckbox1.checked ? "text" : "password";
});

const showPasswordCheckbox2 = document.querySelector("#show-password-2");
const passwordInput2 = document.querySelector("#password2");

showPasswordCheckbox2.addEventListener("change", () => {
  passwordInput2.type = showPasswordCheckbox2.checked ? "text" : "password";
});
