<?php

class Contact_Widget_Form extends Com_Object {
private $lan;
    /**
     *
     * @static
     * @access public
     * @return Contact_Widget_Form
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

     public function setLan($lan) {
        $this->lan = $lan;
        return $this;
    }

    /**
     * @access public
     */
    public function render() { ?>

        <div class="qwerty-header-container">
            <div class="qwerty-header  qwerty-header-stack qwerty-header-contact">
                <h1 class="text-yellow"><i class="header-decoration"></i><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'titleContacto')->TxtDescription; ?></h1>
            </div>
        </div>
        <section class="seccion seccion-contact">
            <div class="container qwerty-offset">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">
                        <div class="row">
                            <div class="col-md-6">

                                <form method="post">
                                    <div class="form-group">
                                        <input id="contacto-nombre" name="contacto-nombre"
                                               placeholder="<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtContactNombre')->TxtDescription; ?>"
                                               class="form-control" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <input id="contacto-email" name="contacto-email"
                                               placeholder="<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtContactEmail')->TxtDescription; ?>"
                                               class="form-control" type="text"/>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="contacto-mensaje" name="contacto-mensaje"
                                                  placeholder="<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtContactMensaje')->TxtDescription; ?>"
                                                  class="form-control" id="" cols="30"
                                                  rows="10"></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <input type="button" class="contact-submit"
                                               value="<?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtContactEnviar')->TxtDescription; ?>"
                                               onclick="saveContact('error message', 'enviado',<?PHP echo $this->lan->LanId; ?>);">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div id="qwerty-map"></div>
                                <div class="row visible-xs visible-sm hidden-md margin-bottom" style="margin-bottom: 20px">
                                    <div class="col-xs-4 col-sm-2">
                                        <div class="social-icon social-icon-fb"></div>
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <div class="social-icon social-icon-li"></div>
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <div class="social-icon social-icon-tw"></div>
                                    </div>
                                    <div class="col-xs-6 col-sm-2">
                                        <div class="social-icon social-icon-yt"></div>
                                    </div>
                                    <div class="col-xs-6 col-sm-2">
                                        <div class="social-icon social-icon-in"></div>
                                    </div>
                                </div>
                                <div class="row contacto-data" style="margin-bottom: 15px">
                                    <div class="col-md-1 col-xs-2">
                                        <i class="fa fa-phone text-blue"></i>
                                    </div>
                                    <div class="col-md-11 col-xs-10">
                                        <p class="myriad text-white"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtTelefono')->TxtDescription; ?></p>
                                    </div>
                                </div>
                                <div class="row contacto-data" style="margin-bottom: 15px">
                                    <div class="col-md-1 col-xs-2">
                                        <i class="fa fa-envelope-o  text-blue"></i>
                                    </div>
                                    <div class="col-md-11 col-xs-10">
                                        <p class="myriad text-white"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtEmail')->TxtDescription; ?></p>
                                    </div>
                                </div>
                                <div class="row contacto-data" style="margin-bottom: 15px">
                                    <div class="col-md-1 col-xs-2">
                                        <i class="fa fa-map-marker text-blue"></i>
                                    </div>
                                    <div class="col-md-11 col-xs-10">
                                        <p class="myriad text-white"><?PHP echo Texts_Helper_Text::getInstance()->get($this->lan, 'txtDireccion')->TxtDescription; ?></p>
                                    </div>
                                </div>
                                <div class="clearfix margen"></div>
                                <div class="row hidden-sm visible-md visible-lg">
                                    <div class="col-xs-4 col-sm-2">
                                        <a href="<?PHP echo Links_Helper_Link::getInstance()->get('linkFacebook')->LinUrl; ?>"
                                           target="_blank">
                                            <div class="social-icon social-icon-fb"></div>
                                        </a>
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <a href="<?PHP echo Links_Helper_Link::getInstance()->get('linkLinkedin')->LinUrl; ?>"
                                           target="_blank">
                                            <div class="social-icon social-icon-li"></div>
                                        </a>
                                        </a>
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <a href="<?PHP echo Links_Helper_Link::getInstance()->get('linkTwitter')->LinUrl; ?>"
                                           target="_blank">
                                            <div class="social-icon social-icon-tw"></div>
                                        </a>
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <a href="<?PHP echo Links_Helper_Link::getInstance()->get('linkYoutube')->LinUrl; ?>"
                                           target="_blank">
                                            <div class="social-icon social-icon-yt"></div>
                                        </a>
                                    </div>
                                    <div class="col-xs-4 col-sm-2">
                                        <a href="<?PHP echo Links_Helper_Link::getInstance()->get('linkInstagram')->LinUrl; ?>"
                                           target="_blank">
                                            <div class="social-icon social-icon-in"></div>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        
   <?php    
    }

}
?>
