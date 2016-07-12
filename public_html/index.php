<?php

include "depend.php";
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
