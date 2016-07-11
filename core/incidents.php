<?php

/*

    incidents.php

    the classes that represent the incident information

*/

class incident
{
    public $rowid;
    public $category = 'admin';
    public $description = 'undefined';
    public $resolution = NULL;
    public $date;

    public function __construct()
    {
        $this->date = GetSQLDate();
    }
}

class incidents
{
    public function __construct($keyword = NULL)
    {

        include "depend.php";

        // Based on the information we are supplied, build the query:

        $query = 'SELECT RowID, * FROM incidents ';
        $order = 'ORDER BY date DESC ';
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

        /*
            Debugging:
            var_dump($dsdb);
            var_dump($incidents);
        */

        // Build an array of incidents

        foreach ($incidents as $iRow)
        {
            $this->all[$iRow['rowid']] = new incident();
            $this->all[$iRow['rowid']]->rowid = (int) $iRow['rowid'];
            $this->all[$iRow['rowid']]->category = $iRow['category'];
            $this->all[$iRow['rowid']]->description = $iRow['description'];
            $this->all[$iRow['rowid']]->resolution = $iRow['resolution'];
            $this->all[$iRow['rowid']]->date = $iRow['date'];
        }
    }
}


?>