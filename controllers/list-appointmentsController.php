<?php

require_once(dirname(__FILE__).'/../models/Appointments.php');

$title = 'Liste des rendez-vous';

$appointments = Appointments::read();







include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/list-appointments.php');
include(dirname(__FILE__).'/../views/templates/footer.php');