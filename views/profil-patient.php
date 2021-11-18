<main>
<!-- <h1><?= $eMess ?? null ?></h1> -->
<div class="container">
    <?php
        if(!empty($errMess)){
           echo '<h1>'.$errMess.'</h1>';
        } else {
    ?>
    <div class="intro">
        <h2 class="text-center">Profil du patient</h2>

    </div>
    <div class="row justify-content-center people">
        
        <?php
            $formatDate = date('d/m/Y', strtotime($profilPatient->birthdate ?? null) );
             ?>
            
        <div class="col-md-6 col-lg-4 item bg-secondary border rounded">
            <div class="box ">
                <h3 class="d-flex justify-content-center name"><?= $profilPatient->lastname ?? null ?></h3>
                <h4 class="d-flex justify-content-center title"><?= $profilPatient->firstname ?? null ?></h4>
                <p class="d-flex justify-content-center description">Date de naissance :
                    <?= $formatDate ?? null ?></p>
                    <p class="d-flex justify-content-center description">Téléphone : <a href="tel:<?= $profilPatient->phone ?? null ?>"> <?= $profilPatient->phone ?? null?></a></p>
                    <p class="d-flex justify-content-center description"> Adresse mail :  <a href="mailto:<?= $profilPatient->mail ?? null ?>"> <?= $profilPatient->mail ?? null ?></a></p>
                    <h4 class="d-flex justify-content-center">Listes des rendez-vous du patient</h4>
                    <?php
                    if (!empty($listAppointments)){
                        foreach($listAppointments as $listAppointment) : 
                            $formatAppointment = date('d/m/Y à G:i', strtotime($listAppointment->dateHour ?? null) );
    
                            ?>
                        <p class="d-flex justify-content-center description">
                            <?php echo 'Rendez-vous : ' .$formatAppointment; ?>

                            </p>
                    <?php endforeach ?>
                        
                   <?php } else { ?>
                    <p class="d-flex justify-content-center description">
                       <?= 'Ce patient n\'a pas de rendez-vous' ?>
                    
                    <?php }
                    ?>
                   
                         
                        
                    
            </div>
            <div class="d-flex justify-content-center p-2">
                <a href="/controllers/updateController.php?patient=<?= $profilPatient->id ?>"><button type="button"
                        class="btn btn-primary ">Modifier</button></a>
            </div>
        </div>
        

    </div>
</div>
<?php } ?>
</div>
</main>