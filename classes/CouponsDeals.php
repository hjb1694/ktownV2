<?php 


class CouponsDeals
{

    protected $pdo; 

    function __construct($pdo)
    {
        $this->pdo = $pdo;

    }


    public function getAllDeals()
    {

        $qry = '
        SELECT bl.business_name AS businessName, cd.title AS dealTitle, cd.start_date AS startDate, cd.end_date as expireDate
        FROM business_listings bl
        JOIN couponsdeals cd
        ON bl.id = cd.business_id
        WHERE cd.is_shown = 1 AND CURDATE() < cd.end_date
        ORDER BY cd.end_date DESC
        ';

        $getDeals = $this->pdo->query($qry);
        return $result = $getDeals->fetchAll(PDO::FETCH_OBJ);


    }

    public function getDealsByBizId(int $bizId)
    {

        $qry = '
        SELECT id, title, start_date, end_date 
        FROM couponsdeals
        WHERE business_id = :bizid
        ';

        $getDeals = $this->pdo->prepare($qry); 
        $getDeals->execute([
            'bizid' => $bizId
        ]);
        return $result = $getDeals->fetchAll(PDO::FETCH_OBJ);


    }


    public function insertNewDeal(DealModel $dealModel, int $bizId){

        $qry = '
        INSERT INTO couponsdeals(business_id,title,details,restrictions,start_date,end_date)
        VALUES(:bizid,:title,:details,:restrictions,:start,:expire)
        ';

        $insert = $this->pdo->prepare($qry); 
        $insert->execute([
            'bizid' => $bizId, 
            'title' => $dealModel->getTitle(), 
            'details' => $dealModel->getDetails(), 
            'restrictions' => $dealModel->getRestrictions(), 
            'start' => $dealModel->getStartDate(), 
            'expire' => $dealModel->getExpireDate()
        ]);
        return $insert->rowCount();


    }





}