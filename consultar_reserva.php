<?php
require_once 'backend/config/database.php';
require_once 'backend/dao/reservaDAO.php';
require_once 'backend/entity/reserva.php';

// $action = $_GET ['action'];

// switch($action){
//     case 'listar':
//         getAll();
//         break;

//         default:
//         http_response_code(400); // Requisição inválida
//         echo json_encode(['error' => 'Ação inválida']);
// }


$reservaDao = new reservaDAO();
$reservas = $reservaDao->getAll();





?>



<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>id</th>
                <th>Data Inicial</th>
                <th>Data Final</th>
                <th>Hora Início</th>
                <th>Hora Final</th>
                <th>Curso ID</th>
                <th>Sala ID</th>
                <th>Detalhes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservas as $reserva) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($reserva->getId(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($reserva->getDataIncial(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($reserva->getDataFinal(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($reserva->getHoraInicio(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($reserva->getHoraFinaliza(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($reserva->getCursoId(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php echo htmlspecialchars($reserva->getSalaId(), ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="editar_reserva.php?id=<?php echo $reserva->getId(); ?>" class="btn btn-primary">Detalhes</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<button><a href="index.php">Voltar para a página inicial</a></button>
