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
                    <div class="card">
                        <h1 style="font-size:2.5rem"><?= $job->jobTitle ?></h1>
                    </div>
                    <div class="card">
                        <p><strong><i class="fa fa-map-pin"></i> <?= $job->businessName ?></strong></p>
                        <p><?= $job->street ?></p>
                        <p><?= $job->city . ', TN ' . $job->zip ?></p>
                    </div>
                    <div class="card">
                        <p><strong>Category:</strong> <?= $job->jobCategory ?></p>
                        <p><strong>Location:</strong> <?= $job->jobLocation ?></p>
                        <p><strong>Salary/Wage:</strong> <?= '$' .$job->rangeStart . ' - $' . $job->rangeEnd . ' ' . $job->payType ?></p>
                    </div>
                    <div class="card">
                        <h3>Benefits</h3>
                        <p><strong>Health Insurance:</strong> <?= yesorno($job->health) ?></p>
                        <p><strong>Dental Insurance:</strong> <?= yesorno($job->dental) ?></p>
                        <p><strong>Vision Insurance:</strong> <?= yesorno($job->vision) ?></p>
                        <p><strong>Retirement Benefits:</strong> <?= yesorno($job->retirement) ?></p>
                        <p><strong>Flex Days:</strong> <?= yesorno($job->flex) ?></p>
                        <p><strong>Paid Vacation:</strong> <?= yesorno($job->vacation) ?></p>
                        <p><strong>Fitness Center Access:</strong> <?= yesorno($job->fitness) ?></p>
                    </div>
                    <div class="card">
                        <h3>Details</h3>
                        <div><?= htmlspecialchars_decode($job->details) ?></div>
                    </div>
                    <div class="card">
                        <h3>Requirements</h3>
                        <div><?= htmlspecialchars_decode($job->requirements) ?></div>
                    </div>
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