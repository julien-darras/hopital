<?php

require_once(dirname(__FILE__).'/../models/Patient.php');

$title = 'Listes des patients';

// Pour connaître le nombre de patients dans la base
$nbPatients= Patient::getCount();
// $error = [];

// la limite qui sera dans la requête
$limit = 10;

// connaître le nombre de pages totales : nombre de patients / limite et on arrondit au supérieur avec ceil
$pages = ceil($nbPatients / $limit);

// pour savoir sur quelle page on est 
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// le offset qui servira dans la requete 
$offset = ($currentPage-1) * $limit;







$search = (trim(filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES)));
$patients = Patient::read($search,$offset,$limit);






include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/list-patient.php');
include(dirname(__FILE__).'/../views/templates/footer.php');