<?php

class Entities_Team extends Com_Database_Entity_Language {

    public $tableName = "team";
    public $keyField = "TeamId";
    public $lanField = "TeamLanId";
    public $TeamId;
    public $TeamLanId;
    public $TeamName;
    public $TeamImage;
    public $TeamPosition;
    public $TeamDescription;
    public $TeamLinkedin;
    public $TeamEmail;
    public $TeamStatus;

}
