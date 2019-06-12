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
                        <h1 style="font-size:2.5rem;"><?= $listing->name ?></h1>
                    </div>
                    <div class="card">
                        <div id="map" style="height:40rem;width:100%;background:grey;"></div>
                    </div>
                    <div class="card">
                        <p><?= $listing->street ?></p>
                        <p><?= $listing->city . ', TN ' . $listing->zip ?></p>
                        <p><?= $listing->phone ?></p>
                    </div>
                    <div class="card">
                        <h3>Ratings</h3>
                        <?php if($ratingAvg->overall == null): ?>
                            <p><i>No ratings</i></p>
                        <?php else: ?>
                        <p style="font-size:2rem;"><strong>Overall:</strong> <?= round($ratingAvg->overall) ?> / 5 <i class="fa fa-star"></i></p>
                        <p><strong>Cleanliness:</strong> <?= round($ratingAvg->cleanliness) ?> / 5 <i class="fa fa-star"></i></p>
                        <p><strong>Service:</strong> <?= round($ratingAvg->service) ?> / 5 <i class="fa fa-star"></i></p>
                        <p><strong>Selection:</strong> <?= round($ratingAvg->selection) ?> / 5 <i class="fa fa-star"></i></p>
                        <p><strong>Quality:</strong> <?= round($ratingAvg->quality) ?> / 5 <i class="fa fa-star"></i></p>
                        <?php endif; ?>
                    </div>
                    <?php 
                    
                    if(isset($uid)){
                    
                        if(!$dining->checkIfRatingExists($uid,$id)->count){
                    ?>
                    <div class="card writeReviewForm">
                        <h3>Write a Review</h3>
                        <div class="ratingRadios">
                        <fieldset class="ratingRadios__fieldset">
                            <legend>Overall</legend>
                            <div class="ui radio checkbox">
                                <input type="radio" value="1" name="overall">
                                <label>1</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="2" name="overall">
                                <label>2</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="3" name="overall">
                                <label>3</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="4" name="overall">
                                <label>4</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="5" name="overall">
                                <label>5</label>
                            </div>
                        </fieldset>
                        <fieldset class="ratingRadios__fieldset">
                            <legend>Cleanliness</legend>
                            <div class="ui radio checkbox">
                                <input type="radio" value="1" name="clean">
                                <label>1</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="2" name="clean">
                                <label>2</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="3" name="clean">
                                <label>3</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="4" name="clean">
                                <label>4</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="5" name="clean">
                                <label>5</label>
                            </div>
                        </fieldset>
                        <fieldset class="ratingRadios__fieldset">
                            <legend>Service</legend>
                            <div class="ui radio checkbox">
                                <input type="radio" value="1" name="service">
                                <label>1</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="2" name="service">
                                <label>2</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="3" name="service">
                                <label>3</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="4" name="service">
                                <label>4</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="5" name="service">
                                <label>5</label>
                            </div>
                        </fieldset>
                        <fieldset class="ratingRadios__fieldset">
                            <legend>Selection</legend>
                            <div class="ui radio checkbox">
                                <input type="radio" value="1" name="selection">
                                <label>1</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="2" name="selection">
                                <label>2</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="3" name="selection">
                                <label>3</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="4" name="selection">
                                <label>4</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="5" name="selection">
                                <label>5</label>
                            </div>
                        </fieldset>
                        <fieldset class="ratingRadios__fieldset">
                            <legend>Quality</legend>
                            <div class="ui radio checkbox">
                                <input type="radio" value="1" name="quality">
                                <label>1</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="2" name="quality">
                                <label>2</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="3" name="quality">
                                <label>3</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="4" name="quality">
                                <label>4</label>
                            </div>
                            <div class="ui radio checkbox">
                                <input type="radio" value="5" name="quality">
                                <label>5</label>
                            </div>
                        </fieldset>
                        </div>
                        <div>
                            <textarea name="narrative" id="narrative" class="textarea"></textarea>
                        </div>
                        <div>
                            <button class="btn btn--primary" id="subbut">Submit</button>
                        </div>
                        <div class="errbox"></div>
                    </div>
                    <script>
                        var subbut = document.querySelector('#subbut');

                        subbut.addEventListener('click',function(){

                            var errs = 0;
                            var errmsg = [];
                            var errbox = document.querySelector('.errbox');
                            errbox.innerHTML = '';
                            var fields = {
                                overall : document.getElementsByName('overall'),
                                cleanliness : document.getElementsByName('clean'),
                                service : document.getElementsByName('service'),
                                selection : document.getElementsByName('selection'),
                                quality : document.getElementsByName('quality'), 
                                narrative : document.getElementById('narrative').value
                            }

                            function checkIfChecked(group){

                                for(var i = 0; i < group.length; i++){

                                    if(group[i].checked){
                                        return true;
                                    }
                                }

                                return false;
                            }

                            function getVal(group){

                                for(var i = 0; i < group.length; i++){

                                    if(group[i].checked){
                                        return group[i].value;
                                    }
                                }

                            }

                            if(!checkIfChecked(fields.overall)){
                                errs++; 
                                errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please select an overall rating</p>');
                            }
                            if(!checkIfChecked(fields.cleanliness)){
                                errs++; 
                                errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please select a cleanliness rating</p>');
                            }
                            if(!checkIfChecked(fields.service)){
                                errs++; 
                                errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please select a service rating</p>');
                            }
                            if(!checkIfChecked(fields.selection)){
                                errs++; 
                                errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please select a selection rating</p>');
                            }
                            if(!checkIfChecked(fields.quality)){
                                errs++; 
                                errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Please select a quality rating</p>');
                            }
                            if(fields.narrative.trim().length < 50){
                                errs++; 
                                errmsg.push('<p><i class="fa fa-exclamation-triangle"></i> Your narrative is too short</p>');
                            }

                            if(errs){
                                for(var i = 0; i < errmsg.length; i++){
                                    errbox.insertAdjacentHTML('beforeend',errmsg[i]);
                                }
                            } else {

                                subbut.disabled = true;
                                subbut.innerHTML = '<img src="assets/Spinner.gif"  style="width:3rem;" />';

                                $.ajax({
                                    url : '../proc/submitNewReview.php', 
                                    type : 'POST',
                                    data : {
                                        overall : getVal(fields.overall),
                                        cleanliness : getVal(fields.cleanliness),
                                        service : getVal(fields.service), 
                                        selection : getVal(fields.selection), 
                                        quality : getVal(fields.quality), 
                                        narrative : fields.narrative, 
                                        dinId : <?= $id ?>
                                    },
                                    success : function(data){
                                        if(data == 1){
                                            errbox.innerHTML = '<p><i class="fa fa-exclamation-circle"></i> There was an issue processing your request</p>';
                                        } else {
                                            document.querySelector('.writeReviewForm').textContent = 'You review has been submitted.';
                                            getReviews();
                                        }
                                    }
                                });




                            }




                        });
                    </script>
                    <?php 
                        }
                    }
                    ?>
                    <section class="reviewsArea">

                    </section>

                </main>
            </div>
            <div class="container__mod--4">...</div>
        </div>

        <!-- Scripts -->
        <script src="assets/scripts/toggleNav.js"></script>
        <script src="assets/scripts/toggleSidenav.js"></script>
        <script src="assets/scripts/toggleUserArea.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxHlWziSJ69DLsRY-eHiEYDTDdyZyoua8&callback=initMap"
        type="text/javascript"></script>
        <script>
            var reviewArea = document.querySelector('.reviewsArea');


            function populateReviews(reviews){

                for(review of reviews){

                    var reviewTile = document.createElement('div');
                    reviewTile.classList.add('card'); 
                    reviewTile.classList.add('reviewTile')
                    var username = document.createElement('h3');
                    username.textContent = review.username; 
                    reviewTile.appendChild(username);
                    var overall = document.createElement('p');
                    overall.innerHTML = '<p> Overall: ' + review.overall + ' / 5 <i class="fa fa-star"></i></p>';
                    reviewTile.appendChild(overall);
                    var clean = document.createElement('p');
                    clean.innerHTML = '<p> Cleanliness: ' + review.cleanliness + ' / 5 <i class="fa fa-star"></i></p>';
                    reviewTile.appendChild(clean);
                    var service = document.createElement('p');
                    service.innerHTML = '<p> Service: ' + review.service + ' / 5 <i class="fa fa-star"></i></p>';
                    reviewTile.appendChild(service);
                    var selection = document.createElement('p');
                    selection.innerHTML = '<p> Selection: ' + review.selection + ' / 5 <i class="fa fa-star"></i></p>';
                    reviewTile.appendChild(selection);
                    var narrative = document.createElement('p');
                    narrative.innerHTML = '<div>'+ review.narrative +'</div>';
                    reviewTile.appendChild(narrative);

                    reviewArea.appendChild(reviewTile);


                }



            }





            function getReviews(){

                $.ajax({
                    url : '../proc/getDiningReviews.php',
                    type : 'GET', 
                    data : {
                        dinId : <?= $id ?>
                    },
                    success : function(data){
                        var resp = JSON.parse(data);

                        if(resp.err){
                            reviewArea.textContent = 'There are no reviews yet';
                        } else {

                            populateReviews(resp);

                        }
                    }
                });


            }
            


            function initMap(){

                var map = document.querySelector('#map');
                var center = {lat : 35.9606, lng : -83.9207}
                var place = {lat : <?= $listing->lat ?>, lng: <?= $listing->lon ?>}

                var map = new google.maps.Map(map, {
                    zoom: 9, 
                    center : center
                });

                var marker = new google.maps.Marker({
                    position : place, 
                    map : map
                });

            }

            getReviews();

        </script>
    </body>
</html>