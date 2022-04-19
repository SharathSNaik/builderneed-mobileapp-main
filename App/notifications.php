<?php include '../access/useraccesscontrol.php'; ?>
<!DOCTYPE html>
<html lang="en">
<!--head and meta tags-->
<title>Welcome - <?php echo $name['name']; ?> </title>
<?php include '../components/head.php' ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/brands.min.css" integrity="sha512-apX8rFN/KxJW8rniQbkvzrshQ3KvyEH+4szT3Sno5svdr6E/CP0QE862yEeLBMUnCqLko8QaugGkzvWS7uNfFQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
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
    <div class="py-2">
    </div>
    <div class="page-content-wrapper py-4">
        <div class="container notifications">

        </div>
    </div>
    <!-- Footer Nav-->
    <?php include '../components/footer.php' ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script>
        function countNotification() {
            window.swal({
                icon: "../assets/img/loader.gif",
                button: false,
                closeOnClickOutside: false,
            });
            $.ajax({
                type: "POST",
                url: "source/backend/getnotifications.php",
                success: function(response) {
                    var jsonData = JSON.parse(response);
                    if (jsonData.status == "OK") {
                        $(".swal-overlay").hide();
                        for (var i = 0; i < jsonData.data.length; i++) {
                            var date = jsonData.data[i].date;
                            date = date.substring(0, date.length - 2);
                            const timestamp = moment(date).fromNow();
                            $(".notifications").append(
                                '<div class="card"><div class="card-header"><h5 class="card-title">' +
                                jsonData.data[i].title +
                                '</h5></div><div class="card-body"><p class="card-text text-dark">' +
                                jsonData.data[i].body +
                                "</p></div><div class='card-footer text-right text-muted'>" +
                                timestamp +
                                "</div></div><br>"
                            );
                        }
                    } else {
                        $(".swal-overlay").show();
                        window
                            .swal({
                                icon: "warning",
                                text: "No Notification Found",
                            })
                            .then(function() {
                                $(".swal-overlay").hide();
                                window.location = document.referrer;
                            });
                    }
                },
            });
        }
    </script>
    <!-- END -->
</body>

</html>