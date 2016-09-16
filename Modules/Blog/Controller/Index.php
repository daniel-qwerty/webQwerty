<?php

class Blog_Controller_Index extends Public_Controller_Index {

    public function Index() {
        $this->setLayout("categories");
        $this->setView("blog");
        $url = get('REQUEST_URI');
        $url = explode("/", $url);
        $url = $url[count($url) - 1];
       
        //print_r($url);
        //exit();
        
        $blog = Blog_Model_Blog::getInstance()->getByUrl($url, $this->lan->LanId);
        $this->assign("blog", $blog);
        
    }
    
    public function Lista() {
        $this->setLayout("categories");
        $this->setView("list");
        $url = get('REQUEST_URI');
        $url = explode("/", $url);
        $url = $url[count($url) - 1];
       
        //print_r($url);
        //exit();
        
        $blog = Articles_Model_BlogItem::getInstance()->getListArticlesRecent($this->lan->LanId, 10);
        $this->assign("blog", $blog);
        
    }

    public function Search() {
        $this->setLayout("blank");
        //$this->assign("list", Blog_Model_Generic::getInstance()->getList($this->lan->LanId, get('pattern')));
    }

}
