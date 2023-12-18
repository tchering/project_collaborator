


<?php
include("service/function.php");
$action = "";
extract($_GET);
switch ($action) {
    case 'search':
        // extract($_POST);
        $mot = $_POST['mot'];
        $connection = connection();
        $sql = "select * from list_view where nom like ? or Addresse like ?";
        $request = $connection->prepare($sql);
        $request->execute(["%$mot%", "%$mot%"]);
        $collaborators = $request->fetchAll();
        $count = count($collaborators);
        $template = "";
        foreach ($collaborators as $collaborator) {
            extract($collaborator);

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
        echo $template;
        break;
    default:
        $template = "";
        $collaborators = listTable("list_view");
        foreach ($collaborators as $collaborator) {
            extract($collaborator);

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
            "count" => count($collaborators)
        ];
        $file = "page/collaborator/collaborator.html.php";
        generate($file, $variables);

        break;
}
