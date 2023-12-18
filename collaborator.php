


<?php

include("service/function.php");
$template = "";
$clients = listTable("list_view");
foreach ($clients as $client) {
    extract($client);
    
    $action = "
        <div class='button d-grid d-md-grid d-lg-flex justify-content-center'>
            <a href='' class='btn bg-primary text-light mx-1'>Modifier</a>
            <a href='' class='btn bg-success text-light mx-1'>Afficher</a>
            <a href='' class='btn bg-danger text-light mx-1'>Supprimer</a>
        </div>
    ";
    $template .= "
        <tr>
            <td class='border text-center'>$CODE</td>
            <td class='border text-center'>$nom</td>
            <td class='border text-center'>$Addresse</td>
            <td class='border text-center'>$mobile</td>
            <td class='border text-center'>$action</td>
        </tr>
    ";
}

$variables = [
    "rows" => $template,
    "count"=>count($clients)
];
$file = "page/collaborator/collaborator.html.php";
generate($file,$variables);
