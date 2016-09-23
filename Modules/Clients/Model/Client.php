<?php

class Clients_Model_Client extends Com_Module_Model {

    /**
     *
     * @return Clients_Model_Client 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $fileName) {

        $db = new Entities_Client();
        $db->CliBirthday = $obj->Birthday;
        $db->CliCountry = $obj->Country;
        $db->CliEmail = $obj->Email;
        $db->CliGender = $obj->Gender;
        $db->CliName = $obj->Name;
        $db->CliResume = $obj->Resume;
        $db->CliImage - $fileName;
        $db->CliPassword = $obj->Password;
        $db->CliUrl = generateUrl($obj->Email);
        $db->CliStatus = $obj->Status;
        $db->action = ACTION_INSERT;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");
    }

    public function doUpdate($intId, Com_Object $obj, $fileName) {
        $db = new Entities_Client();
        $db->CliId = $intId;
        $db->CliBirthday = $obj->Birthday;
        $db->CliCountry = $obj->Country;
        $db->CliEmail = $obj->Email;
        $db->CliGender = $obj->Gender;
        $db->CliName = $obj->Name;
        $db->CliResume = $obj->Resume;
        $db->CliPassword = $obj->Password;
        $db->CliUrl = generateUrl($obj->Email);
        $db->CliStatus = $obj->Status;

        if ($fileName != "") {
            $db->CliImage = $fileName;
        }

        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Client();
        $db->CliId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId) {
        $db = new Entities_Client();
        $db->CliId = $intId;
        $db->get();
        return $db;
    }

    public function getByCode($email) {
        $db = new Entities_Client();
        $db->CliEmail = $email;
        $db->get();
        return $db;
    }

    public function getList() {
        $db = new Entities_Client();
        return $db->getAll($db->getList()->orderBy("CliName"));
    }

}
