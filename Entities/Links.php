<?php

class Entities_Links extends Com_Database_Entity{

    public $tableName = "links";
    public $keyField = "LinId";
    
    public $LinId;
    public $LinName;
    public $LinUrl;
    public $LinStatus;
   
}
