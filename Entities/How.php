<?php

class Entities_How extends Com_Database_Entity_Language{

    public $tableName = "How";
    public $keyField = "HowId";
    public $lanField = "HowLanId";
    
    public $HowId;
    public $HowLanId;
    public $HowTitle;
    public $HowDescription;
    public $HowImage;
    public $HowStatus;

}
