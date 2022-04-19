<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<?php include '../components/head.php' ?>
<style>
    .owl-dot {
        display: none;
    }

    .remmodal {
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1050;
        width: 100%;
        height: 100%;
        overflow: hidden;
        outline: 0;
    }

    /* Card styles */
    .cards {
        background-color: #fff;
        height: auto;
        width: auto;
        overflow: hidden;
        margin: 0px;
        border-radius: 15px;
        box-shadow: 9px 17px 45px -29px rgba(0, 0, 0, 0.44);
    }

    /* Card image loading */
    .card__image img {
        width: 100%;
        height: 100%;
    }

    .card__image.loading {
        height: 80px;
        width: 400px;
    }

    /* Card title */
    .card__title {
        padding: 8px;
        font-size: 22px;
        font-weight: 700;
    }

    .card__title.loading {
        height: 1rem;
        width: 50%;
        margin: 1rem;
        border-radius: 3px;
    }

    /* Card description */
    .card__description {
        padding: 8px;
        font-size: 16px;
    }

    .card__description.loading {
        height: 3rem;
        margin: 1rem;
        border-radius: 3px;
    }

    /* The loading Class */
    .loading {
        position: relative;
        background-color: #e2e2e2;
    }

    /* The moving element */
    .loading::after {
        display: block;
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        transform: translateX(-100%);
        background: -webkit-gradient(linear, left top,
                right top, from(transparent),
                color-stop(rgba(255, 255, 255, 0.2)),
                to(transparent));

        background: linear-gradient(90deg, transparent,
                rgba(255, 255, 255, 0.2), transparent);

        /* Adding animation */
        animation: loading 0.8s infinite;
    }

    /* Loading Animation */
    @keyframes loading {
        100% {
            transform: translateX(100%);
        }
    }

    .circle {
        width: 80%;
        height: 50px;
        border-radius: 50%;
        line-height: 48px;
        font-size: 20px;
        color: #000;
        border-color: black;
        text-align: center;
        background: #fff;
        border: 3px solid #BADA55;
        margin-right: 20px;
    }

    .loader-spin {
        border: 16px solid #f3f3f3;
        /* Light grey */
        border-top: 16px solid #3498db;
        /* Blue */
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    :root {
        --main-color: #111;
        --loader-color: #fff;
        --back-color: #A5D6A7;
        --time: 3s;
        --size: 3px;
    }

    .loader-line {
        width: 100%;
        height: 100%;
        top: 10;
        padding: 10px 10px 10px 10px;
        left: 0;
        position: absolute;
        align-content: center;
        justify-content: flex-start;
        z-index: 100000;
    }

    .loader__element {
        height: var(--size);
        width: 100%;
        background: var(--back-color);

    }

    .loader__element:before {
        content: '';
        display: block;
        background-color: var(--loader-color);
        height: var(--size);
        width: 0;
        animation: getWidth var(--time) ease-in infinite;
    }

    @keyframes getWidth {
        100% {
            width: 100%;
        }
    }

    .flash-sale-slide.owl-carousel {
        width: 130% !important;
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .flash-sale-slide.owl-carousel {
            width: 100% !important;
        }
    }

    @media only screen and (min-width: 992px) and (max-width: 1199px) {
        .flash-sale-slide.owl-carousel {
            width: 100% !important;
        }
    }

    @media only screen and (min-width: 1200px) {
        .flash-sale-slide.owl-carousel {
            width: 100% !important;
        }
    }

    .flash-sale-card {
        position: relative;
        z-index: 1;
    }

    .flash-sale-card img {
        margin-bottom: 0.5rem;
    }

    .flash-sale-card .product-title {
        -webkit-transition-duration: 500ms;
        transition-duration: 500ms;
        color: #020310;
        font-size: 14px;
        font-weight: 500;
        display: block;
        line-height: 1.2;
        margin-bottom: 0.25rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .flash-sale-card .sale-price {
        font-size: 14px;
        font-weight: 700;
        color: #100DD1;
        margin-bottom: 0;
    }

    .flash-sale-card .real-price {
        display: inline-block;
        margin-left: 5px;
        font-size: 12px;
        text-decoration: line-through;
        margin-bottom: 0.25rem;
    }

    .flash-sale-card .progress {
        height: 0.25rem;
    }

    .flash-sale-card .progress-title {
        color: #747794;
        font-size: 10px;
        display: block;
    }

    .flash-sale-card:hover .product-title,
    .flash-sale-card:focus .product-title {
        color: #100DD1;
    }

    .circleDATA {
        /* width: 73%; */
        height: 81px;
        line-height: 86px;
        border-radius: 50%;
        font-size: 45px;
        font-weight: 500;
        font-family: roboto, arial;
        color: white;
        text-align: center;
        background: black;
    }

    .owl-carousel .owl-stage,
    .owl-carousel.owl-drag .owl-item {
        -ms-touch-action: auto;
        touch-action: auto;
    }
    .flash-sale-slide{
        -ms-touch-action: auto;
        touch-action: auto;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="style.css">
<!--END-->

<body>
    <div class="closebar"></div>
    <!-- Preloader-->
    <div class="preloader" id="preloader">
        <div class="spinner-grow text-secondary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Header Area-->
    <?php include '../components/agent-sidebar.php' ?>
    <!--END-->
    <div class="page-content-wrapper py-3">
        <!-- <div class="single-hero-slide mb-2 bg-secondary sliderremove loading"></div> -->
        <!-- SITE IMAGES -->
        <!-- <div class="hero-slides owl-carousel">
        </div> -->
        <br>
        <div class="container product-catagories-wrapper py-3">
            <div class="container bg-white" style="border-radius: 50px 20px 20px 50px; background:url(source/graph.jpg);">
                <div class="product-catagory-wrap">
                    <div class="row g-3">
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body"><a href="view-leads.php"><i class="leadCount">0</i><span>Lead's</span></a></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body"><a href="view-leads.php?filter=firstcall"><i class="invent">0</i><span>First Call</span></a></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body"><a href="view-leads.php?filter=completed"><i class="mtb">0</i><span>Completed</span></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:-15px;">
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body"><a href="view-leads.php?filter=hotlead"><i class="hlCount">0</i><span>Hot Lead's</span></a></div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body"><a href="site-visit.php"><i class="agsite">0</i><span>Site Visit's</span></a></div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card catagory-card">
                                <div class="card-body"><a href="reminders.php"><i class="remin">0</i><span>Reminder's</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flash-sale-wrapper noLeads mt-3">
            <div class="container">
                <div class="section-heading d-flex align-items-center justify-content-between">
                    <h6 class="ml-1">Recent Leads</h6><a class="btn btn-primary btn-sm" href="view-leads.php">View All</a>
                </div>
                <div class="flash-sale-slide owl-carousel hideLeadCard mb-4">
                    <div class="cards">
                        <div class="card__image loading"></div>
                        <div class="card__title loading"></div>
                        <div class="card__description loading"></div>
                    </div>
                </div>

                <!-- Flash Sale Slide-->
                <div class="flash-sale-slide owl-carousel dataCard">

                </div>
            </div>
        </div>
        <div class="container mt-2">
            <div class="row">
                <div class="col-md-12">
                    <!-- Nav tabs -->
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs justify-content-center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active dataLoad" data-toggle="tab" href="#hotleads" onclick="hotleadData();" role="tab">
                                        <img src="source/fire.gif" style="height: 30px;width:30px;margin: -9px;margin-left: -17px;margin-top: -17px;" />&nbsp;&nbsp;&nbsp;Hot Leads
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link dataLoad" data-toggle="tab" href="#firstcall" onclick="firstcall();" role="tab">
                                        <i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;First Call
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <hr>
                        <div class="card-body">
                            <!-- Tab panes -->
                            <div class="tab-content text-center">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="cards updated">
                                        <div class="card__image loading"></div>
                                    </div>
                                    <div class="accordion afterActive" style="font-size: 20px;margin-top:-10px;" id="accordionExample">
                                    </div>
                                    <div class="accordion nodatas" style="font-size: 20px; border-radius:20px;" id="accordionExample"></div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
    </div>
    <!-- Footer Nav-->
    <?php include '../components/agentfooter.php' ?>
    <script src="source/js/agent-lander.js"></script>
    <script src="source/js/agent-profiles.js"></script>
    <!-- END -->
</body>

</html>