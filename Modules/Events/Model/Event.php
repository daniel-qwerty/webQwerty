<?php

class Events_Model_Event extends Com_Module_Model {

    /**
     *
     * @return Events_Model_Event 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $fileName) {

        $db = new Entities_Event();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->EveId = $id;
            $db->EveLanId = $language->LanId;
            $db->EveTitle = $obj->Title;
            $db->EveUrl = generateUrl($obj->Title);
            $db->EveMetaTags = $obj->MetaTags;
            $db->EveDescription = $obj->Description;
            $db->EveDate = $obj->Date;
            $db->EveContent = $obj->Content;
            $db->EveImage = $fileName;
            $db->EveStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $fileName) {
        $db = new Entities_Event();
        $db->EveId = $intId;
        $db->EveLanId = $obj->Language;
        $db->EveTitle = $obj->Title;
        $db->EveUrl = generateUrl($obj->Title);
        $db->EveMetaTags = $obj->MetaTags;
        $db->EveDescription = $obj->Description;
        $db->EveDate = $obj->Date;
        $db->EveContent = $obj->Content;
        if ($fileName != "") {
            $db->EveImage = $fileName;
        }
        $db->EveStatus = $obj->Status;
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Event();
        $db->EveId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Event();
        $db->EveId = $intId;
        $db->EveLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Event();
        return $text->getAll($text->getList());
    }

}
