<?php

class Projects_Model_Project extends Com_Module_Model {

    /**
     *
     * @return Projects_Model_Project 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $image, $logo) {

        $db = new Entities_Projects();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->ProId = $id;
            $db->ProLanId = $language->LanId;
            $db->ProTitle = $obj->Title;
            $db->ProSubtitle = $obj->SubTitle;
            $db->ProBrief = $obj->Brief;
            $db->ProResponse = $obj->Response;
            $db->ProResults = $obj->Results;
            $db->ProImage = $image;
            $db->ProLogo = $logo;
            $db->ProStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image, $logo) {
        $db = new Entities_Projects();
        $db->ProId = $intId;
        $db->ProLanId = $obj->Language;
        $db->ProTitle = $obj->Title;
        $db->ProSubtitle = $obj->SubTitle;
        $db->ProBrief = $obj->Brief;
        $db->ProResponse = $obj->Response;
        $db->ProResults = $obj->Results;
        
        $db->ProStatus = $obj->Status;
        if ($image != "") {
            $db->ProImage = $image;
        }
        if ($logo != "") {
            $db->ProLogo = $logo;
        }
        
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Projects();
        $db->ProId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Projects();
        $db->ProId = $intId;
        $db->ProLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Projects();
        return $text->getAll($text->getList());
    }

}
