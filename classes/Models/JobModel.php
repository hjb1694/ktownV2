<?php 

class JobModel
{

    protected $title; 
    protected $category; 
    protected $type; 
    protected $location; 
    protected $salRangeStart; 
    protected $salRangeEnd; 
    protected $payType; 
    protected $health; 
    protected $vision; 
    protected $dental; 
    protected $retirement; 
    protected $paidVacation; 
    protected $flex; 
    protected $fitness; 
    protected $details; 
    protected $requirements;

    function __construct($title,$cat,$type,$loc,$salStrt,$salEnd,$payType,$hlth,$vis,$dent,$ret,$paidV,$flex,$fit,$details,$req)
    {
        $this->title = strip_tags(trim($title)); 
        $this->category = (int) $cat; 
        $this->type = (int) $type; 
        $this->location = (int) $loc; 
        $this->salRangeStart = $salStrt; 
        $this->salRangeEnd = $salEnd; 
        $this->payType = $payType;
        if($hlth === 'true'){
            $this->health = 1;
        }else{
            $this->health = 0;
        }
        if($vis === 'true'){
            $this->vision = 1;
        }else{
            $this->vision = 0;
        }
        if($dent === 'true'){
            $this->dental = 1;
        }else{
            $this->dental = 0;
        }
        if($ret === 'true'){
            $this->retirement = 1;
        }else{
            $this->retirement = 0;
        }
        if($paidV === 'true'){
            $this->paidVacation = 1;
        }else{
            $this->paidVacation = 0;
        }
        if($flex === 'true'){
            $this->flex = 1;
        }else{
            $this->flex = 0;
        }
        if($fit === 'true'){
            $this->fitness = 1;
        }else{
            $this->fitness = 0;
        }
        $this->details = trim(strip_tags($details, '<div><span><b><s><strong><u><i><em><del><ins><ul><ol><li><a>'));
        $this->requirements = trim(strip_tags($req, '<div><span><b><s><strong><u><i><em><del><ins><ul><ol><li><a>'));
    }

    public function getTitle(){
        return $this->title;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getType(){
        return $this->type;
    }

    public function getLocation(){
        return $this->location;
    }

    public function getSalRangeStart(){
        return $this->salRangeStart;
    }

    public function getSalRangeEnd(){
        return $this->salRangeEnd;
    }

    public function getPayType(){
        return $this->payType;
    }

    public function getHealth(){
        return $this->health;
    }

    public function getVision(){
        return $this->vision;
    }

    public function getDental(){
        return $this->dental;
    }

    public function getRetirement(){
        return $this->retirement;
    }

    public function getPaidVacation(){
        return $this->paidVacation;
    }

    public function getFlex(){
        return $this->flex;
    }

    public function getFitness(){
        return $this->fitness;
    }

    public function getDetails(){
        return $this->details;
    }

    public function getRequirements(){
        return $this->requirements;
    }

    public function setNewDetails($details){
        $this->details = $details;
    }

    public function setNewRequirements($req){
        $this->requirements = $req;
    }

}