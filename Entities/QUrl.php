<?php
/**
 * Created by PhpStorm.
 * User: Suaznabar
 * Date: 5/31/2016
 * Time: 2:37 PM
 */
class Entities_QUrl extends Com_Database_Entity_Language{

    public $tableName = "qurl";
    public $keyField = "UrlId";
    public $lanField = "UrlLanId";

    public $UrlId;
    public $UrlData;
    public $UrlCount;

}
