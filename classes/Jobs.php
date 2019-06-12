<?php 

class Jobs
{

    protected $pdo; 

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addJob(JobModel $jobModel, int $bizId)
    {
        $qry = '
        INSERT INTO job_listings(business_id,job_title,job_category,job_type,job_location,job_salrange_start,job_salrange_end,pay_type,health,
        dental,vision,retirement,paid_vacation,fitness,details,requirements)
        VALUES(:bizId,:title,:category,:type,:location,:salStart,:salEnd,:payType,:health,:dental,:vision,:retirement,:paidVacation,:fitness,:details,:requirements)
        ';

        $insert = $this->pdo->prepare($qry);
        $insert->execute([
            'bizId' => $bizId, 
            'title' => $jobModel->getTitle(), 
            'category' => $jobModel->getCategory(),
            'type' => $jobModel->getType(),
            'location' => $jobModel->getLocation(), 
            'salStart' => $jobModel->getSalRangeStart(), 
            'salEnd' => $jobModel->getSalRangeEnd(), 
            'payType' => $jobModel->getPayType(),
            'health' => $jobModel->getHealth(), 
            'dental' => $jobModel->getDental(), 
            'vision' => $jobModel->getVision(), 
            'retirement' => $jobModel->getRetirement(), 
            'paidVacation' => $jobModel->getPaidVacation(), 
            'fitness' => $jobModel->getFitness(), 
            'details' => htmlspecialchars($jobModel->getDetails()),
            'requirements' => htmlspecialchars($jobModel->getRequirements())

        ]);
        return $result = $insert->rowCount();
    }

    public function getAllJobs()
    {
        $qry = '
        SELECT bl.business_name AS businessName, jl.id AS listingId, jl.job_title AS jobTitle, jc.category AS jobCategory, jt.type AS jobType, jloc.location AS jobLocation, 
        jl.job_salrange_start AS rangeStart, jl.job_salrange_end AS rangeEnd, pt.pay_type AS payType, jl.health AS health, jl.dental AS dental, jl.vision AS vision, 
        jl.retirement AS retirement, jl.flex AS flex, jl.paid_vacation AS vacation, jl.fitness AS fitness, jl.details AS details, jl.requirements AS requirements
        FROM job_listings jl
        JOIN business_listings bl
        ON bl.id = jl.business_id 
        JOIN job_categories jc 
        ON jl.job_category = jc.id
        JOIN job_types jt 
        ON jl.job_type = jt.id 
        JOIN job_locations jloc 
        ON jl.job_location = jloc.id
        JOIN pay_types pt 
        ON jl.pay_type = pt.id
        WHERE jl.is_shown = 1
        ';

        $getAll = $this->pdo->query($qry);
        return $result = $getAll->fetchAll(PDO::FETCH_OBJ);

    }

    public function getJobById(int $id)
    {
        $qry = '
        SELECT bl.business_name AS businessName, bl.business_street AS street, bl.business_city AS city, bl.business_zip AS zip, jl.id AS listingId, jl.job_title AS jobTitle, jc.category AS jobCategory, 
        jt.type AS jobType, jloc.location AS jobLocation, jl.job_salrange_start AS rangeStart, jl.job_salrange_end AS rangeEnd, pt.pay_type AS payType, 
        jl.health AS health, jl.dental AS dental, jl.vision AS vision, jl.retirement AS retirement, jl.flex AS flex, jl.paid_vacation AS vacation, 
        jl.fitness AS fitness, jl.details AS details, jl.requirements AS requirements
        FROM job_listings jl
        JOIN business_listings bl
        ON bl.id = jl.business_id 
        JOIN job_categories jc 
        ON jl.job_category = jc.id
        JOIN job_types jt 
        ON jl.job_type = jt.id 
        JOIN job_locations jloc 
        ON jl.job_location = jloc.id
        JOIN pay_types pt 
        ON jl.pay_type = pt.id
        WHERE jl.is_shown = 1 AND jl.id = :id
        ';

        $getJob = $this->pdo->prepare($qry);
        $getJob->execute([
            'id' => $id
        ]);
        return $result = $getJob->fetch(PDO::FETCH_OBJ);


    }









}