<?PHP

class Services_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Servicios";
        Com_Helper_BreadCrumbs::getInstance()->add("Servicios", "/Admin/Services");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Services/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {

            $logo = "";
            if (Com_File_Handler::getInstance()->setFile(get("Logo"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $logo = Com_File_Handler::getInstance()->getFileName();
                }
            }
            
            $image = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $image = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $id = Services_Model_Service::getInstance()->doInsert($this->getPostObject(), $languages, $logo, $image);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Services/Edit/id/' . $id);
        }
        
        $this->assign('Title');
        $this->assign('Alias');
        $this->assign('Color');
        $this->assign('Description');
        $this->assign('Content');
        $this->assign('Logo');
        $this->assign('Image');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Services/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $logo = "";
            if (Com_File_Handler::getInstance()->setFile(get("Logo"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $logo = Com_File_Handler::getInstance()->getFileName();
                }
            }
            
            $image = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $image = Com_File_Handler::getInstance()->getFileName();
                }
            }

            Services_Model_Service::getInstance()->doUpdate(get('id'), $this->getPostObject(), $logo, $image);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Services/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Services_Model_Service::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->SerId);
        $this->assign("Language", $entity->SerLanId);
        $this->assign('Title', $entity->SerTitle);
        $this->assign('Alias', $entity->SerAlias);
        $this->assign('Color', $entity->SerColor);
        $this->assign('Description', $entity->SerDescription);
        $this->assign('Content', $entity->SerContent);
        $this->assign('Logo', $entity->SerLogo);
        $this->assign('Image', $entity->SerImage);
        $this->assign('Status', $entity->SerStatus);

        $this->assign("languages", $languages);
    }

    public function Delete() {
        Services_Model_Service::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Serivce');
    }

}

?>