<?php

class Routes_BlogItem extends Com_Application_Route {

     public $pattern = "/^(\w+|-)+\/item/";
    public $result = "_0_/Index/BlogItem/Item/";
}
