<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/head.php' ?>
<link rel="stylesheet" href="source/tabstyle.css">

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
    <div class="py-5">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Unit Details</h3>
                <label class='toggle-label'>
                    <input type='checkbox' />
                    <span class='back'>
                        <span class='toggle'></span>
                        <span class='label on'>2 BHK</span>
                        <span class='label off'>3 BHK</span>
                    </span>
                </label>
            </div>
        </div>
        <div class="unitsleft py-2">
            <h4 class="available text-center">Available Units : 10</h4>
        </div>
        <div class="accordion py-2" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <button class="btn text-dark text-center" type="button">
                        SELECT FLOOR
                    </button>
                    <span style="float: right; color:black; padding-top: 5px;"><i class="fa fa-chevron-down"></i></span>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body text-center">
                        <p style="color:black;" class="ground">GROUND FLOOR</p>
                        <hr>
                        <p style="color:black;" class="first">FIRST FLOOR</p>
                        <hr>
                        <p style="color:black;" class="second">SECOND FLOOR</p>
                        <hr>
                        <p style="color:black;" class="third">THIRD FLOOR</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">UNIT No.</th>
                        <th scope="col">AREA(sq.ft)</th>
                        <th scope="col">PRICE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>1218</td>
                        <td>68.21 Lakhs</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>1292</td>
                        <td>68.21 Lakhs</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <div style="height:200px;">
    </div>
    <!-- Footer Nav-->
    <?php include '../components/footer.php' ?>
    <!-- END -->
</body>

</html>