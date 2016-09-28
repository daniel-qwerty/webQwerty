<?php

class Pages_Controller_Index extends Public_Controller_Index {

    public function Page() {
        $url = get('REQUEST_URI');
        $url = explode("/", $url);
        $url = $url[count($url) - 1];
        $page = Pages_Model_Pages::getInstance()->getByUrl($url, $this->lan->LanId);
        $menu = Menu_Model_Menu::getInstance()->getByUrl("page/" . $page->PagUrl, $this->lan->LanId);

        $this->assign('page', $page);
        $this->assign('menu', $menu);
        
    }

}
