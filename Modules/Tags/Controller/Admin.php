<?PHP

class Tags_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Tags";
        Com_Helper_BreadCrumbs::getInstance()->add("Tags", "/Admin/Tags");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Tags/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {

            $id = Tags_Model_Tags::getInstance()->doInsert($this->getPostObject(), $languages);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Tags/Edit/id/' . $id);
        }
        $this->assign('Name');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
        
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Tags/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);

        if ($this->isPost()) {

            Tags_Model_Tags::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Tags/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Tags_Model_Tags::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->TagId);
        $this->assign("Language", $entity->TagLanId);

        $this->assign('Name', $entity->TagName);
        $this->assign('Status', $entity->TagStatus);
        $this->assign("languages", $languages);
        
        
    }

    public function Delete() {
        Tags_Model_Tags::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Tags');
    }

}

?>