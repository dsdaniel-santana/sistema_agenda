<?php 
require_once 'backend/config/database.php';
require_once 'backend/dao/reservaDAO.php';
require_once 'backend/entity/reserva.php';

$reservaDao = new reservaDAO();

if (isset($_GET['id'])) {
    $reservaid = $_GET['id'];
    $reserva = $reservaDao->getById($reservaid);

    if (!$reserva) {
        echo "Reserva não encontrado.";
        exit;
    }
} else {
    echo "ID da reserva não fornecido.";
    exit;
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reverva PHP</title>
    <!--Bootstrap CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!--Font Awesome CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div class="col-md-6">
        <h2>Editar Reserva</h2>
        <form action="" method="post">
        <input type="hidden" name="type" value="register">
            <div class="mb-3">
                <label for="new_data_incial">Data Inicial</label>
                <!-- <input type="date" class="form-control" id="new_data_incial" name="new_data_incial" > -->
                <input type="date" id="new_data_incial" name="new_data_incial" value="<?php echo htmlspecialchars($reserva->getDataIncial(), ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="mb-3">
                <label for="new_data_final">Data Final</label>
                <!-- <input type="date" class="form-control" id="new_data_final" name="new_data_final" > -->
                <input type="date" id="new_data_final" name="new_data_final" value="<?php echo htmlspecialchars($reserva->getDataFinal(), ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="mb-3">
                <label for="new_hora_inicio" class="form-label">Horario de Inicio</label>
                <!-- <input type="time" class="form-control" id="new_hora_inicio" name="new_hora_inicio" > -->
                <input type="time" id="new_hora_inicio" name="new_hora_inicio" value="<?php echo htmlspecialchars($reserva->getHoraInicio(), ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="mb-3">
                <label for="new_hora_finaliza" class="form-label">Horario Termino</label>
                <!-- <input type="time" class="form-control" id="new_hora_finaliza" name="new_hora_finaliza" > -->
                <input type="time" id="new_hora_finaliza" name="new_hora_finaliza" value="<?php echo htmlspecialchars($reserva->getHoraFinaliza(), ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <div class="mb-3">
                <label for="new_curso_id" class="form-label">Id do Curso</label>
                <!-- <input type="number" class="form-control" id="new_curso_id" name="new_curso_id" > -->
                <input type="number" id="new_curso_id" name="new_curso_id" value="<?php echo htmlspecialchars($reserva->getCursoId(), ENT_QUOTES, 'UTF-8'); ?>">

            </div>

            <div class="mb-3">
                <label for="new_sala_id" class="form-label">Id Da Sala</label>
                <!-- <input type="number" class="form-control" id="new_sala_id" name="new_sala_id" > -->
                <input type="number" id="new_sala_id" name="new_sala_id" value="<?php echo htmlspecialchars($reserva->getSalaId(), ENT_QUOTES, 'UTF-8'); ?>">
            </div>

            <button type="submit" class="btn btn-primary onclick="window.location.href='atualizar_reserva.php?action=salvar';">Salvar Alterações</button>
            <button type="submit" class="btn btn-primary">Editar Reserva</button>
            <button type="submit" class="btn btn-primary">Deletar Reseva</button>
            <button type="button" class="btn btn-primary" onclick="window.location.href='consultar_reserva.php?action=listar';">Listar Todas as Reservas</button>



        </form>
            

          

            

        
    </div>


    
</body>

</html>