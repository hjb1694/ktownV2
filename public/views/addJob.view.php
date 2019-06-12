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
                    <form action="">
                        <div class="fgrp">
                            <label for="jobTitle">Job Title</label>
                            <input type="text" id="jobTitle" name="jobTitle" class="text-input">
                        </div>
                        <div class="fgrp">
                            <label for="jobCat">Category</label>
                            <select name="jobCat" id="jobCat" class="select-input">
                                <option value="">--SELECT--</option>
                                <option value="1">Administrative + Clerical</option>
                                <option value="2">Automotive</option>
                                <option value="3">Child Care</option>
                                <option value="4">Construction</option>
                                <option value="5">Consulting</option>
                                <option value="6">Customer Service</option>
                                <option value="7">Design</option>
                                <option value="8">Education</option>
                                <option value="9">Engineering</option>
                                <option value="10">Finance</option>
                                <option value="11">Food Service</option>
                                <option value="12">General Labor</option>
                                <option value="13">Healthcare</option>
                                <option value="14">Hospitality</option>
                                <option value="15">Human Resources</option>
                                <option value="16">Information Technology</option>
                                <option value="17">Legal</option>
                                <option value="18">Maintainenece + Janitorial</option>
                                <option value="19">Manufacturing</option>
                                <option value="20">Media + Journalism</option>
                                <option value="21">Public Safety + Security</option>
                                <option value="22">Purchasing</option>
                                <option value="23">Real Estate</option>
                                <option value="24">Recreation + Sports</option>
                                <option value="25">Research</option>
                                <option value="26">Retail</option>
                                <option value="27">Sales + Marketing</option>
                                <option value="28">Strategy + Planning</option>
                                <option value="29">Veterinary Medicine + Pet Care</option>
                                <option value="30">Warehouse</option>
                            </select>
                        </div>
                        <div class="fgrp">
                            <label for="jobType">Job Type</label>
                            <select class="select-input" name="jobType" id="jobType">
                                <option value="">--SELECT--</option>
                                <option value="1">Full Time</option>
                                <option value="2">Part Time</option>
                                <option value="3">Per Diem/As Needed/PRN</option>
                                <option value="4">Contractor</option>
                            </select>
                        </div>
                        <div class="fgrp">
                            <label for="jobLocation">Location</label>
                            <select name="jobLocation" id="jobLocation" class="select-input">
                                <option value="">--SELECT--</option>
                                <option value="1">Onsite</option>
                                <option value="2">Remote</option>
                            </select>
                        </div>
                        <div class="fgrp">
                            <label for="">Salary/Wage Range Start ($USD)</label>
                            <input type="number" id="salaryRangeStart" name="salaryRangeStart" class="text-input">
                        </div>
                        <div class="fgrp">
                            <label for="salaryRangeEnd">Salary/Wage Range End ($USD)</label>
                            <input type="number" id="salaryRangeEnd" name="salaryRangeEnd" class="text-input">
                        </div>
                        <div class="fgrp">
                            <label for="salaryType">Salary/Wage Per</label>
                            <select class="select-input" name="salaryType" id="salaryType">
                                <option value="">--SELECT--</option>
                                <option value="1">Hourly</option>
                                <option value="2">Monthly</option>
                                <option value="3">Annually</option>
                            </select>
                        </div>
                        <div class="fgrp">
                            <fieldset>
                                <legend>Benefits</legend>
                                <div class="ui checkbox">
                                    <input id="health" name="health" type="checkbox"> 
                                    <label>Health Insurance</label>
                                </div>
                                <div class="ui checkbox">
                                    <input type="checkbox" id="dental" name="dental"> 
                                    <label>Dental Insurance</label>
                                </div>
                                <div class="ui checkbox">
                                    <input type="checkbox" id="vision" name="vision"> 
                                    <label>Vision Insurance</label>
                                </div>
                                <div class="ui checkbox">
                                    <input type="checkbox" id="retirement" name="retirement"> 
                                    <label>Retirement</label>
                                </div>
                                <div class="ui checkbox">
                                    <input type="checkbox" id="flex" name="flex"> 
                                    <label>Flex Days</label>
                                </div>
                                <div class="ui checkbox">
                                    <input type="checkbox" id="paid" name="paid"> 
                                    <label>Paid Vacation</label>
                                </div>
                                <div class="ui checkbox">
                                    <input type="checkbox" id="fitness" name="fitness"> 
                                    <label>Fitness Center Membership</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="fgrp">
                            <label for="jobDetails">Details</label>
                            <textarea class="textarea" name="jobDetails" id="jobDetails"></textarea>
                        </div>
                        <div class="fgrp">
                            <label for="jobRequirements">Requirements</label>
                            <textarea name="jobRequirements" id="jobRequirements" class="textarea"></textarea>
                        </div>
                        <div class="fgrp">
                            <button type="submit" id="subbut" class="btn btn--primary">Submit</button>
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
        <script src="assets/scripts/Helpers.js"></script>
        <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector : '#jobDetails', 
                menubar: false,
                plugins : 'link lists',
                toolbar : 'bold italic underline strikethrough | link | bullist numlist'
            });
            tinymce.init({
                selector : '#jobRequirements', 
                menubar: false,
                plugins : 'link lists',
                toolbar : 'bold italic underline strikethrough | link | bullist numlist'
            });

            document.querySelector('#subbut').addEventListener('click',function(e){
                e.preventDefault();

                var errs = 0;
                var errmsg = [];
                var errbox = document.querySelector('.errbox');
                errbox.innerHTML = '';

                var fields = {
                    title : document.querySelector('#jobTitle').value.trim(), 
                    category : document.querySelector('#jobCat').value, 
                    type : document.querySelector('#jobType').value, 
                    location : document.querySelector('#jobLocation').value,
                    salRangeStart : document.querySelector('#salaryRangeStart').value, 
                    salRangeEnd : document.querySelector('#salaryRangeEnd').value, 
                    salaryType : document.querySelector('#salaryType').value, 
                    health : document.querySelector('#health').checked, 
                    dental : document.querySelector('#dental').checked, 
                    vision : document.querySelector('#vision').checked,
                    retirement : document.querySelector('#retirement').checked,
                    flex : document.querySelector('#flex').checked,
                    paid : document.querySelector('#paid').checked,
                    fitness : document.querySelector('#fitness').checked,
                    details : tinymce.get('jobDetails').getContent(), 
                    requirements : tinymce.get('jobRequirements').getContent()
                }

                if(fields.title.length < 5){
                    errs++;
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Title is too short</p>');
                }
                if(fields.category === ''){
                    errs++; 
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please select a category</p>');
                }
                if(fields.location === ''){
                    errs++; 
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please select location</p>');
                }
                if(fields.salRangeStart < 1){
                    errs++
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please enter a valid salary/wage range start</p>');
                }
                if(fields.salRangeEnd < 1 || fields.salRangeEnd < fields.salRangeStart){
                    errs++
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please enter a valid salary/wage range end</p>');
                }
                if(salaryType === ''){
                    errs++
                    errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please select a salary type</p>');
                }

                if(errs){
                    for(var i = 0; i < errmsg.length; i++){
                        errbox.insertAdjacentHTML('beforeend',errmsg[i]);
                    }

                }else{

                    $.ajax({
                        url : '../proc/insertNewJob.php', 
                        type : 'POST', 
                        data : {
                            title : fields.title, 
                            category : fields.category, 
                            type : fields.type, 
                            location : fields.location, 
                            salRangeStart : fields.salRangeStart, 
                            salRangeEnd : fields.salRangeEnd, 
                            salaryType : fields.salaryType, 
                            health : fields.health, 
                            vision : fields.vision, 
                            dental : fields.dental, 
                            retirement : fields.retirement, 
                            flex : fields.flex, 
                            paid : fields.paid, 
                            fitness : fields.fitness, 
                            details : fields.details, 
                            requirements : fields.requirements
                        },
                        success : function(data){
                            if(data == 1){
                                errbox.innerHTML = '<p><i class="fa fa-exclamation-triangle"></i> Sorry, there was an issue processing your request</p>';
                            }else{
                                window.location.href = 'bizMgr.php';
                            }
                        }
                    });




                }
            });
        </script>
    </body>
</html>