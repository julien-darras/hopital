<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointments.php');

$title = 'Profil du patient';

$id = trim(filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT));
// $patient = new Patient();
// $profilPatient = $patient->view($id);

$profilPatient = Patient::view($id);


if($profilPatient instanceof PDOException){
    $errMess = $profilPatient->getMessage();
}


// $listAppointments = Appointments::all($id);
$listAppointments = Appointments::read($id);


if($listAppointments instanceof PDOException){
    $eMess = $listAppointments->getMessage();
}








include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/profil-patient.php');
include(dirname(__FILE__).'/../views/templates/footer.php');