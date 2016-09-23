<?php

class Articles_Widget_List extends Com_Object {

    private $lan;
    private $blog;

    /**
     *
     * @static
     * @access public
     * @return Articles_Widget_List
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setBlog($id) {
        $this->blog = $id;
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

        $list = Articles_Model_BlogItem::getInstance()->getListArticles($this->lan->LanId, $this->blog);
       
            foreach ($list as $item) {
                
                ?>
                <div class="col-sm-6">
                    <div class="blog-result-item">
                        <div class="image">
                            <img src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->BitemImage;?>">
                        </div>

                        <div class="title">
                            <?php echo $item->BitemTitle;?>
                        </div>
                        <div class="data">
                            <div class="text">
                                <div class="resume myriad">
                                    <?php echo $item->BitemSmallText;?>
                                </div>
                            </div>
                        </div>
                        <div class="row blog-item-accions">
                            <div class="col-xs-6">
                                <div class="readmore">
                                    <a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "articles")."/",$item->BitemUrl; ?>">
                                        <div class="button">
                                            <div class="text">
                                                LEER ARTÍCULO
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="date">
                                    <?php echo $item->BitemDate;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?PHP
            }
            ?>
    


        <?PHP
    }

}
?>
