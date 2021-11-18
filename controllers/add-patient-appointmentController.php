<?php

require_once(dirname(__FILE__).'/../utils/regex.php');
require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../models/Appointments.php');
require_once(dirname(__FILE__).'/../utils/connection.php');

$title = 'Ajout d\'un patient et d\'un rendez-vous';
$error = [];



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $lastname = (trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)));
    $firstname = (trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)));
    $birthdate = (trim(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING)));
    $phone = (trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)));
    $mail = (trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL)));
    $date = (trim(filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING)));
    $hour = (trim(filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_STRING)));
    $minute = (trim(filter_input(INPUT_POST, 'minute', FILTER_SANITIZE_STRING)));
    $dateHour = $date.' '.$hour.':'.$minute;


    if (!empty($lastname)) {
        if (!preg_match(REGEX_NO_NUMBER, $lastname)) {
            $error['lastname'] = 'Nom non valide';
        }
    }  else {
        $error['lastname'] = 'Veuillez remplir le champs';
    }

    if (!empty($firstname)) {
        if (!preg_match(REGEX_NO_NUMBER, $firstname)) {
            $error['firstname'] = 'Prénom non valide';
        } 
    } else {
        $error['firstname'] = 'Veuillez remplir le champs';
    }
    if (!empty($birthdate)){
        if (!preg_match(REGEX_BIRTHDATE, $birthdate)){
            $error['birthdate'] = 'Date non valide';
        } 
    } else {
        $error['birthdate'] = 'Veuillez remplir le champs';
    }
    if(!empty($phone)){
        if(!preg_match(REGEX_PHONE_NUMBER, $phone)){
            $error['phone'] = 'Numéro de téléphone non valide';
        } 
    } else{
        $error['phone'] = 'Veuillez remplir le champs';
    }
    if (!empty($mail)) {
        $testmail = filter_var($mail, FILTER_VALIDATE_EMAIL);
        if (!preg_match(REGEX_MAIL, $testmail)) {
            $error['mail'] = 'Mail non valide';
        } 
    } else {
            $error['mail'] = 'Veuillez remplir le champs';
    }
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

    // envoyer les données si tableau d'erreur vide
    if(empty($error)){
        
        try {
            $pdo = Database::connect();
            $pdo->beginTransaction();
            $patient = new Patient($lastname, $firstname, $birthdate, $phone, $mail);

            $result = $patient->create();
            if($result !== true){
                $error['result'] = $result;
            }
            $idPatient = $pdo->lastInsertId();
            $appointment = new Appointments($dateHour, $idPatient );
            $result2 = $appointment->create();
            if($result2!== true){
                $error['result'] = $result;
            }
            if(empty($error)){
                $pdo->commit();
                $message = 'Bien enregistré';
            } else{
                throw new PDOException('erreur');
            }
            
        } catch (\PDOException $ex) {
            $pdo->rollBack();
            $message = $ex->getMessage();
        }
        


    } else {
        $message = '';
    }


}



include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/add-patient-appointment.php');
include(dirname(__FILE__).'/../views/templates/footer.php');