<?php 

class DealModel
{

    protected $title;
    protected $details; 
    protected $restrictions; 
    protected $startDate; 
    protected $expireDate;


    function __construct($title, $details, $restrictions, $startDate, $expireDate)
    {

        $this->title = strip_tags($title); 
        $this->details = strip_tags($details); 
        $this->restrictions = strip_tags($restrictions); 
        $this->startDate = date_format(date_create($startDate), 'Y-m-d'); 
        $this->expireDate = date_format(date_create($expireDate), 'Y-m-d');

    }


    public function getTitle(){
        return $this->title;
    }

    public function getDetails(){
        return $this->details;
    }

    public function getRestrictions(){
        return $this->restrictions;
    }

    public function getStartDate(){
        return $this->startDate;
    }

    public function getExpireDate(){
        return $this->expireDate;
    }




}