<?php

class Team_Widget_Equipo extends Com_Object
{

    private $lan;
    private $parent = 0;

    /**
     *
     * @static
     * @access public
     * @return Team_Widget_Equipo
     */
    public static function getInstance()
    {
        return self::_getInstance(__CLASS__);
    }

    public function setLan($lan)
    {
        $this->lan = $lan;
        return $this;
    }

    /**
     * @access public
     */
    public function render()
    {

        $list = Team_Model_Team::getInstance()->getList($this->lan->LanId);

        ?>

        <?PHP
        $sw = 0;
        foreach ($list as $item) {
            ?>
            <div class="circle_slider_text_wrapper" id="sw<?php echo $sw++; ?>"
                 style="display: none; width: 893px; top: 0px; left: 0px;">
                <!-- content for the seventh layer, id="sw6" -->
                <div class="content_slider_text_block_wrap">
                    <!-- "content_slider_text_block_wrap" is a div class for custom content -->
                    <h3><?php echo $item->TeamName; ?></h3><br><br>

                    <span><?php echo $item->TeamPosition; ?></span>
                    <br>
                    <span><a href="mailto:<?= $item->TeamEmail; ?>"> <i class="fa fa-envelope"></i> <?= $item->TeamEmail; ?></a></span>
                    <br/>

                    <?php
                    $linkedin_id = explode("/", $item->TeamLinkedin)[4];


                    ?>
                    <span><a target="_blank" href="<?= $item->TeamLinkedin; ?>"> <i
                                class="fa fa-linkedin-square"></i> <?= $linkedin_id ?> </a></span>

                    <!--                    <a href="#" class="button_socials button_hover_effect fb" data-hovercolor="#496dba"-->
                    <!--                       data-hoveroutcolor="#3b5a9a"></a>-->
                    <!--                    <a href="#" class="button_socials button_hover_effect tw" data-hovercolor="#4bb8e7"-->
                    <!--                       data-hoveroutcolor="#23aae1"></a>-->
                    <!--                    <a href="#" class="button_socials button_hover_effect pin" data-hovercolor="#de343d"-->
                    <!--                       data-hoveroutcolor="#cc2129"></a><!-- button_socials button_hover_effect -->
                    <!--                    <a href="#" class="button_socials button_hover_effect yt" data-hovercolor="#fd0013"-->
                    <!--                       data-hoveroutcolor="#bb000e"></a>-->
                </div>
                <div class="clear"></div>
            </div>

        <?PHP
        }
    }

}

?>
