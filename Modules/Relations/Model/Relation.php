<?php

class Relations_Model_Relation extends Com_Module_Model {

    /**
     *
     * @return Relations_Model_Relation 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages) {

        $db = new Entities_Relations();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->RelId = $id;
            $db->RelLanId = $language->LanId;
            $db->RelCliId = $obj->CliId;
            $db->RelProId = $obj->ProId;
            $db->RelSerId = $obj->SerId;
            $db->RelStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj) {
        $db = new Entities_Relations();
        $db->RelId = $intId;
        $db->RelLanId = $obj->Language;
        $db->RelCliId = $obj->CliId;
        $db->RelProId = $obj->ProId;
        $db->RelSerId = $obj->SerId;
        $db->RelStatus = $obj->Status;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Relations();
        $db->RelId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Relations();
        $db->RelId = $intId;
        $db->RelLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Relations();
        return $text->getAll($text->getList());
    }

}
