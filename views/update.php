<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 mt-5">

                
                <?php
        if(!empty($errMess)){
           echo '<h1>'.$errMess.'</h1>';
        } else {


            ?>
                
                <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>?patient=<?=$profilPatient->id?>" method="POST"
                    class="border  rounded">

                    <legend>Formulaire de modification du patient</legend>

                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom</label>
                        <input type="text" value="<?= $profilPatient->lastname ?>" class="form-control" id="lastname"
                            name="lastname">
                        <div class="red"><?= $error['lastname'] ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prénom</label>
                        <input type="text" value="<?= $profilPatient->firstname ?>" class="form-control" id="firstname"
                            name="firstname">
                        <div class="red"><?= $error['firstname'] ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="birthDate" class="form-label">Date de naissance</label>
                        <input type="date" value="<?= $profilPatient->birthdate ?>" class="form-control" id="birthdate"
                            name="birthdate">
                        <div class="red"><?= $error['birthdate'] ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Numéro de téléphone</label>
                        <input type="tel" value="<?= $profilPatient->phone ?>" class="form-control" id="phone" name="phone">
                        <div class="red"><?= $error['phone'] ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Adresse mail</label>
                        <input type="email" value="<?= $profilPatient->mail ?>" class="form-control" id="mail" name="mail">
                        <div class="red"><?= $error['mail'] ?? null ?></div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary m-1">Envoyer</button> 
                        <a href="/controllers/list-patientController.php"> <button type="button"
                                class="btn btn-primary m-1">Retour liste des patients</button></a>
                    </div>

                    
                </form>
                <h2 class="d-flex justify-content-center"><?= $message ?? null ?></h2>
                <?php
        }
        ?>

            </div>

        </div>
    </div>
</main>