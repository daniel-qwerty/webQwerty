<?php

class Tags_Model_Tags extends Com_Module_Model {

    /**
     *
     * @return Tags_Model_Tags 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages) {

        $db = new Entities_Tags();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->TagId = $id;
            $db->TagLanId = $language->LanId;
            $db->TagName = $obj->Name;
            $db->TagStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj) {
        $db = new Entities_Tags();
        $db->TagId = $intId;
        $db->TagLanId = $obj->Language;
        $db->TagName = $obj->Name;
        $db->TagStatus = $obj->Status;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Tags();
        $db->TagId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Tags();
        $db->TagId = $intId;
        $db->TagLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList($lanId, $limit = 1000) {
        $text = new Entities_Tags();
        return $text->getAll($text->getList()->where("TagLanId={$lanId} and TagStatus = 1")->limit(0, $limit));
    }

    

}
