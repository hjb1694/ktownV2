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
                    <div class="changeImageArea">
                        <img class="changeImageArea__image" src="data:image/png;base64,<?= base64_encode($userInfo->profileImage); ?>"/>
                        <button class="btn btn--primary change-image changeImageArea__button"><i class="fa fa-edit"></i> Change Profile Image</button>
                    </div>   
                    <form>
                        <div class="fgrp">
                            <label for="userBio">Bio</label>
                            <textarea name="userBio" id="userBio" class="textarea" value="<?= $userInfo->bio; ?>"></textarea>
                        </div>
                        <div class="fgrp">
                            <label for="userOccupation">Occupation</label>
                            <input type="text" class="text-input" id="userOccupation" value="<?= $userInfo->occupation; ?>">
                        </div>
                        <div class="fgrp">
                            <label for="isAnon"><input type="checkbox" id="isPrivate" name="isAnon"> Set Profile Private</label>
                        </div>
                        <div class="fgrp">
                            <button id="subbut" class="btn btn--primary">Save Changes</button>
                        </div>
                    </form>
                    <div id="success-message">

                    </div>
                </main>
            </div>
            <div class="container__mod--4">...</div>
        </div>

        <div class="changeImageModal">
            <div class="changeImageModal__main">
                <i class="fa fa-window-close changeImageModal__closeBtn"></i>
                <div class="changeImageModal__content">
                    <h2>Change Image</h2>
                    <form>
                        <div id="imgcontainer">

                        </div>
                        <input type="file" id="new-image" accept="image/*">
                        <div class="fgrp">
                            <button type="submit" id="crop-and-save" class="btn btn--primary">Crop and Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script src="assets/scripts/toggleNav.js"></script>
        <script src="assets/scripts/toggleSidenav.js"></script>
        <script src="assets/scripts/toggleUserArea.js"></script>
        <script src="assets/scripts/croppie.js"></script>
        <script src="assets/scripts/Helpers.js"></script>
        <script>

            document.querySelector('#subbut').addEventListener('click',function(e){
                e.preventDefault();
                var fields = {
                    bio : document.querySelector('#userBio').value.trim(),
                    occupation : document.querySelector('#userOccupation').value.trim(), 
                    private : document.querySelector('#isPrivate').checked
                }

                $.ajax({
                    url : '../proc/updateProfile.php', 
                    type : 'POST', 
                    data : {
                        bio : fields.bio, 
                        occupation : fields.occupation,
                        private : fields.private
                    }, 
                    success : function(data){

                        document.querySelector('#success-message').textContent = data;

                    }
                });

            });


            function toggleImageModal(){
                document.querySelector('.changeImageModal').classList.toggle('show');
            }





            document.querySelector('.change-image').addEventListener('click',toggleImageModal);
            document.querySelector('.changeImageModal__closeBtn').addEventListener('click',toggleImageModal);

            var el = document.querySelector('#imgcontainer');
            var c = new Croppie(el, {
                viewport: { width: 150, height: 150, type : 'circle' },
                boundary: { width: 300, height: 300 },
                showZoomer: false,
                enableOrientation: true
            });

           document.querySelector('#new-image').addEventListener('change',function(){

               var reader = new FileReader();

               reader.onload = function(e){
                   c.bind({
                       url : event.target.result
                   })

               }
               reader.readAsDataURL(this.files[0]);

           });


           function getNewImage(){

               $.ajax({
                   url : '../proc/getNewProfileImage.php', 
                   type : 'GET', 
                   success : function(data){
                       document.querySelector('.changeImageArea__image').src= 'data:image/png;base64,'+data;
                   }
               });

           }

           document.querySelector('#crop-and-save').addEventListener('click',function(e){
               e.preventDefault();

               c.result({
                   type : 'canvas', 
                   size: 'viewport'
               }).then(function(blob){
                   $.ajax({
                       url:'../proc/insertProfilePic.php', 
                       type : 'POST',
                       data : {
                           'image' : blob
                       }, 
                       success : function(){

                           setTimeout(function(){

                               getNewImage();

                           },2000);
                       }
                   });

               });

           });

        </script>
    </body>
</html>