<?php

class Articles_Controller_Index extends Public_Controller_Index {

    public function Index() {
        $this->setLayout("articles");
        $this->setView("item");
        $url = get('REQUEST_URI');
        $url = explode("/", $url);
        $url = $url[count($url) - 1];


        $article = Articles_Model_BlogItem::getInstance()->getByUrl($url, $this->lan->LanId);
        $blog = Blog_Model_Blog::getInstance()->get($article->BitemBlogId, $this->lan->LanId);
        $user = Users_Model_User::getInstance()->get($article->BitemAuthor);
        $this->assign("article", $article);
        $this->assign("blog", $blog);
        $this->assign("user", $user);
    }
    
    

}
