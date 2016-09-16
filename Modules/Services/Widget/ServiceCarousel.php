<?php

class Services_Widget_ServiceCarousel extends Com_Object {

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Services_Widget_ServiceCarousel
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
                <div class="item active <?php echo $item->SerColor; ?>">
                    <img class="servicio-imagen" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->SerLogo; ?>" alt="...">

                    <div class="carousel-caption">
                        <h1><?php echo $item->SerTitle; ?></h1>

                        <p class="myriad"><?php echo $item->SerDescription; ?></p>

                        <p class="hidden"><a href="#"><img src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/icon-portafolio.png" alt="portaforlio"/></a></p>
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="item <?php echo $item->SerColor; ?>">
                    <img class="servicio-imagen" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->SerLogo; ?>" alt="...">

                    <div class="carousel-caption">
                        <h1><?php echo $item->SerTitle; ?></h1>

                        <p class="myriad"><?php echo $item->SerDescription; ?></p>

                        <p class="hidden"><a href="#"><img src="<?PHP echo Com_Helper_Url::getInstance()->getImage(); ?>/Public/icon-portafolio.png" alt="portaforlio"/></a></p>
                    </div>
                </div>

                <?PHP
            }
        }
    }

}
?>
