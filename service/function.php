
<?php

require_once("config/parametre.php");
function connection($host = host, $dbname = dbname, $user = user, $password = password)
{

    $dns = "mysql:host=$host;dbname=$dbname;charset=utf8";
    try {
        $connexion = new PDO($dns, $user, $password);
    } catch (Exception $e) {
        echo "<h1> Connection failed!!! Verify parameter !</h1>";
        die;
    }
    return $connexion;
}

// create function to generate page
function generate($file, $variables = [], $base = "page/basepage.html.php")
{
    if (file_exists($file)) {
        extract($variables);
        ob_start();
        require($file);
        $fileContent = ob_get_clean();

        ob_start();
        require($base);
        $baseContent = ob_get_clean();
        echo $baseContent;
    } else {
        echo "Error generating baseContent";
    }
}

// create function to generate table
function listTable($tableName)
{
    $connection =  connection();
    $sql = "select * from $tableName";
    $request = $connection->prepare($sql);
    $request->execute();
    $result = $request->fetchAll();
    return $result;
}
