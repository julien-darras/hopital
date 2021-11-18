<main>

    <div class="container-fluid p-0">

        <div class="row justify-content-center mt-5">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header pb-0">

                        <h2 class="card-title mb-0 d-flex justify-content-center">Liste des rendez-vous</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped shadow-lg" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Date et Heure</th>
                                    <th>Patient</th>
                                    <th>Voir plus</th>
                                    <th>Supprimer</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($appointments as $appointment): ?>
                                <tr>
                                    <?php $formatDate = date('d/m/Y à G:i', strtotime($appointment->dateHour ?? null) ); ?>
                                    <td><?= $formatDate  ?></td>
                                    <td><?= $appointment->lastname ?> <?= $appointment->firstname ?></td>

                                    <td><a
                                            href="/controllers/appointmentController.php?id=<?= $appointment->id ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                            </svg></a></td>
                                    
                                    <td><a class="delete" href="/controllers/delete-appointmentController.php?id=<?= $appointment->id ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg>
                                        </a></td>

                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    


</main>