<?PHP

class Blog_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Blogs";
        Com_Helper_BreadCrumbs::getInstance()->add("Blog", "/Admin/Blog");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Blog/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {

            $header = "";
            if (Com_File_Handler::getInstance()->setFile(get("Header"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $header = Com_File_Handler::getInstance()->getFileName();
                }
            }
            
            $banner = "";
            if (Com_File_Handler::getInstance()->setFile(get("Banner"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $banner = Com_File_Handler::getInstance()->getFileName();
                }
            }
            
            $icon = "";
            if (Com_File_Handler::getInstance()->setFile(get("Icon"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $icon = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $id = Blog_Model_Blog::getInstance()->doInsert($this->getPostObject(), $languages, $header, $banner, $icon);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Blog/Edit/id/' . $id);
        }
        
        $this->assign('Title');
        $this->assign('Description');
        $this->assign('Date');
        $this->assign('Header');
        $this->assign('Banner');
        $this->assign('Icon');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Blog/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $header = "";
            if (Com_File_Handler::getInstance()->setFile(get("Header"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $header = Com_File_Handler::getInstance()->getFileName();
                }
            }
            
            $banner = "";
            if (Com_File_Handler::getInstance()->setFile(get("Banner"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $banner = Com_File_Handler::getInstance()->getFileName();
                }
            }
            
             $icon = "";
            if (Com_File_Handler::getInstance()->setFile(get("Icon"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $icon = Com_File_Handler::getInstance()->getFileName();
                }
            }

            Blog_Model_Blog::getInstance()->doUpdate(get('id'), $this->getPostObject(), $header, $banner, $icon);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Blog/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Blog_Model_Blog::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->BloId);
        $this->assign("Language", $entity->BloLanId);
        $this->assign('Title', $entity->BloTitle);
        $this->assign('Description', $entity->BloDescription);
        $this->assign('Date', $entity->BloDate);
        $this->assign('Header', $entity->BloHeader);
        $this->assign('Banner', $entity->BloBanner);
        $this->assign('Icon', $entity->BloIcon);
        $this->assign('Status', $entity->BloStatus);

        $this->assign("languages", $languages);
    }

    public function Delete() {
        Blog_Model_Blog::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Blog');
    }

}

?>