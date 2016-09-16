<?php

class Services_Controller_Index extends Public_Controller_Index {

    public function Index() {
       $this->setLayout("articles");
        $this->setView("item");
        $url = get('REQUEST_URI');
        $url = explode("/", $url);
        $url = $url[count($url) - 1];
       
        //print_r($url);
        //exit();
        
       
        
        
    }

    

}
