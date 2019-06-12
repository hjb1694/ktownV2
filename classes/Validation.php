<?php 

class Validation
{


    public function validateNewPost(PostModel $postModel)
    {


        //edit later******

        return true;
        

    }

    public static function validateReport(ReportModel $reportModel)
    {

        if(!is_numeric($reportModel->getId())){
            return false;
        }
        if(!is_numeric($reportModel->getType())){
            return false;
        }
        if(!is_numeric($reportModel->getReason())){
            return false;
        }

       return true;

    }



}