<?php
// test


function getDescribeTable($tableName)
{
    $connection = connection();
    $sql = "desc $tableName";
    $request = $connection->prepare($sql);
    $request->execute();
    $colonnes = $request->fetchAll(PDO::FETCH_COLUMN); //fetch all the values from a table newcollaborator
    //without having a proper method, we had to initialize the variable "table" as:
    // $variables = [
    //     'id'=>'',
    //     'nom'=>'',
    // ];
    // $variables=[];
    foreach ($colonnes as $valeur) {
        $variables[$valeur] = '';
    }
   return $variables;
}

function connection()
{

    $dns = "mysql:host=localhost;dbname=collaborator;charset=utf8";
    try {
        $connexion = new PDO($dns, "admin", "Ilovedopeleaf1.");
    } catch (Exception $e) {
        echo "<h1> Connection failed!!! Verify parameter !</h1>";
        die;
    }
    return $connexion;
}
