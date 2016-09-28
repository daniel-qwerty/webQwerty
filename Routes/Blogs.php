<?php

class Routes_Blogs extends Com_Application_Route {

    public $pattern = "/^(\w+|-)+\/blogs/";
    public $result = "_0_/Index/Blogs/";

}
