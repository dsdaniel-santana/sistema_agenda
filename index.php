<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda das Salas - Senac Tito </title>
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['date'])) {
    $date_input = $_POST['date'];
    $date = date_create($date_input);
    if ($date) {
        echo date_format($date, "Y/m/d");
    } else {
        echo "Formato inválido";
    }
}
?>

<body>

    <div>
        <h1>Cadastrar</h1>
        <ul>
            <li><a href="cadastro_docente.php">Docente</a></li>
            <li><a href="#">Sub-Area</a></li>
            <li><a href="#">Curso</a></li>
            <li><a href="#">Sala</a></li>
            <li><a href="cadastrar_reserva.php">Reservar Salas</a></li>
        </ul>
    </div>

    <div>
        <h1>Listar</h1>
        <ul>
            
            <li><a href="consultar_reserva.php?action=listar">Consultar Reservas</a></li>
            <li><a href="#">Salas Disponiveis</a></li>
            <li><a href="#">Lista Periodos</a></li>
            
        </ul>
    </div>


    
</body>
</html>