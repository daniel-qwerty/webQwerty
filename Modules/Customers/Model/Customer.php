<?php

class Customers_Model_Customer extends Com_Module_Model {

    /**
     *
     * @return Customers_Model_Customer 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $logo) {

        $db = new Entities_Customers();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->CusId = $id;
            $db->CusLanId = $language->LanId;
            $db->CusName = $obj->Name;
            $db->CusDescription = $obj->Description;
            $db->CusLink = $obj->Link;
            $db->CusLogo = $logo;
            $db->CusStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $logo) {
        $db = new Entities_Customers();
        $db->CusId = $intId;
        $db->CusLanId = $obj->Language;
        $db->CusName = $obj->Name;
        $db->CusDescription = $obj->Description;
        $db->CusLink = $obj->Link;
        $db->CusStatus = $obj->Status;
        if ($logo != "") {
            $db->CusLogo = $logo;
        }
        
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Customers();
        $db->CusId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Customers();
        $db->CusId = $intId;
        $db->CusLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Customers();
        return $text->getAll($text->getList());
    }
    public function getListClients($lanId) {
        $db = new Entities_Customers();
        return $db->getAll($db->getList()->where("CusLanId={$lanId}"));

    }

}
