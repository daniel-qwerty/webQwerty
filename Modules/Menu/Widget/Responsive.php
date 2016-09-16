<?php

class Menu_Widget_Responsive extends Com_Object {

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Menu_Widget_Responsive
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setParent($id) {
        $this->parent = $id;
        return $this;
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    /**
     * @access public
     */
    public function render() {

        $list = Menu_Model_Menu::getInstance()->getMenuList($this->lan->LanId, $this->parent);
        $actualUrl = Com_Helper_Url::getInstance()->urlBase . '/' . get("QUERY_STRING");
        ?>
        
            <?PHP
            foreach ($list as $item) {
                $url = Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, $item->MenUrl);
                
                ?>
                
                <li id="menu-item-6501" class="qwerty-menu-item">
                    <a onclick="goTo(<?= $item->MenClass; ?>); closeMenu(); return false" href="<?PHP echo $url; ?>"><?PHP echo $item->MenAlias; ?></a>
                </li>
                <?PHP
            }
            ?>
      


        <?PHP
    }

}
?>
