<?php

class Team_Model_Team extends Com_Module_Model {

    /**
     *
     * @return Team_Model_Team 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $imageFile) {

        $db = new Entities_Team();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->TeamId = $id;
            $db->TeamLanId = $language->LanId;
            $db->TeamName = $obj->Name;
            $db->TeamPosition = $obj->Position;
            $db->TeamDescription = $obj->Description;
            $db->TeamImage = $imageFile;
            $db->TeamEmail = $obj->Email;
            $db->TeamLinkedin = $obj->Linkedin;
            $db->TeamStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $imageFile) {
        $db = new Entities_Team();
        $db->TeamId = $intId;
        $db->TeamLanId = $obj->Language;
        $db->TeamName = $obj->Name;
        $db->TeamPosition = $obj->Position;
        $db->TeamDescription = $obj->Description;
        if ($imageFile != "") {
            $db->TeamImage = $imageFile;
        }
        $db->TeamLinkedin = $obj->Linkedin;
        $db->TeamEmail = $obj->Email;
        $db->TeamStatus = $obj->Status;
        
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Team();
        $db->TeamId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Team();
        $db->TeamId = $intId;
        $db->TeamLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList($lanId) {
        $db = new Entities_Team();
        return $db->getAll($db->getList()->where("TeamLanId={$lanId}")->andWhere("TeamStatus='1'"));
        
    }

    

}
