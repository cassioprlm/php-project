document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("search").addEventListener("click", function (event) {

        const search = this.value;
        const search_item = document.getElementById("search-item");
        const resultsContainer = document.getElementById("resultados");

        let formData = new FormData();

        formData.append("search", search_item.value);

        if(!validateSearch(search_item.value)){
            Swal.fire({
                icon: 'error',
                text: 'O campo de Busca não pode estar em branco'
            })
            search_item.focus();
            event.preventDefault();
            
        }else{

            fetch('/painel/database/search.php', {
                method: 'POST',
                body: formData,
                Headers: { "Content-Type": "application/json" }
            })
            .then(response => response.json())
            .then(data => {
                if (Array.isArray(data)) {
                    const tabelaContainer = document.getElementById('tabela-container');
                    // Limpe o conteúdo anterior
                    while (tabelaContainer.firstChild) {
                        tabelaContainer.removeChild(tabelaContainer.firstChild);
                    }
                    const tabela = document.createElement('table');
                    tabela.classList.add('min-w-full' ,'bg-white', 'rounded-lg', 'overflow-hidden', 'shadow');
                    // Cabeçalho da tabela 
                    const cabecalho = tabela.createTHead();
                    const cabecalhoRow = cabecalho.insertRow();
                    cabecalhoRow.innerHTML = '<th class="py-2 px-4 bg-gray-300">Email</th><th class="py-2 px-4 bg-gray-300">Nome</th><th class="py-2 px-4 bg-gray-300">Idade</th><th class="py-2 px-4 bg-gray-300">Altura</th><th class="py-2 px-4 bg-gray-300">Peso</th><th class="py-2 px-4 bg-gray-300">IMC</th>';

                    // Corpo da tabela
                    const corpo = tabela.createTBody();
                    // Itere sobre os dados e crie as linhas da tabela
                    data.forEach((paciente) => {
                        const linha = corpo.insertRow();
                        linha.innerHTML = linha.innerHTML = `<td class="py-2 px-4 border-t">${paciente.email}</td><td class="py-2 px-4 border-t">${paciente.nome}</td><td class="py-2 px-4 border-t">${paciente.idade}</td><td class="py-2 px-4 border-t">${paciente.altura}</td><td class="py-2 px-4 border-t">${paciente.peso}</td><td class="py-2 px-4 border-t">${paciente.imc}</td>`;
                        const line = corpo.insertRow();
                    });
                        // Adicione a tabela ao container
                        tabelaContainer.appendChild(tabela);
                } else {
                    console.error('data não é um array.');
                }
                })
            
            .catch(error => {
                console.log(error);
            })
        }

        function validateSearch(searchValue){
            return searchValue.length > 0;
        }

    });
});

