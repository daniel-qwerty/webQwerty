<?php

class Articles_Widget_Relation extends Com_Object {

    private $lan;
    private $blog;
    private $limit;

    /**
     *
     * @static
     * @access public
     * @return Articles_Widget_Relation
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setBlog($id) {
        $this->blog = $id;
        return $this;
    }
    
    public function setLimit($id) {
        $this->limit = $id;
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

        $list = Articles_Model_BlogItem::getInstance()->getListArticlesRelations($this->lan->LanId, $this->blog, $this->limit);
        
            foreach ($list as $item) {
                ?>
                <div class="col-md-4 col-xs-6">
                        <div class="blog-small-item">
                            <a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "articles/" . $item->BitemUrl); ?>">
                                <div class="blog-small-image"
                                     style="background-image: url(<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->BitemImage;?>)"></div>

                                <div class="blog-data">
                                    <h2><?php echo $item->BitemTitle;?></h2>

                                    <p class="hidden-xs"><?php echo $item->BitemSmallText;?></p>
                                </div>
                            </a>
                        </div>
                    </div>

                <?PHP
            }
            ?>
    


        <?PHP
    }

}
?>
