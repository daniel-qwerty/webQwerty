<?php

class Entities_Blog extends Com_Database_Entity_Language{

    public $tableName = "blog";
    public $keyField = "BloId";
    public $lanField = "BloLanId";
    
    public $BloId;
    public $BloLanId;
    public $BloTitle;
    public $BloDescription;
    public $BloUrl;
    public $BloHeader;
    public $BloBanner;
    public $BloIcon;
    public $BloDate;
    public $BloStatus;

}
