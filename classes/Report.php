<?php 


class Report{

    protected $pdo;


    function __construct($pdo)
    {

        $this->pdo = $pdo;

    }


    public function insertReport(ReportModel $reportModel)
    {

        $qry = '
        INSERT INTO reports(type,type_id,reason,comments)
        VALUES(:type,:id,:reason,:comments)
        ';

        $insertReport = $this->pdo->prepare($qry); 
        $insertReport->execute([
            'type' => $reportModel->getType(),
            'id' => $reportModel->getId(),
            'reason' => $reportModel->getReason(),
            'comments' => $reportModel->getComment()
        ]);



    }










}