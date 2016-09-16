<?PHP

class Customers_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Clientes";
        Com_Helper_BreadCrumbs::getInstance()->add("Clientes", "/Admin/Customers");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Customers/Add");
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
          
            $id = Customers_Model_Customer::getInstance()->doInsert($this->getPostObject(), $languages, $logo);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Customers/Edit/id/' . $id);
        }
        
        $this->assign('Name');
        $this->assign('Description');
        $this->assign('Link');
        $this->assign('Logo');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Customers/Add");
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
            
            Customers_Model_Customer::getInstance()->doUpdate(get('id'), $this->getPostObject(), $logo);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Customers/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Customers_Model_Customer::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->CusId);
        $this->assign("Language", $entity->CusLanId);
        $this->assign('Name', $entity->CusName);
        $this->assign('Description', $entity->CusDescription);
        $this->assign('Link', $entity->CusLink);
        $this->assign('Logo', $entity->CusLogo);
        $this->assign('Status', $entity->CusStatus);

        $this->assign("languages", $languages);
    }

    public function Delete() {
        Customers_Model_Customer::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Customers');
    }

}

?>