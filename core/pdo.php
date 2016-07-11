<?php

/*

    pdo.php

    basic database connection object

*/

try
{
    $dsdb = new PDO('sqlite:../core/dsit.db');
}
catch (PDOException $e)
{
    echo $e;
}

 ?>
