<?PHP

class Team_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Equipo";
        Com_Helper_BreadCrumbs::getInstance()->add("Equipo", "/Admin/Team");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Team/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {

            $imageFile = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else if (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/")) {
                $imageFile = Com_File_Handler::getInstance()->getFileName();
            }
            

            $id = Team_Model_Team::getInstance()->doInsert($this->getPostObject(), $languages, $imageFile);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Team/Edit/id/' . $id);
        }
        $this->assign('Name');
        $this->assign('Position');
        $this->assign('Description');
        $this->assign('Image');
        $this->assign('Linkedin');
        $this->assign('Email');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
        
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Team/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            $imageFile = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else if (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/")) {
                $imageFile = Com_File_Handler::getInstance()->getFileName();
            }
           

            Team_Model_Team::getInstance()->doUpdate(get('id'), $this->getPostObject(), $imageFile);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Team/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Team_Model_Team::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->TeamId);
        $this->assign("Language", $entity->TeamLanId);
        
        $this->assign('Name', $entity->TeamName);
        $this->assign('Position', $entity->TeamPosition);
        $this->assign('Description', $entity->TeamDescription);
        $this->assign('Image', $entity->TeamImage);
        $this->assign('Linkedin', $entity->TeamLinkedin);
        $this->assign('Email', $entity->TeamEmail);
        $this->assign('Status', $entity->TeamStatus);
        $this->assign("languages", $languages);
        
        
    }

    public function Delete() {
        Team_Model_Team::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Team');
    }

}

?>