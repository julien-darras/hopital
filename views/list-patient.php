<main>
    <div class="container-fluid p-0">
        <div class="row justify-content-center mt-2">
            <form class="d-flex col-3 bg-light" method="GET" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?> ">
                <input  class="form-control me-2" type="search" name="search"
                    placeholder="Tapez le nom du patient" aria-label="Search">
                <button id="search" class="btn btn-outline-secondary" type="submit">Chercher</button>
            </form>


        </div>
        <div class="d-flex justify-content-center">
            <?='Il y a '.$nbPatients. ' patients dans la base de données'?>
        </div>
        <!-- <?= $pages ?> -->
        <div class="row justify-content-center mt-5">



            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header pb-0">

                        <h2 class="card-title mb-0 d-flex justify-content-center">Liste des patients</h2>

                    </div>

                    <div class="card-body">
                        <table class="table table-striped shadow-lg" style="width:100%">
                            <thead>
                                <tr>

                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Voir plus</th>
                                    <th>Supprimer</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach($patients as $patient): ?>
                                <tr>

                                    <td><?= $patient->lastname  ?></td>
                                    <td><?= $patient->firstname ?></td>
                                    <td><a href="tel:<?= $patient->phone ?>"><?= $patient->phone ?></a></td>
                                    <td><a href="/controllers/profil-patientController.php?id=<?= $patient->id ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                            </svg></a></td>
                                    <td><a class="deletePatient"
                                            href="/controllers/delete-patientController.php?id=<?= $patient->id ?>">
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


        <nav>
            <div id="pagination">
                <ul class="pagination d-flex justify-content-center">
                    <li class="page-item">
                        <a href="?page=1" class="page-link">
                            <<</a> </li> <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page)
                                -->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="?page=<?= $currentPage - 1 ?>" class="page-link">
                            <</a> </li> <?php for($page = 1; $page <= $pages; $page++): ?> <!-- Lien vers chacune des
                                pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                    <?php endfor ?>
                    <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                    <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                        <a href="?page=<?= $currentPage + 1 ?>" class="page-link">></a>
                    </li>
                    <li class="page-item">
                        <a href="?page=<?= $pages ?>" class="page-link">>></a>

                    </li>
                </ul>

            </div>
        </nav>

    </div>


</main>