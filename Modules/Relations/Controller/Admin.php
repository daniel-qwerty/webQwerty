<?PHP

class Relations_Controller_Admin extends Admin_Controller_Admin {

    public function init() {
        parent::init();
        Com_Helper_Title::getInstance()->title = "M&oacute;dulo Relaciones";
        Com_Helper_BreadCrumbs::getInstance()->add("Relaciones", "/Admin/Relations");
    }

    public function Add() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Relations/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        if ($this->isPost()) {
            $id = Relations_Model_Relation::getInstance()->doInsert($this->getPostObject(), $languages);
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Relations/Edit/id/' . $id);
        }
        $this->assign('ProId');
        $this->assign('SerId');
        $this->assign('CliId');
        $this->assign('Status');
        $this->assign("languages", $languages);
        $this->assign("Language", (get('lan') != "" ? get('lan') : $languages[0]->LanId));
        
        $this->assign('Project', Projects_Model_Project::getInstance()->getList((get('lan') != "" ? get('lan') : $languages[0]->LanId)));
        $this->assign('Client', Customers_Model_Customer::getInstance()->getList((get('lan') != "" ? get('lan') : $languages[0]->LanId)));
        $this->assign('Service', Services_Model_Service::getInstance()->getServices((get('lan') != "" ? get('lan') : $languages[0]->LanId)));
    }

    public function Edit() {
        Com_Helper_BreadCrumbs::getInstance()->add("Item", "/Admin/Relations/Add");
        $languages = Language_Model_Language::getInstance()->getList();
        $language = (get('lan') != "" ? get('lan') : $languages[0]->LanId);
        
        if ($this->isPost()) {
            Relations_Model_Relation::getInstance()->doUpdate(get('id'), $this->getPostObject());
            $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Relations/Edit/lan/' . $language . '/id/' . get('id'));
        }

        $entity = Relations_Model_Relation::getInstance()->get(get('id'), $language);

        $this->assign("Id", $entity->RelId);
        $this->assign("Language", $entity->RelLanId);
        $this->assign('ProId', $entity->RelProId);
        $this->assign('SerId', $entity->RelSerId);
        $this->assign('CliId', $entity->RelCliId);
        $this->assign('Status', $entity->RelStatus);

        $this->assign("languages", $languages);
        $this->assign('Project', Projects_Model_Project::getInstance()->getList((get('lan') != "" ? get('lan') : $languages[0]->LanId)));
        $this->assign('Client', Customers_Model_Customer::getInstance()->getList((get('lan') != "" ? get('lan') : $languages[0]->LanId)));
        $this->assign('Service', Services_Model_Service::getInstance()->getServices((get('lan') != "" ? get('lan') : $languages[0]->LanId)));
    }

    public function Delete() {
        Relations_Model_Relation::getInstance()->doDelete(get('id'));
        $this->redirect(Com_Helper_Url::getInstance()->urlBase . '/Admin/Relations');
    }

}

?>