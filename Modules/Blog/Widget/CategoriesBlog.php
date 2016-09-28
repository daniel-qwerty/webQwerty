<?php

class Blog_Widget_CategoriesBlog extends Com_Object {

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Blog_Widget_CategoriesBlog
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

        $list = Blog_Model_Blog::getInstance()->getListCategories($this->lan->LanId);

        foreach ($list as $item) {
            ?>
            <div class="col-xs-6 col-sm-2">
                
                    <a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "blog/" . $item->BloUrl); ?>">
                        <div class="categoria-item">
                            <img class="img-responsive" src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->BloIcon; ?>" alt=""/>
                            <span><?php echo $item->BloTitle; ?></span>
                        </div>
                    </a>
                

            </div>

            <?PHP
        }
       
    }

}
?>
