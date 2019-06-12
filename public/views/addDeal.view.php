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
                    <form id="newDealForm" action="" method="POST">
                        <div class="fgrp">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="text-input">
                        </div>
                        <div class="fgrp">
                            <label for="details">Details</label>
                            <textarea name="details" id="details" class="textarea"></textarea>
                        </div>
                        <div class="fgrp">
                            <label for="restrictions">Restrictions</label>
                            <textarea name="restrictions" id="restrictions" class="textarea"></textarea>
                        </div>
                        <div class="fgrp">
                            <label for="startDate">Start Date</label>
                            <input type="text" name="startDate" class="text-input" id="startDate" placeholder="MM/DD/YYYY"/>
                        </div>
                        <div class="fgrp">
                            <label for="expireDate">Expiration Date</label>
                            <input type="text" name="expireDate" class="text-input" id="expireDate" placeholder="MM/DD/YYYY"/>
                        </div>
                        <div class="fgrp">
                            <input type="submit" id="subbut" name="subbut" class="btn btn--primary" value="Submit">
                        </div>
                    </form>
                    <div class="errbox"></div>
                </main>
            </div>
            <div class="container__mod--4">...</div>
        </div>

        <!-- Scripts -->
        <script src="assets/scripts/toggleNav.js"></script>
        <script src="assets/scripts/toggleSidenav.js"></script>
        <script src="assets/scripts/toggleUserArea.js"></script>
        <script src="assets/scripts/moment.js"></script>
        <script src="assets/scripts/Helpers.js"></script>
        <script>
            $( function() {
                $( "#startDate" ).datepicker();
                $('#expireDate').datepicker();
            } );

            $('#subbut').on('click',function(e){

                e.preventDefault();

                var errs = 0;
                var errmsg = [];
                var errbox = document.querySelector('.errbox');
                errbox.innerHTML = '';

                var fields = {
                    title : document.querySelector('#title').value,
                    details : document.querySelector('#details').value,
                    restrictions : document.querySelector('#restrictions').value,
                    startDate : document.querySelector('#startDate').value,
                    expireDate : document.querySelector('#expireDate').value
                }

                var format = 'MM/DD/YYYY';
                var momentStartDate = moment(fields.startDate,format);
                var momentExpireDate = moment(fields.expireDate,format);

                if(Helpers.stripTags(fields.title).length < 10){
                    errs++;
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Your title is too short</p>');
                }

                if(Helpers.stripTags(fields.details).length < 10){
                    errs++;
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please add more to details</p>');
                }

                if(Helpers.stripTags(fields.restrictions).length < 10){
                    errs++;
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please add more to restirctions</p>');
                }

                if(!momentStartDate.isValid()){
                    errs++; 
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please enter a valid start date</p>');

                }
                if(!momentExpireDate.isValid()){
                    errs++; 
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please enter a valid expiration date</p>');

                }

                if(errs){
                    for(var i = 0; i < errmsg.length; i++){
                        errbox.insertAdjacentHTML('beforeend',errmsg[i]);
                    }
                } else {

                    $.ajax({
                        url : '../proc/addNewDeal.php', 
                        type : 'POST',
                        data : {
                            title : fields.title, 
                            details : fields.details, 
                            restrictions : fields.restrictions, 
                            startDate : fields.startDate, 
                            expireDate : fields.expireDate
                        },
                        success : function(data){

                            if(data == 1){
                                errbox.innerHTML = '<p><i class="fa fa-exclamation-triangle"></i> There was an error processing your request.</p>';
                            } else {
                                window.location.href = 'bizMgr.php';
                            }
                        }
                    });
                    
                }
            });
        </script>
    </body>
</html>