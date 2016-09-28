<?PHP

class Projects_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Proyectos";
        Com_Helper_BreadCrumbs::getInstance()->add("Proyectos", "/Admin/Projects");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Projects/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {

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

            $id = Projects_Model_Project::getInstance()->doInsert($this->getPostObject(), $languages, $image, $logo);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Projects/Edit/id/' . $id);
        }
        
        $this->assign('Title');
        $this->assign('SubTitle');
        $this->assign('Brief');
        $this->assign('Response');
        $this->assign('Results');
        $this->assign('Image');
        $this->assign('Logo');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Projects/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

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

            Projects_Model_Project::getInstance()->doUpdate(get('id'), $this->getPostObject(), $image, $logo);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Projects/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Projects_Model_Project::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->ProId);
        $this->assign("Language", $entity->ProLanId);
        $this->assign('Title', $entity->ProTitle);
        $this->assign('SubTitle', $entity->ProSubtitle);
        $this->assign('Brief', $entity->ProBrief);
        $this->assign('Response', $entity->ProResponse);
        $this->assign('Results', $entity->ProResults);
        $this->assign('Image', $entity->ProImage);
        $this->assign('Logo', $entity->ProLogo);
        $this->assign('Status', $entity->ProStatus);

        $this->assign("languages", $languages);
    }

    public function Delete() {
        Projects_Model_Project::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Projects');
    }

}

?>