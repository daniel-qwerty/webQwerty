<?php

class News_Widget_Prensa extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return News_Widget_Prensa
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function setLimit($limit) {
        $this->limit = $limit;
        return $this;
    }

    public function render() {
        
        $list = News_Model_New::getInstance()->getList($this->lan->LanId, $this->limit);
        foreach ($list as $new) {
        ?>
        <div class="fid-panel-row">
                <div class="panel-options ">
                    <img class="img-responsive" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads() ?>/Image/<?PHP echo $new->NewImage; ?>" alt=""/>

                </div>

                <div class="panel-detail">
                    <small><?PHP echo $new->NewDate; ?></small>
                    <h4 class="text-pink cocogose"><?PHP echo $new->NewTitle; ?></h4>

                    <p><?PHP echo $new->NewDescription; ?></p>
                    <a class="lato-light" href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "article/" . $new->NewUrl); ?>">
                    LEIA MAIS
                    </a>
                    

                </div>
        </div>
       
        <?php }?>

        <?PHP
    }

}
