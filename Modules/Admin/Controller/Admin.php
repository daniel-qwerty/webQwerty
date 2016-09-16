<?PHP

class Admin_Controller_Admin extends Com_Module_Controller {

    public function init() {
        if (get("userId") > 0) {
            $this->setLayout("Admin/Admin");
        } else {
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . "/lan/Index/Admin");
        }

        $this->assign("country", get('userCountry'));

        Com_Helper_BreadCrumbs::getInstance()->add("Inicio", '/Admin');
        
          //visitas a la pagina web
        $dtaActual=date("Y-m-d");
        $dtaStart=mktime(date("H"), date("i"),date("s"), date("m")-1, date("d"), date("Y"));
        $dtaStart=date("Y-m-d",$dtaStart);
        
        $this->assign("Statistics", Statistics_Model_Visit::getInstance()->getList($dtaStart, $dtaActual));
        
    }

    public function Close() {
        session_destroy();
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . "/lan/Index/Admin");
    }

    public function Index() {
        
    }
    
   

    public function Account() {

        Com_Helper_Title::getInstance()->title = "Mi Cuenta";

        Com_Helper_BreadCrumbs::getInstance()->add("Mi Cuenta", "/Admin/Admin/Account");
        
            
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
            
            Users_Model_User::getInstance()->doUpdate(get('userId'), get('Name'), get('Mail'), get('Login'), get('Password'),1 ,1, $image);
        }

        $entity = Users_Model_User::getInstance()->get(get('userId'));

        $this->assign('Name', $entity->UserName);
        $this->assign('Image', $entity->UserImage);
        $this->assign('Mail', $entity->UserMail);
        $this->assign('Login', $entity->UserLogin);
        $this->assign('Password', $entity->UserPassword);
        $this->assign('Estado', $entity->UserEstado);
    }

}

?>