<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title><?= $title ?></title>
</head>

<body>
  <header>
  <h1>CHU AMIENS</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/controllers/homeController.php"><img class="logo" src="/assets/img/kisspng-hospital-medical-sign-health-clip-art-medical-cross-5a8499dee2ea06.2886464515186395829295.png" alt=""> Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/controllers/add-patientController.php">Ajouter un patient</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/controllers/list-patientController.php">Liste des patients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/controllers/add-appointmentsController.php">Ajouter un rendez-vous</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/controllers/list-appointmentsController.php">Liste des rendez-vous</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/controllers/add-patient-appointmentController.php">Ajouter un patient et un rendez-vous</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
</header>