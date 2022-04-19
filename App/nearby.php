<?php
include_once '../access/connect.php';
session_start();
$phid = $_SESSION['phone'];
$queryloc = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_leads WHERE phone = '$phid'"));
$sid = $queryloc['project_id'];
$getll = mysqli_fetch_assoc(mysqli_query($connection, "SELECT * FROM bn_project WHERE builder_id = '$sid'"));
$lat = $getll['latitude'];
$lng = $getll['longitude'];
?>
<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<title>Nearby</title>
<?php include '../components/head.php' ?>
<style>
    .fas {
        padding: 20px;
        font-size: 30px;
        width: 75px;
        text-align: center;
        text-decoration: none;
        margin: 5px 2px;
        border-radius: 50%;
        box-shadow: 0px 1px 1px 0px #000;
    }

    .fas:hover {
        opacity: 0.7;
    }

    .facebook {
        background: #fff;
        color: black;
    }

    @media only screen and (max-width: 823px) {
        .shadow {
            height: 450px;
        }
    }

    @media only screen and (max-width: 640px) {
        .shadow {
            height: 450px;
        }
    }
</style>
<!--END-->

<body>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Header Area-->
    <?php include '../components/nav-sidebar.php' ?>
    <!--END-->
    <!-- MAPS -->
    <div class="page-content-wrapper py-3">
        <div class="wrapper py-2">
            <div class="carousel" style="color:black;">
                <div data-val="train_station" onclick='clickedRes(this);'>
                    <a href="#" class="fas fa fa-train facebook"></a>
                    <br>
                    <span class="text-center">
                        &nbsp;&nbsp;&nbsp;&nbsp;Railway
                    </span>
                </div>
                <div data-val="school" onclick='clickedRes(this);'>
                    <a href="#" class="fas fa  fa-university facebook"></a>
                    <br>
                    <span class="text-center">
                        &nbsp;&nbsp;&nbsp;&nbsp;School
                    </span>
                </div>
                <div data-val="atm" onclick='clickedRes(this);'>
                    <a href="#" class="fas fa fa-credit-card facebook"></a>
                    <br>
                    <span class="text-center">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ATM
                    </span>
                </div>
                <div data-val="home_goods_store" onclick='clickedRes(this);'>
                    <a href="#" class="fas fa fa-shopping-basket facebook">
                    </a>
                    <br>
                    <span class="text-center">
                        &nbsp;&nbsp;&nbsp;&nbsp;Shops
                    </span>
                </div>
                <div data-val="movie_theater" onclick='clickedRes(this);'>
                    <a href="#" class="fas fa fa-camera facebook"></a>
                    <br>
                    <span class="text-center">
                        &nbsp;&nbsp;Theatres
                    </span>
                </div>
            </div>
        </div>
        <div>
            <div id="map" class="shadow" style="width:100%;"></div>
        </div>
        <div style="height:60px;">
        </div>
    </div>
    <!-- END -->

    <!-- Footer Nav-->
    <?php include '../components/footer.php' ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1gcf3qIsSEfbF0n1IPAHGz26hQCT2XTE&libraries=places&callback=initMap" async defer></script>
    <script src="source/js/updateuseractivity.js"></script>
    <script>
        activitites(4);
        $(document).ready(function() {
            jQuery.event.special.touchstart = {
                setup: function(_, ns, handle) {
                    this.addEventListener("touchstart", handle, {
                        passive: !ns.includes("noPreventDefault"),
                    });
                },
            };
            $(".carousel").slick({
                slidesToShow: 3,
                centerMode: true,
            });
            setInterval(function() {
                $('.gm-style-mtc').hide();
            }, 1000);
        });
        var map;
        var mgr;
        var marker;
        var data = [];
        var pyrmont = "";

        function initMap() {
            // Create the map.
            pyrmont = {
                lat: <?php echo $lat; ?>,
                lng: <?php echo $lng; ?>,
            };

            map = new google.maps.Map(document.getElementById("map"), {
                center: pyrmont,
                zoom: 10,
            });
        }
        var gmarkers = [];

        function clickedRes(e) {
            // Create the places service.
            var service = new google.maps.places.PlacesService(map);
            var place = $(e).attr("data-val");
            // Perform a nearby search.
            service.nearbySearch({
                    location: pyrmont,
                    radius: 5000,
                    type: [place + ""],
                },
                function(results, status, pagination) {
                    if (status !== "OK") return;

                    createMarkers(results);
                    getNextPage =
                        pagination.hasNextPage &&
                        function() {
                            pagination.nextPage();
                        };

                    if (pagination.hasNextPage) {
                        getNextPage();
                        console.log(pagination.hasNextPage);
                    } else {}
                }
            );
        }

        function createMarkers(places) {
            removeMarkers();
            gmarkers = [];
            var bounds = new google.maps.LatLngBounds();
            for (var i = 0, place;
                (place = places[i]); i++) {
                data = {
                    title: place.name,
                    id: place.id,
                    position: place.geometry.location,
                    vicinity: place.vicinity,
                };
                var image = {
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25),
                };

                marker = new google.maps.Marker({
                    map: map,
                    icon: image,
                    title: place.name,
                    position: place.geometry.location,
                });
                gmarkers.push(marker);
                bounds.extend(place.geometry.location);
            }
            map.fitBounds(bounds);
        }

        function removeMarkers() {
            for (i = 0; i < gmarkers.length; i++) {
                gmarkers[i].setMap(null);
            }
        }
    </script>
    <!-- END -->
</body>

</html>
</body>

</html>