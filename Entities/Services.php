<?php

class Entities_Services extends Com_Database_Entity_Language{

    public $tableName = "services";
    public $keyField = "SerId";
    public $lanField = "SerLanId";
    
    public $SerId;
    public $SerLanId;
    public $SerTitle;
    public $SerAlias;
    public $SerColor;
    public $SerDescription;
    public $SerContent;
    public $SerUrl;
    public $SerLogo;
    public $SerImage;
    public $SerStatus;

}
