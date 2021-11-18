<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointments.php');
require_once(dirname(__FILE__).'/../utils/regex.php');

$title = 'Modifier un rendez-vous';
$id = intval(trim(filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT)));




$error = [];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $date = (trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING)));

    // $formatDate = date('Y/m/d', strtotime($date));
    $hour = (trim(filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_STRING)));
    $minute = (trim(filter_input(INPUT_POST, 'minute', FILTER_SANITIZE_STRING)));
    $dateHour = $date.' '.$hour.':'.$minute;


    // $dateHour = new DateTime("$formatDate $hour");
    // $dateHourTS = $dateHour->getTimestamp();

    $idPatients = (trim(filter_input(INPUT_POST, 'idPatients', FILTER_SANITIZE_NUMBER_INT))) ;

    if (!empty($date)){
        if (!preg_match(REGEX_BIRTHDATE, $date)){
            $error['date'] = 'Date non valide';
        } 
    } else {
        $error['date'] = 'Veuillez remplir le champs';
    }
    if (!empty($hour)) {
        if (!preg_match(REGEX_NUMBER, $hour)) {
            $error['hour'] = 'Heure non valide';
        }
    }  else {
        $error['hour'] = 'Veuillez remplir le champs';
    }
    if (!empty($minute)) {
        if (!preg_match(REGEX_NUMBER, $minute)) {
            $error['minute'] = 'Heure non valide';
        }
    }  else {
        $error['minute'] = 'Veuillez remplir le champs';
    }
    if (!empty($idPatients)) {
        if (!preg_match(REGEX_NUMBER, $idPatients)) {
            $error['idPatients'] = 'Patient non valide';
        }
    }  else {
        $error['idPatients'] = 'Veuillez sélectionner un patient';
    }

    if(empty($error)){
        $appointment = new Appointments($dateHour, $idPatients,$id);
       
        $response = $appointment->update();
        if($response !== true){
            $message = $response->getMessage();
        } else{
            $message = 'Vos données ont bien été enregistrées';
            
        }
    }


}
$appointments = Appointments::view($id);
$ts = strtotime($appointments->dateHour);
$appointmentDate = date('Y-m-d', $ts ) ;
$appointmentHour = date('G',$ts);
$appointmentMinute = date('i',$ts);


include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/update-appointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');