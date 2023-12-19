


<?php
include("service/function.php");
$action = "";
extract($_GET); // Add this line to extract $id variable
switch ($action) {
    case 'save':
        extract($_POST);
        $connection = connection();
        if ($id == 0) {
            try {
                $connection->beginTransaction();

                // insert data in client
                $sql = "INSERT INTO client(civilite, nom, prenom) VALUES (?, ?, ?)";
                $result = $connection->prepare($sql);
                $result->execute([$civilite, $nom, $prenom]);
                $clientId = $connection->lastInsertId();

                // insert data in info_client
                $sql = "INSERT INTO info_client(dateOfBirth, placeOfBirth, securitySocial, mailPro, mailPer, mobile, phoneFix) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $result = $connection->prepare($sql);
                $result->execute([$dateOfBirth, $placeOfBirth, $securitySocial, $mailPro, $mailPer, $mobile, $phoneFix]);
                $infoClientId = $connection->lastInsertId();

                // insert data in addresse
                $sql = "INSERT INTO addresse(rue, complement, codePostal, ville, department, region, pays, nationalite, typeCollab) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $result = $connection->prepare($sql);
                $result->execute([$rue, $complement, $codePostal, $ville, $department, $region, $pays, $nationalite, $typeCollab]);
                $addresseId = $connection->lastInsertId();

                $connection->commit();

                echo "Les nouvelles données ont été insérées avec succès";
            } catch (PDOException $e) {
                $connection->rollBack();
                echo "Error: " . $e->getMessage();
            }
        } else {
            // Update operation code here
        }
        break;
    case 'show':
        extract($_POST);
        $form_info = listTableById('form', $id);
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
        $collaborators = listTable("list_view");
        foreach ($collaborators as $collaborator) {
            extract($collaborator);

            $action = "
        <div class='button d-grid d-md-grid d-lg-flex justify-content-center'>
            <a href='javascript:modifier($CODE)' class='btn bg-primary text-light mx-1'>Modifier</a>
            <a href='javascript:afficher($CODE)' class='btn bg-success text-light mx-1'>Afficher</a>
            <a href='javascript:supprimer($CODE)' class='btn bg-danger text-light mx-1'>Supprimer</a>
        </div>
    ";
            $template .= "
        <tr>
            <td class='fs-sm-25 border text-center'>$CODE</td>
            <td class='fs-sm-25 border text-center'>$nom</td>
            <td class='fs-sm-25 border text-center'>$Addresse</td>
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
