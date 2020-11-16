<?php
require_once '../model/participantes.php';
require_once '../model/participantesDAO.php';


$participantes = new Participantes($_POST['dni'], $_POST['nombre'], $_POST['primerapellido'],$_POST['segundoapellido'], $_POST['fecha'], $_POST['email'], $_POST['genero']);    
$participantesDAO = new ParticipantesDAO();   
// echo $participantesDAO->inscripcion($participantes);
header("Location: ../view/inscripcion.php?error={$participantesDAO->inscripcion($participantes)}");





?>