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
            <div class="container__mod--3 p-rem1">
                <main>
                    <!--Page content goes here-->
                    <?php if($postsLimited): ?>
                        <div class="alertBox alertBox--red">
                            <p class="alertBox__text">You have reached your daily asking limit.</p>
                        </div>
                    <?php endif; ?>

                    <form id="newPostForm" autocomplete="off">
                        <div class="fgrp">
                            <label for="postTitle">Title</label>
                            <input type="text" name="postTitle" id="postTitle" class="text-input" maxlength="75">
                        </div>
                        <div class="fgrp">
                            <label>Category</label>
                            <select name="postCategory" id="postCategory" class="select-input">
                                <option value="">-- SELECT --</option>
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
                        </div>
                        <div class="fgrp">
                            <textarea name="postContent" id="postContent" class="textarea"></textarea>
                        </div>
                        <div class="fgrp">
                           <label><input type="checkbox"/> Anonymous</label>
                        </div>
                        <div class="fgrp">
                            <?php if(!$postsLimited):  ?>
                            <button  type="submit" id="subbut" class="btn btn--primary">Submit</button>
                            <?php else: ?>
                            <button type="button" class="btn btn--disabled" disabled>Submit</button>
                            <?php endif; ?>
                        </div>
                        <div class="errbox"></div>
                    </form>
                </main>
            </div>
            <div class="container__mod--4">...</div>
        </div>

        <!-- Scripts -->
        <script src="assets/scripts/Helpers.js"></script>
        <script src="assets/scripts/toggleNav.js"></script>
        <script src="assets/scripts/toggleSidenav.js"></script>
        <script src="assets/scripts/toggleUserArea.js"></script>
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
             tinymce.init({
                selector : '#postContent', 
                menubar: false,
                plugins : 'link',
                toolbar : 'bold italic underline strikethrough | link'
            });
        </script>
        <?php if(!$postsLimited): ?>
        <script src="assets/scripts/newPostSubmission.js"></script>
        <?php endif; ?>
    </body>
</html>