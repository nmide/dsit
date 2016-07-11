<?php

/*

    Dead Simple IT (incident tracking)

    Written by: Nick Marynissen

*/

include "depend.php";

$tickets = new incidents();

function ticketView ($tickets)
{
    foreach ($tickets->all as $ticket)
    {
        echo '<tr>';
        echo '<td>'.$ticket->rowid;
        echo '<td>'.$ticket->date;
        echo '<td>'.$ticket->category;
        echo '<td>'.$ticket->description;
        echo '<td>'.$ticket->resolution;
        echo '</tr>';
    }
}



### End of logic/PHP

?>

<html>
<head>
    <link rel="stylesheet" href="css/pure-min.css">
<title>
    Incident Management
</title>
</head>
<body>
    <table class="pure-table">
        <thead>
            <tr>
                <th>ticket ID</th>
                <th>date</th>
                <th>category</th>
                <th>description</th>
                <th>resolution</th>
            </tr>
        </thead>
        <tbody>
            <?php ticketView($tickets); ?>
        </tbody>
    </table>
</body>
</html>
