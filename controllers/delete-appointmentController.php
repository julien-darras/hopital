<?php

require_once(dirname(__FILE__).'/../models/Appointments.php');

$title = 'Rendez-vous supprimé';
$id = trim(filter_input(INPUT_GET, 'id',FILTER_SANITIZE_NUMBER_INT));

$delete = Appointments::delete($id);



header('location: /../controllers/list-appointmentsController.php');

