<?php

include "depend.php";

if (isset($_POST['description']))
{
    try
    {
        $post = new ticketPost($_POST);
        $post->save();
    }
    catch(Exception $e)
    {
        echo 'Something went wrong! ';
        echo $e;
    }
}

$tickets = new incidents();

?>

<html>
<head>
    <link rel="stylesheet" href="css/pure-min.css">
<title>
    Incident Management
</title>
</head>
<body>
    <?php ticketInputForm(); ?>
    <?php ticketView($tickets); ?>
</body>
</html>
