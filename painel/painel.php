<?php
    require_once('php/sessao.php');
?>

<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="light" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GrumpyCat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="style.css">

</head>
    <?php require_once('php/header.php');?>

<body style="background-color: #f4f4f4;">
    <div>
        <h1 class="title is-1 has-text-centered">Painel de Controle</h1>
    </div>
    <div class="container d-flex justify-content-center align-items-center" style="height: 40vh;">
        <div class="field has-addons">
            <div class="control">
                <input class="input is-success is-rounded is-large" type="text" placeholder="Buscar Paciente">
            </div>
            <div class="control">
                <a class="button is-primary is-rounded is-large">Pesquisar</a>
            </div>
        </div>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bulma@0.9.2/js/bulma.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>