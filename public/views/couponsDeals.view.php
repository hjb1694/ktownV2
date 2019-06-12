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
                    <p>Results: <?= count($allDeals) ?></p>
                    <?php foreach($allDeals as  $deal): ?>
                        <div class="dealTile">
                            <h3><?= $deal->dealTitle ?></h3>
                            <p><?= $deal->businessName ?></p>
                            <p><i class="fa fa-clock"></i> <?= date_format(date_create($deal->startDate), 'm/d/Y') . ' - ' . date_format(date_create($deal->expireDate),'m/d/Y') ?></p>
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