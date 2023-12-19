<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.0-web/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />

    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid bg-dark">
            <a class="navbar-brand" href="#">
                <h3><i class="fa fa-laptop text-light"></i></h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""><i class="fa fa-bars fa-2x text-light"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link text-light fw-light" aria-current="page" href="index.php">Accueil <i class="fa fa-home"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light fw-light" href="collaborator.php">Collaborateur <i class="fa fa-people-group"></i></a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <!-- this is for bell -->
                    <div class="dropdown">
                        <a data-mdb-dropdown-init class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" aria-expanded="false">
                            <i class="fas fa-bell text-light fa-2x"> </i>
                            <span class="badge rounded-pill badge-notification bg-danger"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">Some news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </div>
                    <!-- bell finish here -->
                    <div class="btn-group">
                        <input id="mot" name="mot" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit"onclick="chercher()"><i class="fa fa-search text-light" onclick="chercher()"></i></button>
                        <a href="" class="btn"><i class="fa fa-user text-light">connecter</i></a>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <section class="container-fluid mt-5">
        <div id="main-content">
            <?= $fileContent ?>
        </div>
    </section>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>