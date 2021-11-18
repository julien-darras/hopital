<main>

<div class="container">
<?php
        if(!empty($errMess)){
           echo '<h1>'.$errMess.'</h1>';
        } else {
            ?>
    <div class="intro">
        <h2 class="text-center">Rendez-vous du patient</h2>

    </div>
    <div class="row justify-content-center people">
        
        <?php
            $formatDate = date('d/m/Y à H:i', strtotime($appointment->dateHour ?? null) );
            ?>
        <div class="col-md-6 col-lg-4 item bg-secondary border rounded">
            <div class="box ">
                <h3 class="d-flex justify-content-center name">Date : <?= $formatDate ?? null ?></h3>
                <h4 class="d-flex justify-content-center title">Nom : <?= $appointment->lastname ?? null ?></h4>
                <h4 class="d-flex justify-content-center title">Prénom : <?= $appointment->firstname ?? null ?></h4>
                <h4 class="d-flex justify-content-center title">Numéro du patient : <a href="tel:<?= $appointment->phone ?? null ?>"> <?= $appointment->phone ?? null ?></a></h4>
                <h4 class="d-flex justify-content-center title">Mail du patient : <a href="mailto:<?= $appointment->mail ?? null ?>"> <?= $appointment->mail ?? null ?></a></h4>
                

            </div>
            <div class="d-flex justify-content-center p-2">
                <a href="/controllers/update-appointmentController.php?id=<?= $appointment->id ?>"><button type="button"
                        class="btn btn-primary ">Modifier</button></a>
            </div>
        </div>
        

    </div>
</div>
<?php } ?>
</div>
</main>