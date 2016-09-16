<?php

class SlideShows_Widget_Slideshow extends Com_Object {

    private $lan;

    /**
     *
     * @return SlideShows_Widget_Slideshow 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    public function render() {

        $list = SlideShows_Model_SlideShow::getInstance()->getListEnable($this->lan->LanId);

        foreach ($list as $slide) {
            ?>
            <img src="<?PHP echo Com_Helper_Url::getInstance()->getResources(); ?>/Uploads/Image/<?PHP echo $slide->SliImage; ?>" rel="<?PHP echo $slide->SliId; ?>">
            <?PHP
        }
    }

    public function renderText() {
        $list = SlideShows_Model_SlideShow::getInstance()->getList($this->lan->LanId);
        ?>
        <div class="texts">
            <?PHP
            foreach ($list as $slide) {
                ?>
                <div class="text" rel="<?PHP echo $slide->SliId; ?>">
                    <a href="<?PHP echo $slide->SliLink; ?>">
                        <?PHP
                        echo $slide->SliTitle;
                        ?>
                    </a>
                </div>
                <?PHP
            }
            ?>
        </div>
        <?PHP
    }

}
