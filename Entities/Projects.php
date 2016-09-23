<?php

class Entities_Projects extends Com_Database_Entity_Language{

    public $tableName = "projects";
    public $keyField = "ProId";
    public $lanField = "ProLanId";
    
    public $ProId;
    public $ProLanId;
    public $ProTitle;
    public $ProSubtitle;
    public $ProBrief;
    public $ProResponse;
    public $ProResults;
    public $ProImage;
    public $ProLogo;
    public $ProStatus;

}
