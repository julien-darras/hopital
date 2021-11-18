<?php

require_once(dirname(__FILE__).'/../models/Patient.php');
require_once(dirname(__FILE__).'/../utils/regex.php');

$title = 'Modifier le patient';
$error = [];
$id = trim(filter_input(INPUT_GET, 'patient',FILTER_SANITIZE_NUMBER_INT));




if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $lastname = (trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)));
    $firstname = (trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)));
    $birthdate = (trim(filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_STRING)));
    $phone = (trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)));
    $mail = (trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL)));

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

    // envoyer les données si tableau d'erreur vide


   if(empty($error)){
        $patient = new Patient($lastname, $firstname, $birthdate, $phone, $mail, $id);
    

        $response = $patient->update();
        if($response !== true){
            $message = $response->getMessage();
        } else{
            $message = 'Vos données ont bien été enregistrées';
            
        }

    }

}

$profilPatient = Patient::view($id);

if($profilPatient instanceof PDOException){
    $errMess = $profilPatient->getMessage();
}












include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/update.php');
include(dirname(__FILE__).'/../views/templates/footer.php');