
    document.getElementById("formulario-login").addEventListener("submit", function(event) {
    event.preventDefault(); 

        const email = document.querySelector('input[name="email"]');
        const password = document.querySelector('input[name="password"]');
        
        console.log(email.value)
        console.log(password.value)

        var formData = new FormData();
        formData.append("email", email.value);
        formData.append("password", password.value);

        fetch("/php/login.php", {
            method: 'POST',
            body: formData,  
        })
        .then(
            response => response.json()
        )
        .then(data => {
            // Manipule a resposta do servidor
            if(data.success === false){
                Swal.fire({
                    icon: 'error',
                    text: 'Email ou senha incorretos'
                })
            
            }else{
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Login realizado com sucesso',
                    showConfirmButton: false,
                    timer: 1000
                  })
                  setTimeout(function(){
                    window.location.href = "../painel/logado.php";
                }, 1000);
            }
        })
        .catch(error => {
            // Trate erros de rede ou outros erros
            console.error("Erro na solicitação: " + error);
         
    });

});
