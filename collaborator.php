<?php
include("service/myFnc.php");
$template = "";
$clients = listTable("list_view");
foreach ($clients as $client) {
    // extract($client);
    
    $action = "
        <div class='button'>
            <a href='' class='btn'>Modifier</a>
            <a href='' class='btn'>Afficher</a>
            <a href='' class='btn'>Supprimer</a>
        </div>
    ";
    $template .= "
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>$action</td>
        </tr>
    ";
}

include("service/myFnc.php");
$variables = [
    "rows" => $template,
];
$file = "page/collaborator/collaborator.html.php";
generate($file);
