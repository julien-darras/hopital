<?php

require_once(dirname(__FILE__).'/../models/Appointments.php');

$title = 'Rendez-vous du patient';
$id = trim(filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT));

$appointment = Appointments::view($id);
// if(!is_object($appointment)){
//     $errMess = $appointment;
// }

if($appointment instanceof PDOException){
   $errMess =  $appointment->getMessage();
}



include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/appointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');