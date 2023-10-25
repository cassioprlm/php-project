document.addEventListener("DOMContentLoaded", function () {
    const formulario = document.getElementById("formulario");
    const senhaInput = document.querySelector('input[name="senha"]');
    const confirmarSenha = document.querySelector('input[name="confirmar_senha"]');
    const nomeInput = formulario.querySelector('input[name="nome_usuario"]');
    const emailInput = formulario.querySelector('input[name="email"]');

    formulario.addEventListener("submit", function(event) {
        if (!validateNome(nomeInput.value)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Informe um Nome'
            })
            nomeInput.focus();
            event.preventDefault();
            
        }

        else if (!validateEmail(emailInput.value)) {
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
        else if(!validateConfSenha(confirmarSenha.value)){
            Swal.fire({
                icon: 'error',
                text: 'A senha não pode estar em branco'
            })
            event.preventDefault();
            
        }
       else if(!validateSenha(senhaInput.value, confirmarSenha.value)){
    
            Swal.fire({
                icon: 'error',
                text: 'As senhas não coincidem'
            })
            event.preventDefault();
            
        }else{ 
            
            var formData = new FormData();
            formData.append("nome_usuario", nomeInput.value);
            formData.append("email", emailInput.value);
            formData.append("senha", senhaInput.value);
            formData.append("confirmar_senha", confirmarSenha.value);
    
            fetch("/php/database/cadastro.php", {
                method: 'POST',
                body: formData,  
            })
            .then(
                response => response.json()
            )
            .then(data => {
                // Manipule a resposta do servidor
                console.log(data.success)
                if(data.success === true){ 
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Cadastro Realizado Com Sucesso',
                        showConfirmButton: false,
                        timer: 1000
                        });
                        setTimeout(function(){
                            window.location.href = "../login.html";
                    }, 1000);
  
                }else{
                    Swal.fire({
                        icon: 'error',
                        text: 'Email já Cadastrado, tente outro email'
                    })
                    
                }
        
            })
            
        }
        event.preventDefault();
    });

    function validateNome(nome) {
        return nome.length > 0;
    }

    function validateEmail(email) {
        // Use uma expressão regular para validar o email
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }

    function validateLenghtSenha(senha){
        return senha.length > 0;
    }

    function validateConfSenha(confirmaSenha){
        return confirmaSenha.length > 0;
    }

    function validateSenha(senha, confSenha){
        return senha === confSenha;
    }


    /// Aqui é a validação do cadastro de usuarios

    
    // Finaliza aqui
});

