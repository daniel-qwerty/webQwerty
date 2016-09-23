<?php

class Customers_Widget_List extends Com_Object {

    private $lan;
    private $blog;

    /**
     *
     * @static
     * @access public
     * @return Customers_Widget_List
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

        $list = Customers_Model_Customer::getInstance()->getListClients($this->lan->LanId);
       
            foreach ($list as $item) {
                
                ?>

                <div class="port-item">
                   <!-- <a href="">-->
                        <div class="image">
                            <img src="<?PHP echo Com_Helper_Url::getInstance()->getUploads(); ?>/Image/<?php echo $item->CusLogo;?>"
                                 alt="cocacola">
                        </div>
                        <h5><?php echo $item->CusName;?></h5>
                   <!-- </a>-->
                </div>
                <?PHP
            }
            ?>
    


        <?PHP
    }

}
?>
