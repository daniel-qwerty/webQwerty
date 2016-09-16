<?php

class Articles_Widget_Gallery extends Com_Object {

    private $lan;
    private $blog;

    /**
     *
     * @static
     * @access public
     * @return Articles_Widget_Gallery
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


        $list = Articles_Model_Media::getInstance()->getListByProject($this->blog, $this->lan->LanId);
        ?>
        <div class="row">
            <div class="col-sm-12 ">
                <div class="blog-titulos">
                    <h1>Galeria Multimedia</h1>


                </div>
            </div>
        </div>
        <?php
        foreach ($list as $item) {
            ?>
            <div class="col-md-4 col-xs-6">
                <div class="blog-small-item">
                    <a href="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->MedImage; ?>" rel="prettyPhoto" title="<?= "AQUI PONER TEXTO O TITULO DE LA IMAGEN" ?>">
                        <div class="blog-small-image"
                             style="background-image: url(<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->MedImage; ?>)"></div>

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
