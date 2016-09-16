<?php

class Blog_Widget_CategoriesHome extends Com_Object {

    private $lan;
    private $limit;

    /**
     *
     * @static
     * @access public
     * @return Blog_Widget_CategoriesHome
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
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

        $list = Blog_Model_Blog::getInstance()->getListCategoriesHome($this->lan->LanId, $this->limit);
        //print_r($list);        exit();
        foreach ($list as $item) {
            ?>
            <div class="col-xs-3 text-center">
                <div class="blog-cat">
                    <a href="<?PHP echo Com_Helper_Url::getInstance()->generateUrl($this->lan->LanCode, "blog/" . $item->BloUrl); ?>">
                        <img src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->BloIcon; ?>" class="img-responsive q-tooltip"
                             alt="<?php echo $item->BloTitle; ?>"
                             data-toggle="tooltip" data-placement="bottom" title="<?php echo $item->BloTitle; ?>"/>
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
