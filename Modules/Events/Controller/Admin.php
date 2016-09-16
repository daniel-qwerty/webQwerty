<?PHP

class Events_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Eventos";
        Com_Helper_BreadCrumbs::getInstance()->add("Textos", "/Admin/Events");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Events/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {

            $fileName = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $fileName = Com_File_Handler::getInstance()->getFileName();
                }
            }

            $id = Events_Model_Event::getInstance()->doInsert($this->getPostObject(), $languages, $fileName);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Events/Edit/id/' . $id);
        }
        $this->assign('Title');
        $this->assign('MetaTags');
        $this->assign('Description');
        $this->assign('Date');
        $this->assign('Content');
        $this->assign('Image');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Events/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $fileName = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else {
                if (!(Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/"))) {
                    Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
                } else {
                    $fileName = Com_File_Handler::getInstance()->getFileName();
                }
            }

            Events_Model_Event::getInstance()->doUpdate(get('id'), $this->getPostObject(), $fileName);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Events/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Events_Model_Event::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->EveId);
        $this->assign("Language", $entity->EveLanId);

        $this->assign('Title', $entity->EveTitle);
        $this->assign('MetaTags', $entity->EveMetaTags);
        $this->assign('Description', $entity->EveDescription);
        $this->assign('Date', $entity->EveDate);
        $this->assign('Content', $entity->EveContent);
        $this->assign('Image', $entity->EveImage);
        $this->assign('Status', $entity->EveStatus);

        $this->assign("languages", $languages);
    }

    public function Delete() {
        Events_Model_Event::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Events');
    }

}

?>