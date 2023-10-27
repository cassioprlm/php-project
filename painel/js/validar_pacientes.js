document.addEventListener("DOMContentLoaded", function () {

    const formulario = document.getElementById("formulario-pacientes");
    const nome = document.querySelector('input[name="nome"]');
    const idade = document.querySelector('input[name="idade"]');
    const peso = document.querySelector('input[name="peso"]');
    const altura = document.querySelector('input[name="altura"]');
    const email = document.querySelector('input[name="email"]');


    document.getElementById("cadastrar-button").addEventListener("click", function () {
        console.log(nome.value, idade.value, peso.value, altura.value);
        

        if (!validateName(nome.value)) {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Informe um Nome Correto [Nome Sobrenome]'
            })
            nome.focus();
            event.preventDefault();
        }

        else if (!validateIdade(idade.value)) {
            Swal.fire({
                icon: 'error',
                text: 'Informe uma Idade Válida'
            })
            idade.focus();
            event.preventDefault();
        }
        else if (!validatePeso(peso.value)) {
            Swal.fire({
                icon: 'error',
                text: 'Informe um Peso Válido'
            })
            peso.focus();
            event.preventDefault();
            
        }
        else if (!validateAltura(altura.value)) {
            Swal.fire({
                icon: 'error',
                text: 'Informe uma Altura Válida'
            })
            altura.focus();
            event.preventDefault();
        }else if (!validateEmail(email.value)) {
            Swal.fire({
                icon: 'error',
                text: 'Informe um email válido'
            })
            email.focus();
            event.preventDefault();
        }
        else{
            let formData = new FormData();
            formData.append("nome", nome.value);
            formData.append("idade", idade.value);
            formData.append("peso", peso.value);
            formData.append("altura", altura.value);
            formData.append("email", email.value);

            fetch("/painel/database/database_pacientes.php", {
                method: 'POST',
                body: formData,
            })
                .then(
                    response => response.json()
                )
                .then(data => {
                    // Manipule a resposta do servidor
                    if (data.success === false) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Já Existe um Paciente com esse Email Cadastrado'
                        })
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Paciente cadastrado com sucesso',
                            showConfirmButton: false,
                            timer: 1000
                        })
                    }
                })
                .catch(error => {
                    console.error("Erro na solicitação: " + error);
                });
        }


        function validateName(nome){
            const regex = /\b[A-Za-zÀ-ú][A-Za-zÀ-ú]+,?\s[A-Za-zÀ-ú][A-Za-zÀ-ú]{2,19}\b/gi;
            return regex.test(nome);
        }
        function validateIdade(idade){
            const regex = /^(1[0-1][0-9]|120|[1-9][0-9]|[1-9])$/;
            return regex.test(idade);

        }
        function validatePeso(peso){
            const regex = /^\d+(\.\d{1})?$/;
            return regex.test(peso);
        }
        function validateAltura(altura){
            const regex = /^(1(\.[0-9]{1,2})?|0(\.[0-9]{1,2})?|0?(\.[0-9]{1,2})?)$/;
            return regex.test(altura);
        }
        function validateEmail(email){
            const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return regex.test(email);
        }
    });
    
});