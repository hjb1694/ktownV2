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
                    <div class="ui styled fluid accordion">
                        <div class="title">
                            <i class="dropdown icon"></i>
                            Manage Coupons + Deals
                        </div>
                        <div class="content">
                            <?php if(!$deals): ?>
                                <p>You haven't posted any deals yet!</p>

                            <?php else: ?>
                            <table class="ui celled table">
                                <thead>
                                    <th>Title</th>
                                    <th>Start Date</th>
                                    <th>Expiration</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    <?php foreach($deals as $deal): ?>
                                        <tr>
                                            <td><?= $deal->title ?></td>
                                            <td><?= $deal->start_date ?></td>
                                            <td><?= $deal->end_date ?></td>
                                            <td><i class="fa fa-edit"></i> <i class="fa fa-times"></i></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php endif;?>
                            <a href="addDeal.php">Add Deal</a>
                        </div>
                        <div class="title">
                            <i class="dropdown icon"></i>
                            Manage Job Postings
                        </div>
                        <div class="content">
                            <a href="addJob.php">Add Job Posting</a>
                        </div>
                        <div class="title">
                            <i class="dropdown icon"></i>
                            Manage Announcements
                        </div>
                        <div class="content">
                            <a href="#">Add Announcement</a>
                        </div>
                        <div class="title">
                            <i class="dropdown icon"></i>
                            Manage Hours
                        </div>
                        <div class="content">
                            <p>A dog is a type of domesticated animal. Known for its loyalty and faithfulness, it can be found as a welcome guest in many households across the world.</p>
                        </div>
                    </div>









                </main>
            </div>
            <div class="container__mod--4">...</div>
        </div>

        <!-- Scripts -->
        <script src="assets/scripts/toggleNav.js"></script>
        <script src="assets/scripts/toggleSidenav.js"></script>
        <script src="assets/scripts/toggleUserArea.js"></script>
        <script src="assets/Semantic-UI/semantic.min.js"></script>
        <script>
            $('.ui.accordion')
            .accordion()
            ;                    
        </script>
    </body>
</html>