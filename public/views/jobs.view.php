<!DOCTYPE html>
<html lang="en">
    <?php require 'inc/head.view.php'; //HEAD ?>
    <body>
        <?php include 'inc/navbar.view.php'; //NAVBAR ?>
        
        <div class="container">
            <div class="container__mod--1">
                <?php include 'inc/sidenav.view.php'; //SIDENAV ?>
            </div>
            <div class="container__mod--2">
                <?php include 'inc/userarea.view.php'; //USERAREA ?>
            </div>
            <div class="container__mod--3">
                <main class="p-rem1">
                    <!--Page content goes here-->
                    <?php foreach($allJobs as $job): ?>
                        <div class="jobTile">
                            <h3 class="jobTile__jobTitle"><a href="jobDetails.php?id=<?= $job->listingId ?>"><?= $job->jobTitle ?></a></h3>
                            <p><?= $job->businessName ?></p>
                            <p><?= '$'. $job->rangeStart . ' to $' . $job->rangeEnd . ' ' . $job->payType ?></p>
                            <p class="jobTile__jobCat"><?= $job->jobCategory ?></p>
                        </div>
                    <?php endforeach; ?>







                </main>
            </div>
            <div class="container__mod--4">...</div>
        </div>

        <!-- Scripts -->
        <script src="assets/scripts/toggleNav.js"></script>
        <script src="assets/scripts/toggleSidenav.js"></script>
        <script src="assets/scripts/toggleUserArea.js"></script>
    </body>
</html>