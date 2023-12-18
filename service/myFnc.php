<!-- create function for connection to database -->
<?php
function connection($host=localhost,$dbname=dbname,$user=user,$password=password){
    $dns="mysqlhost:$host;$dbname;charset=utf8";
    try{
        $connection = new PDO($dns,$user,$password);
    } catch(Exception $error)  {
        echo "<h1>Connection Error</h1>";
    }
    return $connection;
}

// create function to generate page
function generate($file, $variables = [], $base = "page/basepage.html.php") {
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
function listTable($tableName){
    $connection =connection();
    $sql ="select * from $tableName";
    $request=$connection->prepare($sql);
    $request->execute();
    $result=$request->fetchAll();
    return $result;
}