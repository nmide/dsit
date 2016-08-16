<?php

class ticketPost
{
    public function __construct($POST)
    {
        include "depend.php";

        $this->POST = $POST;
        $this->incident = new incident();
        $this->incident->date = GetSQLDate();
        $this->incident->assignee = $this->POST['assignee'];
        $this->incident->description = $this->POST['description'];
        $this->incident->resolution = $this->POST['resolution'];
        $this->incident->timelogged = $this->POST['timelogged'];
        $this->incident->requestor = $this->POST['requestor'];
    }
    public function save()
    {
        include "depend.php";
        $this->save = new saveIncident($this->incident);
    }
}


?>
