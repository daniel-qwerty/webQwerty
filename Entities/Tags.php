<?php

class Entities_Tags extends Com_Database_Entity_Language{

    public $tableName = "tags";
    public $keyField = "TagId";
    public $lanField = "TagLanId";
    
    public $TagId;
    public $TagLanId;
    public $TagName;
    public $TagStatus;
   
}
