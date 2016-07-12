<?php

/*

    display.php

    functions for displaying various elements of the program

*/

include "depend.php";

function ticketView ($tickets)
{

    // Generate a list of open tickets based on an incidents object 

    $ticketTable =
    '
    <table class="pure-table">
        <thead>
            <tr>
                <th>ticket ID</th>
                <th>date</th>
                <th>assignee</th>
                <th>description</th>
                <th>resolution</th>
                <th>time spent</th>
                <th>requested by</th>
            </tr>
        </thead>
        <tbody>
    ';

    echo $ticketTable;

    foreach ($tickets->all as $ticket)
    {
        echo '<tr>';
        foreach ($ticket as $fieldname => $field)
        {
            echo '<td>'.$field;
            echo '</td>';
        }
        echo '</tr>';
    }

    echo '</tbody>
    </table>';
}

function ticketInputForm ()
{
    // Generate the form for saving new tickets/incidents

    $ticketInputForm =
    '
    <form class="pure-form pure-form-aligned">
        <fieldset>
            <div class="pure-control-group">
                <label for="assignee">Assign To:</label>
                <input id="assignee" type="text" placeholder="AD Username">
            </div>
            <div class="pure-control-group">
                <label for="requestor">Requested By:</label>
                <input id="assignee" type="text" placeholder="AD Username">
            </div>
            <div class="pure-control-group">
                <label for="description">Description:</label>
                <textarea name="description" placeholder="Describe the problem" cols="50" rows="5"></textarea>
            </div>

            <div class="pure-control-group">
                <label for="resolution">Resolution:</label>
                <textarea name="resolution" placeholder="Optional" cols="50" rows="10"></textarea>
            </div>
            <div class="pure-control-group">
                <label for="timelogged">Time Spent:</label>
                <input id="timelogged" type="number" placeholder="If resolved">
            </div>
            <div class="pure-controls">
                <button type="submit" class="pure-button pure-button-primary">Save</button>
            </div>
        </fieldset>
    </form>
    ';

    echo $ticketInputForm;
}



?>
