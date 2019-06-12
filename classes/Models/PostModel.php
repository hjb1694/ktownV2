<?php 


class PostModel{

    protected $title; 
    protected $content; 
    protected $category;
    protected $anon;

    function __construct($title,$content,$category,$anon){

        $this->title = trim(strip_tags($title));
        $this->content = trim(strip_tags($content,'<br><p><span><u><i><a><s><b><strong><del><em>'));
        $this->category = $category; 
        $this->anon = $anon;

    }

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getAnon(){
        return $this->anon;
    }

    public function setNewTitle($newTitle){
        $this->title = $newTitle;
    }

    public function setNewContent($newContent){
        $this->content = $newContent;
    }


}