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
                <main class="discussionMain">
                    <!--Page content goes here-->
                    <section class="discussionMain__menu">
                        <a href="createDiscussion.php" class="btn btn--primary" style="font-size:1.6rem;"><i class="fa fa-plus"></i> Create Discussion</a>
                        
                            <select class="ui selection dropdown">
                                <option value="">All Posts - Most Recent</option>
                                <option value="1">General + Other</option>
                                <option value="2">New to Knoxville</option>
                                <option value="3">Tourism</option>
                                <option value="4">Activities + Events</option>
                                <option value="5">Health + Safety</option>
                                <option value="6">Society + Politics</option>
                                <option value="7">University of Tennessee</option>
                                <option value="8">Career + Education</option>
                                <option value="9">Dining + Shopping</option>
                                <option value="10">Lifestyle</option>
                            </select>
                    </section>
                    <section class="p-rem1">
                        <?php foreach($allPosts as $singlePost): ?>
                            <div class="postTile">
                                <p class="postTile__title">
                                    <a href="discussionPost.php?id=<?= $singlePost->postId; ?>" style="text-decoration:none;"><?= $singlePost->postTitle; ?></a>
                                </p>
                                <p class="postTile__author">
                                    <img class="postTile__author--image" src="data:image/png;base64,<?= base64_encode($singlePost->profileImage); ?>"/>
                                    <span><?= $singlePost->postOwner; ?></span>
                                </p>
                                <p class="postTile__category"><?= $singlePost->postCat; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </section>






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