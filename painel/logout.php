<?php
// Inicie ou retome a sessão
session_start();

// Destrua a sessão atual
session_destroy();

// Redirecione o usuário para a página de login (ou qualquer outra página apropriada)
header("Location: ../login.html");
exit();
?>