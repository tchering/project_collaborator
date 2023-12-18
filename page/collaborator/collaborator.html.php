<div class="container-fluid">

    <table class="table table-striped table-inverse table-responsive w-100">
        <div>
            <a href="" class="btn bg-primary text-light">Créer</a>
        </div>
        <h3 class="text-center">LISTE DE COLLABORATEURS</h3>
        <thead class="thead-inverse bg-dark">
            <tr class=" bg-primary border">
                <th class="text-center border bg-primary text-light fw-semibold">CODE</th>
                <th class="text-center border bg-primary text-light fw-semibold">NOM ET PRENOM</th>
                <th class="text-center border bg-primary text-light fw-semibold">ADRESSE</th>
                <th class="text-center border bg-primary text-light fw-semibold">MOBILE</th>
                <th class="w-25 text-center border bg-primary text-light fw-semibold">ACTION</th>
            </tr>
        </thead>
        <tbody>
           <?=$rows?>
        </tbody>
        
    </table>
    <tfoot>
        <div class="bg-primary text-light">

            <h3 class="text-center">Nombre de COLLABORATEURS: <?=$count?></h3>
        </div>
        </tfoot>
</div>
<div class="container-fluid">
    <div class="modal-container">
        
    </div>

</div>


<script></script>