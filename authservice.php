<?php
require_once 'etinty/docente.php';
require_once 'dao/docenteDAO.php';
$type = filter_input(INPUT_POST, "type");

if($type === "register") {
    // Lógica de registro do usuário
    $new_nome = filter_input(INPUT_POST, "new_nome");
    $new_email = filter_input(INPUT_POST, "new_email", FILTER_SANITIZE_EMAIL);
}

?>