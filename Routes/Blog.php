<?php

class Routes_Blog extends Com_Application_Route {

    public $pattern = "/^(\w+|-)+\/blog/";
    public $result = "_0_/Index/Blog/";

}

