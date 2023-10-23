document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario-login").addEventListener("submit", function(event) {
        
        const emailInput = document.querySelector('input[name="email"]');
        const senhaInput = document.querySelector('input[name="password"]');
        if (!validateEmail(emailInput.value)) {
            Swal.fire({
                icon: 'error',
                text: 'Informe um email válido'
            })
            emailInput.focus();
            event.preventDefault();
        }
        else if(!validateLenghtSenha(senhaInput.value)){
            Swal.fire({
                icon: 'error',
                text: 'A senha não pode estar em branco'
            })
            event.preventDefault();
        }


        function validateEmail(email) {
            // Use uma expressão regular para validar o email
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return emailRegex.test(email);
        }
        function validateLenghtSenha(senha){
            return senha.length > 0;
        }

    });
});