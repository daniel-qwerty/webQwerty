<?php

class Entities_Customers extends Com_Database_Entity_Language{

    public $tableName = "customers";
    public $keyField = "CusId";
    public $lanField = "CusLanId";
    
    public $CusId;
    public $CusLanId;
    public $CusName;
    public $CusDescription;
    public $CusLink;
    public $CusLogo;
    public $CusStatus;

}
