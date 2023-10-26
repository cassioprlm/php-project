<?php
    require_once('sessao.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulário com Bulma</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <?php require_once('header.php');?>
    <div>
        <h1 class="title is-1 has-text-centered" style="margin-top:5vh;">Cadastre um Paciente</h1>
    </div>
    <div class="container justify-content-center align-items-center" style="margin-top:5vh;">
        <form class="form-width-reduced" style="margin-left: 35%;">
            <div class="field">
                <label class="label">Nome</label>
                <div class="control">
                    <input class="input" type="text" name="nome" id="nome" placeholder="Seu Nome">
                </div>
            </div>

            <div class="field">
                <label class="label">Idade</label>
                <div class="control">
                    <input class="input" type="number" name="idade" id="idade" placeholder="Sua Idade">
                </div>
            </div>

            <div class="field">
                <label class="label">Peso</label>
                <div class="control">
                    <input class="input" type="number" name="peso" id="peso" placeholder="Seu Peso">
                </div>
            </div>

            <div class="field">
                <label class="label">Altura</label>
                <div class="control">
                    <input class="input" type="number" name="altura" id="altura" placeholder="Sua Altura">
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <div class="buttons">
                        <a href="" class="button is-primary is-rounded">
                            <strong>Cadastrar</strong>
                        </a>
                    </div>
                </div>
                <div class="control">
                    <div class="buttons">
                        <a href="home.php" class="button is-primary is-rounded">
                            <strong>Voltar</strong>
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bulma@0.9.2/js/bulma.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
