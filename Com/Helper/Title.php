<?php

class Com_Helper_Title extends Com_Object {

    public $title = "";

    /**
     * @static
     * @access public
     * @return Com_Helper_Title 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function render() {
        ?>
        <h2><?PHP echo $this->title; ?></h2>
        <?PHP
    }

}
