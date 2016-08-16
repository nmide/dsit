<?php

/*

    incidents.php

    the classes that represent the incident information

*/

class incident
{
    public $ticketID;
    public $date;
    public $assignee = 'unassigned';
    public $description = 'undefined';
    public $resolution = NULL;
    public $timelogged = 0;
    public $requestor = NULL;

    public function __construct()
    {
        $this->date = GetSQLDate();
    }
}

class incidents
{
    public function __construct($keyword = NULL, $assignee = NULL)
    {
        include "depend.php";

        // Based on the information we are supplied, build the query:

        $query = 'SELECT RowID, * FROM incidents ';
        $order = 'ORDER BY RowID DESC ';
        $where = 'WHERE ';
        if (isset($keyword))
        {
            $where = $where.'description LIKE :description OR ';
            $where = $where.'resolution LIKE :resolution ';
            $query = $query.$where.$order;
            $incidents = $dsdb->prepare($query);
            $incidents->bindValue(':description', $keyword);
            $incidents->bindValue(':resolution', $keyword);
            $incidents->execute();
        }
        else
        {
            $query = $query.$order;
            $incidents = $dsdb->query($query);
        }
        $this->all = array();

        // Build an array of incidents

        foreach ($incidents as $iRow)
        {
            $this->all[$iRow['rowid']] = new incident();
            $this->all[$iRow['rowid']]->ticketID = (int) $iRow['rowid'];
            $this->all[$iRow['rowid']]->assignee = $iRow['assignee'];
            $this->all[$iRow['rowid']]->description = $iRow['description'];
            $this->all[$iRow['rowid']]->resolution = $iRow['resolution'];
            $this->all[$iRow['rowid']]->date = $iRow['date'];
            $this->all[$iRow['rowid']]->timelogged = $iRow['timelogged'];
            $this->all[$iRow['rowid']]->requestor = $iRow['requestor'];
        }
    }
}

class saveIncident
{
    public function __construct(incident $incident)
    {
        include "depend.php";

        // Generate query with prepared statement

        $sql_saveIncident =
        'INSERT INTO incidents (assignee, requestor, description, date, timelogged, resolution)
        VALUES (:assignee, :requestor, :description, :date, :timelogged, :resolution)';

        $pdo_saveIncident = $dsdb->prepare($sql_saveIncident);
        $pdo_saveIncident->bindValue(':assignee', $incident->assignee);
        $pdo_saveIncident->bindValue(':requestor', $incident->requestor);
        $pdo_saveIncident->bindValue(':description', $incident->description);
        $pdo_saveIncident->bindValue(':date', $incident->date);
        $pdo_saveIncident->bindValue(':timelogged', $incident->timelogged);
        $pdo_saveIncident->bindValue(':resolution', $incident->resolution);

        try {
                $result = $pdo_saveIncident->execute();
            } catch (Exception $e)
            {
                echo 'Something went wrong! Exception: ';
                echo $e;
                echo ' PDO Result: ';
                echo $result;
            }
    }
}

?>
