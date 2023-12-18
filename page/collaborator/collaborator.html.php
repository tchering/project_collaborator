<head>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="fontawesome-free-6.5.0-web/scss/fontawesome.scss">
    <style>
        @media (max-width: 576px) {

            th,
            td {
                font-size: 10px;
            }
        }
    </style>
</head>
<div class="container-fluid ">
    <table class="table table-striped table-inverse table-responsive w-100">
        <div>
            <a href="" class="btn bg-primary text-light">Créer</a>
        </div>
        <h3 class="text-center">LISTE DE COLLABORATEURS</h3>
        <thead class="thead-inverse bg-dark">
            <tr class=" bg-primary border">
                <th class=" text-center border bg-primary text-light fw-semibold">CODE</th>
                <th class="text-center border bg-primary text-light fw-semibold">NOM ET PRENOM</th>
                <th class="text-center border bg-primary text-light fw-semibold">ADRESSE</th>
                <th class="text-center border bg-primary text-light fw-semibold">MOBILE</th>
                <th class="w-25 text-center border bg-primary text-light fw-semibold">ACTION</th>
            </tr>
        </thead>
        <tbody id="tbody_collaborator">
            <?= $rows ?>
        </tbody>

    </table>
    <tfoot>
        <div class="bg-primary text-light">

            <h3 class="text-center">Nombre de COLLABORATEURS: <?= $count ?></h3>
        </div>
    </tfoot>
</div>
<div class="container-fluid">
    <div class="#modal_container">
        <h2 class="text-center">Saisir Collaborateur</h2>
        <div class="modal_container_content">

        </div>
    </div>
</div>


<script>
    function chercher() {
        event.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'collaborator.php?action=search');

        let data = new FormData();
        data.append('mot', mot.value); // Corrected typo here

        xhr.send(data);

        xhr.onload = () => {
            let response = xhr.responseText; // Corrected variable name here
            tbody_collaborator.innerHTML = response;
        };
    }
</script>