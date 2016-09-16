<?php

class Entities_Event extends Com_Database_Entity_Language {

    public $tableName = "event";
    public $keyField = "EveId";
    public $lanField = "EveLanId";
    public $EveId;
    public $EveLanId;
    public $EveTitle;
    public $EveUrl;
    public $EveMetaTags;
    public $EveDescription;
    public $EveDate;
    public $EveContent;
    public $EveImage;
    public $EveStatus;

}
