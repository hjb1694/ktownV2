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
                    <section class="diningSearchArea">
                        <h2><i class="fa fa-search"></i> Search</h2>
                        <form>
                            <div class="fgrp">
                                <label for="">Type</label>
                                <select class="ui fluid search dropdown" name="" id="" multiple>
                                    <option value="">--SELECT--</option>
                                    <option value="1">Asian</option>
                                    <option value="2">Japanese + Hibachi</option>
                                    <option value="3">Chinese</option>
                                    <option value="4">Indian</option>
                                    <option value="5">Korean</option>
                                    <option value="7">Vietnamese</option>
                                    <option value="8">Thai</option>
                                    <option value="9">Mexican + Latino</option>
                                    <option value="10">Caribbean</option>
                                    <option value="11">Cuban</option>
                                </select>
                            </div>
                            <div class="fgrp">
                                <label for="">Tags</label>
                                <select name="" id="" class="ui fluid search dropdown" multiple>
                                    <option value="">--SELECT--</option>
                                    <?php foreach($tags as $tag): ?>
                                    <option value="<?= $tag->id ?>"><?= $tag->tag ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </form>
                    </section>

                    <section class="card">
                        <div id="map" style="width:100%;height:40rem;background:grey;"></div>
                    </section>

                    <section class="diningListingArea">
                        <?php foreach($allDiningListings as $listing): ?>
                            <div class="diningListingTile">
                                <p class="diningListingTile__title"><a href="diningListing.php?id=<?= $listing->id ?>"><?= $listing->name ?></a></p>
                                <p class="diningListingTile__address"><?= $listing->street . ', ' . $listing->city . ', TN ' . $listing->zip ?></p>
                                <div>
                                <?php if($listing->overall_rating == null): ?>
                                <span class="diningListingTile__rating"><i>No Rating</i></span>
                                <?php else: ?>
                                <span class="diningListingTile__rating"><?= $listing->overall_rating ?> / 5</span>
                                <?php endif; ?>
                                <i class="fa fa-star"></i>
                                </div>
                                <?php 
                                $typesArray = preg_split('/,/',$listing->types);
                                foreach($typesArray as $type):
                                ?>
                                <div class="diningListingTile__type"><?= $type ?></div>
                                <?php endforeach; ?>
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
        <script src="assets/Semantic-UI/semantic.min.js"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxHlWziSJ69DLsRY-eHiEYDTDdyZyoua8&callback=initMap"
        type="text/javascript"></script>
        <script>

            var mapElem; 
            var center;
            var map;


            function initMap(){

                mapElem = document.querySelector('#map');
                center = {lat : 35.9606, lng : -83.9207}

                map = new google.maps.Map(mapElem, {
                    zoom: 9, 
                    center : center
                });

                $.ajax({
                url : '../proc/getDiningMapData.php',
                type : 'GET',
                success : function(data){

                    var results = JSON.parse(data);
                    
                    results.forEach(function(result){
                        
                        var marker = new google.maps.Marker({
                            position : {lat : parseFloat(result.lat) , lng : parseFloat(result.lon)}, 
                            map : map
                        });

                        var infoWindow = new google.maps.InfoWindow;

                        var windowContent = document.createElement('div');
                        windowContent.textContent = result.name;

                        marker.addListener('click',function(){
                            infoWindow.setContent(windowContent);
                            infoWindow.open(map, marker);
                        })


                    });


                }
            });

            }
        </script>
        <script>
            $('.ui.dropdown')
            .dropdown()
            ;
        </script>
    </body>
</html>