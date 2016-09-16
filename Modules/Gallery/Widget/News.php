<?php

class News_Widget_News extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @return News_Widget_News 
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
        <div class="noticia">
            <img src="<?PHP echo Com_Helper_Url::getInstance()->getUploads() ?>/Image/<?PHP echo $new->NewImage; ?>" alt=""/>

            <div class="noticia-titulo lato-light"><p><?PHP echo substr($new->NewTitle,0, 30) ?></p></div>
            <div class="noticia-descripcion lato-semibold text-pink"><p><?PHP echo substr($new->NewDescription,0, 75).'...'; ?></p></div>
            <div class="noticia-mas lato-thin-italic  text-right">
                <a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "article/" . $new->NewUrl); ?>">
                    Leia mais...
                </a>
            </div>
        </div>
        <?php }?>

        <?PHP
    }

}
