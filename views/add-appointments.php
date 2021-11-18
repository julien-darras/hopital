<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 mt-5">

                <?= $message ?? null ?>

                <form action="<?=htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" class="border  rounded">

                    <legend>Formulaire d'enregistrement du rendez-vous</legend>
                    <div class="red">Tous les champs suivis d'un * sont obligatoires</div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Date *</label>
                        <input type="date" class="form-control" id="date" name="date">
                        <div class="red"><?= $error['date'] ?? null ?></div>
                    </div>
                    <!-- <div class="mb-3">
                        <label for="hour" class="form-label">Heure *(de 9h à 17h)</label>
                        <input type="time" min="09:00" max="17:00"  step="600" class="form-control" id="hour" name="hour">
                        
                        <div class="red"><?= $error['hour'] ?? null ?></div>
                    </div> -->
                    <div class="mb-3">
                    <label for="hour" class="form-label">Heure *(de 9h à 18h)</label>
                    <select name="hour" id="hour">
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                    </select>
                    <select name="minute" id="minute">
                        <option value="00">00</option>
                        <option value="15">15</option>
                        <option value="30">30</option>
                        <option value="45">45</option>

                    </select>
                    </div>
                    <div class="red"><?= $error['hour'] ?? null ?></div>
                    <div class="red"><?= $error['minute'] ?? null ?></div>
                    <div class="mb-3">
                        <select class="form-select" name="idPatients" id="idPatients">
                            <option selected>Choisissez un patient</option>
                            <?php
                                foreach($patients as $patient){
                                    ?>

                            <option value="<?= $patient->id ?>"><?= $patient->lastname ?> <?= $patient->firstname ?>
                            </option>'
                            <?php }
                            ?>
                        </select>
                        <div class="red"><?= $error['idPatients'] ?? null ?></div>
                    </div>


                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </div>

                </form>
            </div>
        </div>
    </div>



</main>