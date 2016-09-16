<?php

class How_Model_How extends Com_Module_Model {

    /**
     *
     * @return How_Model_How  
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $image) {

        $db = new Entities_How();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->HowId = $id;
            $db->HowLanId = $language->LanId;
            $db->HowTitle = $obj->Title;
            $db->HowDescription = $obj->Description;
            $db->HowImage = $image;
            $db->HowStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image) {
        $db = new Entities_How();
        $db->HowId = $intId;
        $db->HowLanId = $obj->Language;
        $db->HowDescription = $obj->Description;
        $db->HowStatus = $obj->Status;
        if ($image != "") {
            $db->HowImage = $image;
        }
        
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_How();
        $db->HowId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_How();
        $db->HowId = $intId;
        $db->HowLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_How();
        return $text->getAll($text->getList());
    }

}
