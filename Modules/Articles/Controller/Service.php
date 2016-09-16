<?php

class Articles_Controller_Service extends Com_Module_Controller_Json {

    public function Save() {
        if ($this->isPost()) {
            $obj = $this->getPostObject();
            Contact_Model_Contact::getInstance()->doUpdate($obj, null);
            $this->sendEmail($obj->Email, $obj->Name, $obj->Message);
            echo json_encode(true);
        }
    }

    

}
