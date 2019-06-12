<?php 

class ReportModel
{

    protected $id; 
    protected $type; 
    protected $reason;
    protected $comment;


    function __construct($id, $type, $reason, $comment)
    {

        $this->id = $id; 
        $this->type = trim(strip_tags($type)); 
        $this->reason = trim(strip_tags($reason)); 
        $this->comment = trim(strip_tags($comment));

    }

    public function getId()
    {
        return $this->id;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getReason()
    {
        return $this->reason;
    }

    public function getComment()
    {
        return $this->comment;
    }

}