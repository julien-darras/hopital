<main>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-12 col-lg-6">

                <?= $message ?? null ?>

                <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="border  rounded">

                    <legend>Formulaire d'enregistrement du patient</legend>
                    <div class="red">Tous les champs suivis d'un * sont obligatoires</div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom *</label>
                        <input type="text" value="<?= htmlentities($lastname ?? '') ?>" class="form-control"
                            id="lastname" name="lastname" required>
                        <div class="red"><?= $error['lastname'] ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prénom *</label>
                        <input type="text" value="<?= htmlentities($firstname ?? '') ?>" class="form-control"
                            id="firstname" name="firstname" required>
                        <div class="red"><?= $error['firstname'] ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="birthDate" class="form-label">Date de naissance *</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        <div class="red"><?= $error['birthdate'] ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Numéro de téléphone *</label>
                        <input type="tel" value="<?= htmlentities($phone ?? '') ?>" class="form-control" id="phone"
                            name="phone" required>
                        <div class="red"><?= $error['phone'] ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Adresse mail *</label>
                        <input type="email" value="<?= htmlentities($mail ?? '') ?>" class="form-control" id="mail"
                            name="mail" required>
                        <div class="red"><?= $error['mail'] ?? null ?></div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</main>