<?PHP

class Clients_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Autores";
        Com_Helper_BreadCrumbs::getInstance()->add("Clientes", "/Admin/Clients");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Clients/Add");
        if ($this->isPost()) {
            
            $imageFile = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else if (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/")) {
                $imageFile = Com_File_Handler::getInstance()->getFileName();
            }
            
            Clients_Model_Client::getInstance()->doInsert($this->getPostObject(),$imageFile);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Clients');
        }

        $this->assign('Name');
        $this->assign('Email');
        $this->assign('Gender');
        $this->assign('Image');
        $this->assign('Resume');
        $this->assign('Birthday');
        $this->assign('Country');
        $this->assign('Password');
        $this->assign('Status');
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Clients/Add");
        $this->setView("add");
        if ($this->isPost()) {
            
            
            $imageFile = "";
            if (Com_File_Handler::getInstance()->setFile(get("Image"))->hasErrors()) {
                Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "El Archivo Seleccionado no pudo ser guardado por favor Intente Nuevamente");
            } else if (Com_File_Handler::getInstance()->saveFile("Resources/Uploads/Image/")) {
                $imageFile = Com_File_Handler::getInstance()->getFileName();
            }
            
            
            Clients_Model_Client::getInstance()->doUpdate(get('id'), $this->getPostObject(),$imageFile);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Clients');
        }
        $entity = Clients_Model_Client::getInstance()->get(get('id'));
        $this->assign('Name', $entity->CliName);
        $this->assign('Email', $entity->CliEmail);
        $this->assign('Gender', $entity->CliGender);
        $this->assign('Birthday', $entity->CliBirthday);
        $this->assign('Country', $entity->CliCountry);
        $this->assign('Password', $entity->CliPassword);
        $this->assign('Status', $entity->CliStatus);
        $this->assign('Image', $entity->CliImage);
        $this->assign('Resume', $entity->CliResume);
    }

    public function Delete() {
        Clients_Model_Client::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Clients');
    }

}

?>