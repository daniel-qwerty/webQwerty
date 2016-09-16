<?php

class Services_Widget_ServiceIndicators extends Com_Object {

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Services_Widget_ServiceIndicators
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
        $sw = 0;
        foreach ($list as $item) {
            $sw++;
            if ($sw == 1) {
                ?>
                <li data-target="#carousel-servicios" data-slide-to="<?php echo $sw - 1; ?>" class="active"></li>
                    <?php
                } else {
                    ?>
                <li data-target="#carousel-servicios" data-slide-to="<?php echo $sw - 1; ?>"></li>   

                <?PHP
            }
        }
    }

}
?>
