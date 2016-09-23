<?php

class Articles_Model_BlogItem extends Com_Module_Model {

    /**
     *
     * @return Articles_Model_BlogItem 
     */
    public static function getInstance() {
        return self::_getInstance(__CLASS__);
    }

    public function doInsert(Com_Object $obj, $languages, $image) {

        $db = new Entities_BlogItems();

        $id = $db->getNextId();

        foreach ($languages as $language) {
            $db->BitemId = $id;
            $db->BitemLanId = $language->LanId;
            $db->BitemBlogId = $obj->BloId;
            $db->BitemTitle = $obj->Title;
            $db->BitemSubTitle = $obj->SubTitle;
            $db->BitemAuthor= $obj->Author;
            $db->BitemImage = $image;
            $db->BitemVideo = $obj->Video;
            $db->BitemTweet = $obj->Tweet;
            $db->BitemLargeText = $obj->LargeDescription;
            $db->BitemSmallText = $obj->SmallDescription;
            $db->BitemDate = $obj->Date;
            $db->BitemUrl = generateUrl($obj->Title);
            $db->BitemStatus = $obj->Status;
            $db->action = ACTION_INSERT;
            $db->save();
        }

        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Insertado");

        return $id;
    }

    public function doUpdate($intId, Com_Object $obj, $image) {
        $db = new Entities_BlogItems();
        $db->BitemId = $intId;
        $db->BitemLanId = $obj->Language;
        $db->BitemBlogId = $obj->BloId;
        $db->BitemTitle = $obj->Title;
        $db->BitemSubTitle = $obj->SubTitle;
        $db->BitemAuthor= $obj->Author;
        $db->BitemTweet = $obj->Tweet;
        $db->BitemImage = $image;
        if ($image != "") {
            $db->BitemImage = $image;
        }
        
        $db->BitemVideo = $obj->Video;
        $db->BitemLargeText = $obj->LargeDescription;
        $db->BitemSmallText = $obj->SmallDescription;
        $db->BitemDate = $obj->Date;
        $db->BitemUrl = generateUrl($obj->Title);
        $db->BitemStatus = $obj->Status;
     
        $db->action = ACTION_UPDATE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Actualizado");
    }

    public function doDelete($intId) {
        $db = new Entities_BlogItems();
        $db->BitemId = $intId;
        $db->action = ACTION_DELETE;
        $db->save();
        Com_Wizard_Messages::getInstance()->addMessage(MESSAGE_INFORMATION, "Registro Eliminado");
    }

    public function get($intId, $lanId) {
        $db = new Entities_BlogItems();
        $db->BitemId = $intId;
        $db->BitemLanId = $lanId;
        $db->get();
        return $db;
    }

    public function getList() {
        $text = new Entities_BlogItems();
        return $text->getAll($text->getList());
    }
    
    public function getListArticles($lanId, $bloId) {
        $db = new Entities_BlogItems();
        return $db->getAll($db->getList()->where("BitemLanId={$lanId}")->andWhere("BitemBlogId={$bloId}"));
        
    }
    
    public function getListArticlesRelations($lanId, $bloId, $limit) {
        $db = new Entities_BlogItems();
        return $db->getAll($db->getList()->where("BitemLanId={$lanId}")->andWhere("BitemBlogId={$bloId}")->orderBy("BitemDate desc")->limit(0, $limit));
        
    }
    
    public function getListArticlesRecent($lanId, $limit) {
        $db = new Entities_BlogItems();
        return $db->getAll($db->getList()->where("BitemLanId={$lanId}")->orderBy("BitemDate desc")->limit(0, $limit));
        
    }
    
    public function getByUrl($url, $lanId) {
        $db = new Entities_BlogItems();
        $db->BitemUrl = $url;
        $db->BitemLanId = $lanId;
        $db->get();
        return $db;
    }

}
