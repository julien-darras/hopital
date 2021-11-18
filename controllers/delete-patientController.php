<?php

require_once(dirname(__FILE__).'/../models/Patient.php');

$title = 'Patient supprimé';
$id = trim(filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT));

$delete = Patient::delete($id);



header('location: /../controllers/list-patientController.php');
