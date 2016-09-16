<?php

class Blog_Model_Blog extends Com_Module_Model {

    /**
     *
     * @return Blog_Model_Blog 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $header, $banner, $icon) {

        $db = new Entities_Blog();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->BloId = $id;
            $db->BloLanId = $language->LanId;
            $db->BloTitle = $obj->Title;
            $db->BloUrl = generateUrl($obj->Title);
            $db->BloDescription = $obj->Description;
            $db->BloDate = $obj->Date;
            $db->BloHeader = $header;
            $db->BloBanner = $banner;
            $db->BloIcon = $icon;
            $db->BloStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $header, $banner, $icon ) {
        $db = new Entities_Blog();
        $db->BloId = $intId;
        $db->BloLanId = $obj->Language;
        $db->BloTitle = $obj->Title;
        $db->BloUrl = generateUrl($obj->Title);
        $db->BloDescription = $obj->Description;
        $db->BloDate = $obj->Date;
        $db->BloStatus = $obj->Status;
        if ($header != "") {
            $db->BloHeader = $header;
        }
        if ($banner != "") {
            $db->BloBanner = $banner;
        }
        if ($icon != "") {
            $db->BloIcon = $icon;
        }
        
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_Blog();
        $db->BloId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_Blog();
        $db->BloId = $intId;
        $db->BloLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_Blog();
        return $text->getAll($text->getList());
    }
    
    public function getListCategories($lanId) {
        $db = new Entities_Blog();
        return $db->getAll($db->getList()->where("BloLanId={$lanId}"));
    }
    
    public function getListCategoriesHome($lanId, $limit) {
        $db = new Entities_Blog();
        return $db->getAll($db->getList()->where("BloLanId={$lanId}")->limit(0, $limit));
    }
    
    public function getByUrl($url, $lanId) {
        
        $db = new Entities_Blog();
        $db->BloUrl = $url;
        $db->BLoLanId = $lanId;
        $db->get();
        return $db;
    }

}
