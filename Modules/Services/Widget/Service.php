<?php

class Services_Widget_Service extends Com_Object {

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Services_Widget_Service
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    /**
     * @access public
     */
    public function render() {

        $list = Services_Model_Service::getInstance()->getServices($this->lan->LanId);
        $actualUrl = Com_Helper_Url::getInstance()->urlBase . '/' . get("QUERY_STRING");
        ?>

        <?PHP
        foreach ($list as $item) {
            ?>
            <div id="<?php echo $item->SerAlias; ?>" class="btn-servicios col-xs-4 col-sm-4">
                <img class="img-responsive" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->SerImage; ?>"
                     alt="<?php echo $item->SerTitle; ?>"/>
                <h2><?php echo $item->SerTitle; ?></h2>
            </div>

            <?PHP
        }
    }

    public function renderMenu() {

        $list = Services_Model_Service::getInstance()->getServices($this->lan->LanId);
        $actualUrl = Com_Helper_Url::getInstance()->urlBase . '/' . get("QUERY_STRING");
        ?>

        <?PHP
        foreach ($list as $item) {
            ?>
            <li id="<?php echo $item->SerAlias; ?>">
                <img class="img-responsive" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->SerImage; ?>"
                     alt="<?php echo $item->SerTitle; ?>"/>
                <h2><?php echo $item->SerTitle; ?></h2>
            </li>

            <?PHP
        }
    }

}
?>
