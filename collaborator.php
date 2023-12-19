


<?php
include("service/function.php");
$action = "";
extract($_GET); // Add this line to extract $id variable
switch ($action) {
    case 'delete':
        extract($_POST);
        $success = supprimer('collab', $id);
        if ($success) {
            echo "La donnée a été supprimée avec succès";
        } else {
            echo "Erreur lors de la suppression de la donnée";
        }
        break;
    case 'save':
        extract($_POST);
        $connection = connection();
        if ($id == null) {
            $sql = "INSERT INTO collab(civilite, nom, prenom, dateOfBirth, placeOfBirth, socialSecurity, emailPro, mailPer, mobile, fixe, rue, complement, postalCode, ville, department, region, pays, nationalite, typeCollab) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $request = $connection->prepare($sql);
            $request->execute([$civilite, $nom, $prenom, $dateOfBirth, $placeOfBirth, $socialSecurity, $emailPro, $mailPer, $mobile, $fixe, $rue, $complement, $postalCode, $ville, $department, $region, $pays, $nationalite, $typeCollab]);
            echo "Nouvelle donnée insérée avec succès";
        } else {
            $sql = "UPDATE collab SET civilite = ?, nom = ?, prenom = ?, dateOfBirth = ?, placeOfBirth = ?, socialSecurity = ?, emailPro = ?, mailPer = ?, mobile = ?, fixe = ?, rue = ?, complement = ?, postalCode = ?, ville = ?, department = ?, region = ?, pays = ?, nationalite = ?, typeCollab = ? WHERE id = ?";
            $request = $connection->prepare($sql);
            $request->execute([$civilite, $nom, $prenom, $dateOfBirth, $placeOfBirth, $socialSecurity, $emailPro, $mailPer, $mobile, $fixe, $rue, $complement, $postalCode, $ville, $department, $region, $pays, $nationalite, $typeCollab, $id]);
            echo "Donnée modifiée avec succès";
        }
        break;
    case 'show':
        extract($_POST);
        $form_info = listTableById('collab', $id);
        $form_info_json = json_encode($form_info);
        echo $form_info_json;
        break;
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
        <tr class=''>
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
        $collaborators = listTable("collab");
        foreach ($collaborators as $collaborator) {
            extract($collaborator);

            $action = "
        <div class='button d-grid d-md-grid d-lg-flex justify-content-center'>
            <a href='javascript:modifier($id)' class='btn bg-primary text-light mx-1'>Modifier</a>
            <a href='javascript:afficher($id)' class='btn bg-success text-light mx-1'>Afficher</a>
            <a href='javascript:supprimer($id)' class='btn bg-danger text-light mx-1'>Supprimer</a>
        </div>
    ";
            $template .= "
        <tr>
            <td class='fs-sm-25 border text-center'>$id</td>
            <td class='fs-sm-25 border text-center'>$nom</td>
            <td class='fs-sm-25 border text-center'>$ville</td>
            <td class='fs-sm-25 border text-center'>$mobile</td>
            <td class='fs-sm-25 border text-center'>$action</td>
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
